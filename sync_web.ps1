function Get-QueryResults {
    param (
        [System.Data.SqlClient.SqlConnection] $Connection,
        [string] $Query,
        [int] $TimeoutSeconds = 30
    )

    $command = $Connection.CreateCommand()
    $command.CommandText = $Query
    $command.CommandTimeout = $TimeoutSeconds

    $adapter = New-Object System.Data.SqlClient.SqlDataAdapter($command)
    $table = New-Object System.Data.DataTable
    [void] $adapter.Fill($table)

    return @($table.Rows | ForEach-Object {
        $row = $_
        $record = [ordered]@{}

        foreach ($column in $table.Columns) {
            $value = $row[$column.ColumnName]

            if ($value -is [DBNull]) {
                $value = $null
            } elseif ($value -is [datetime]) {
                $value = $value.ToString("yyyy-MM-dd HH:mm:ss")
            } elseif ($value -is [byte[]]) {
                $value = [Convert]::ToBase64String($value)
            }

            $record[$column.ColumnName] = $value
        }

        [pscustomobject] $record
    })
}

$connectionString = "Server=127.0.0.1,1433;Database=HFTEST;User ID=sa;Password=Theocean123;Encrypt=True;TrustServerCertificate=True;Connection Timeout=10;"

try {
    Write-Host "Opening SQL connection..."
    $conn = New-Object System.Data.SqlClient.SqlConnection($connectionString)
    $conn.Open()
    Write-Host "SQL connection opened successfully."
}
catch {
    Write-Host "SQL connection failed:"
    Write-Host $_.Exception.Message
    exit 1
}

$payload = @{
    EOD_Fund_Summary = Get-QueryResults -Connection $conn -Query "SELECT TOP 100 RecordID, B.FundCode,B.FundName, Date, TOTALNOOFSHARE, NAVACTUAL as NAV_CP, NAVATMARKETPRICE as NAV_MP, NAVACTUAL/TOTALNOOFSHARE as NAV_CP_PU, NAVATMARKETPRICE/TOTALNOOFSHARE as NAV_MP_PU FROM EOD_Fund_Summary as A LEFT JOIN Setup_tblFund_List as B on A.FundCOAID = B.FundCOAID"
}

$conn.Dispose()

try {
    $body = $payload | ConvertTo-Json -Depth 10 -ErrorAction Stop
}
catch {
    Write-Host "JSON conversion failed:"
    Write-Host $_.Exception.Message
    exit 1
}

foreach ($key in $payload.Keys) {
    Write-Host "$key rows: $(@($payload[$key]).Count)"
}

Invoke-RestMethod `
    -Uri "http://192.168.9.45:8000/api/v1/sync/nav-data" `
    -Method Post `
    -Headers @{
        Authorization = "Bearer aCDCmjCQYe9h9ojAl7zfeQfspoiQnrymFLTxmzrCEvo="
        Accept = "application/json"
    } `
    -ContentType "application/json" `
    -Body $body