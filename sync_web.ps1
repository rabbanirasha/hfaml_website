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

$connectionString = "Server=127.0.0.1,1433;Database=XASSETHF;User ID=sa;Password=Theocean123;Encrypt=True;TrustServerCertificate=True;Connection Timeout=10;"

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
    eod_fund_summary = Get-QueryResults -Connection $conn -Query "SELECT TOP 1000 RecordID, B.FundCode, Date, FORMAT(TOTALNOOFSHARE,'N0') as TOTALNOOFSHARE, FORMAT(NAVACTUAL,'N2') as NAV_CP, FORMAT(NAVATMARKETPRICE,'N2') as NAV_MP, FORMAT(NAVACTUAL/TOTALNOOFSHARE,'N2') as NAV_CP_PU, FORMAT(NAVATMARKETPRICE/TOTALNOOFSHARE,'N2') as NAV_MP_PU, FORMAT(CEILING((ROUND(NAVATMARKETPRICE/TOTALNOOFSHARE,2)*0.98)/0.01)*0.01,'N2') as NAV_SP_PU FROM EOD_Fund_Summary as A LEFT JOIN Setup_tblFund_List as B on A.FundCOAID = B.FundCOAID ORDER BY RecordID DESC"
    openfund_tbldividenddeclaration = Get-QueryResults -Connection $conn -Query "SELECT DividendCOAID ,B.FundCode ,DividendID ,RecordDate ,EffectiveDate ,TrusteeCommitteMeetingDate ,LastNAVpublicationDate,DividendPercentage ,SaleRateForCIP ,TaxRateForIndividual ,TaxRateForInstitution ,TaxFreeAmountForIndividual ,TaxFreeAmountForInstitution FROM OpenFund_tblDividendDeclaration as A LEFT JOIN Setup_tblFund_List as B on A.FundCOAID = B.FundCOAID"
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

[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12 -bor [Net.SecurityProtocolType]::Tls11
Invoke-RestMethod `
    -Uri "https://hfassetmanagement.com/api/v1/sync/nav-data" `
    -Method Post `
    -Headers @{
        "X-Sync-Token" = "aCDCmjCQYe9h9ojAl7zfeQfspoiQnrymFLTxmzrCEvo="
        Accept = "application/json"
    } `
    -ContentType "application/json" `
    -Body $body