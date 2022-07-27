## サイト画面
http://localhost:8000/

## 管理画面
http://localhost:8000/admin/
- [Laravel-Admin](https://laravel-admin.org/docs/zh/1.x)

## 環境構築
- パッケージインストール<br>
npm install<br>
composer install

- .env修正<br>
管理者に設定ファイルを貰う（コミットしないように）

- 起動<br>
php artisan serve<br>
npm run dev

## SQL<br>
TRUNCATE laravel.contactChats;（全レコード削除）<br>

## Laravel<br>

- 全テーブル削除 + マイグレーション実行<br>
php artisan migrate:fresh

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
php artisan route:lis

 ```
// ログイン中のユーザー情報
{{  Auth::user() }}
// ログイン中ユーザーID
{{ Auth::id() }}
// ログインしているか判定
{{ Auth::check() }}
 ```