version 1.0.0

# laravel-memo-api
LaravelでCRUD機能をAPIを使って作る。

## 開発環境
* laravel: 8.x
* mysql: 8.0.26
* PHP: 8.0-apache-buster

## 手順
### ファイルの修正作業
1. docker/php/Dockerfile のプロジェクト名を修正
2. docker-compose.yamlのcontainer_nameを指定
3. .envファイルの修正

### コマンド操作

    docker-compose build
    docker-compose up

    #コンテナにログイン
    docker exec -it php_memo_laravel bash

    #Laravelのインストール（初期操作以外は必要無し）
    composer create-project laravel/laravel {プロジェクト名} "8.*"

    #このままだとアクセスできないので権限を変更
    chmod 777 -R storage/

## 各サービスログインコマンド

    php
    docker exec -it php_memo_laravel bash

    mysql
    docker exec -it php_memo_mysql mysql -u root -p