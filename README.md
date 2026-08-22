# hfaml_website
Official Website of HFAML built with Laravel 13, Livewire, Bootstrap and others. It also features REST API to pull data from SQL Server hosted in on-prem Windows Server 2012.

## Before you push
```
composer install --no-dev --optimize-autoloader
npm run build
php artisan key:generate
php artisan config:clear
php artisan optimize:clear
php artisan cache:clear
php artisan view:clear
php artisan event:cache
php artisan view:cache
php artisan route:cache
php artisan config:cache
php artisan optimize
git add -A
git commit -m "your message or changelog"
git push
```

## How to find the php binary path of your host
Create find-php.php file at /your-laravel-project/public/find-php.php and enter the following in the file:
```
<?php
echo "<h3>PHP Binary Path:</h3> " . PHP_BINARY . "<br>";
echo "<h3>PHP Binary Directory:</h3> " . PHP_BINDIR . "<br>";
?>
```
Now visit https://your-site/public/find-php.php

## Allow more file uploads
If you encounter issues in uploading files at https://your-site/web-admin, edit your php.ini file:
```
; Enable file uploads
file_uploads = On

; Maximum allowed size for a single uploaded file
upload_max_filesize = 100M

; Maximum size of the entire POST request data (must be >= upload_max_filesize)
post_max_size = 105M

; Maximum number of files that can be uploaded simultaneously in one request
max_file_uploads = 50

; Memory limit allocated for a script (must be >= post_max_size)
memory_limit = 256M

; Recommended: Increase execution timeouts so large uploads don't time out
max_execution_time = 300
max_input_time = 300
```