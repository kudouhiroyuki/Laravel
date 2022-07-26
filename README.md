## サイト画面
http://localhost:8000/
- [Simple, fast routing engine](https://laravel.com/docs/routing).

## 管理画面
http://localhost:8000/admin/
- Laravel-Admin

## コマンド
- パッケージインストール<br>
npm install<br>
composer install

- 起動<br>
php artisan serve<br>
npm run dev

- キャッシュクリア<br>
php artisan cache:clear &&<br>
php artisan config:clear &&<br>
php artisan config:cache &&<br>
php artisan route:clear &&<br>
php artisan view:clear &&<br>
php artisan clear-compiled &&<br>
php artisan optimize &&<br>
composer dump-autoload &&<br>
rm -f bootstrap/cache/config.php

- Route一覧<br>
php artisan route:list