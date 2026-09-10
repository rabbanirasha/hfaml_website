function Get-QueryResults {
    param (
        [System.Data.SqlClient.SqlConnection] $Connection,
        [string] $Query
    )

    $command = $Connection.CreateCommand()
    $command.CommandText = $Query

    $adapter = New-Object System.Data.SqlClient.SqlDataAdapter($command)
    $table = New-Object System.Data.DataTable
    [void] $adapter.Fill($table)

    return @($table | ForEach-Object {
        $record = [ordered]@{}

        foreach ($property in $_.PSObject.Properties) {
            $value = $property.Value

            if ($value -is [DBNull]) {
                $value = $null
            } elseif ($value -is [datetime]) {
                $value = $value.ToString("yyyy-MM-dd HH:mm:ss")
            }

            $record[$property.Name] = $value
        }

        [pscustomobject] $record
    })
}

$connectionString = "Server=LOCALHOST;Database=HFTEST;Integrated Security=True;"
$conn = New-Object System.Data.SqlClient.SqlConnection($connectionString)
$conn.Open()

$payload = @{
    Acc_tblAccPeriod = Get-QueryResults -Connection $conn -Query @"
SELECT * FROM Acc_tblAccPeriod
"@

    Acc_tblAccType = Get-QueryResults -Connection $conn -Query @"
SELECT * FROM Acc_tblAccType
"@
}

$conn.Dispose()

$body = $payload | ConvertTo-Json -Depth 10

Invoke-RestMethod `
    -Uri "http://192.168.9.45:8000/api/v1/sync/nav-data" `
    -Method Post `
    -Headers @{
        Authorization = "Bearer use-a-long-random-secret-here"
        Accept = "application/json"
    } `
    -ContentType "application/json" `
    -Body $body