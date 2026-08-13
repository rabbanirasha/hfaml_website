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