<?php
echo "<h3>PHP Binary Path:</h3> " . PHP_BINARY . "<br>";
echo "<h3>PHP Binary Directory:</h3> " . PHP_BINDIR . "<br>";
echo "<h3>PHP Extensions Status:</h3> ";
$required = ['fileinfo', 'mbstring', 'openssl', 'pdo_mysql', 'tokenizer', 'xml', 'ctype', 'json', 'bcmath', 'curl'];
foreach ($required as $ext) {
    echo $ext . ': ' . (extension_loaded($ext) ? 'enabled' : 'MISSING') . "\n";
}
echo "<h3>PHP Info:</h3> ";
phpinfo();
?>