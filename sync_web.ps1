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
    Acc_tblAccPeriod = Get-QueryResults -Connection $conn -Query "SELECT * FROM Acc_tblAccPeriod"
    Acc_tblAccType = Get-QueryResults -Connection $conn -Query "SELECT * FROM Acc_tblAccType"
    Acc_tblCashflowItems = Get-QueryResults -Connection $conn -Query "SELECT * FROM Acc_tblCashflowItems"
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