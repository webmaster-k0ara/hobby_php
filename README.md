# 趣味のためのサイトです！

## 動かし方

```bash
# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# Docker コンテナ内でコマンドを実行する
docker-compose exec app php -v

# Docker コンテナの停止・削除
docker-compose down

# composer.jsonをもとに必要なライブラリをインストール
composer install

# SCSS→CSS出力
docker-compose exec app /bin/bash
vendor/scssphp/scssphp/bin/pscss < stylesheets/scss/app.scss > stylesheets/css/app.css

```

## 環境構築

```bash
# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# Docker コンテナ内でコマンドを実行する
docker-compose exec app php -v

# Docker コンテナの停止・削除
docker-compose down
```

## Docker でよく使うコマンド

```bash
# コンテナの一覧と起動状態を確認する
docker-compose ps

# ログを確認する
docker-compose logs app

# コンテナ内で bash を操作する（コンテナ起動中のみ）
docker-compose exec app /bin/bash
```

## Docker で困ったら

### コンテナがうまく起動しないとき

下記のコマンドでログを確認して、ログに合わせて対応します。

```bash
# コンテナの起動状態を確認する
docker-compose ps

# 起動していないコンテナのログを確認する
docker-compose logs app
docker-compose logs db
```

対応したらコンテナを起動します。

```bash
# Docker コンテナの起動
docker-compose up -d

# コンテナの起動状態を確認する
docker-compose ps
```

Dockerfile 周りの対応を行った場合は、イメージから作り直します。

```bash
# Docker コンテナの停止・削除
docker-compose down

# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# コンテナの起動状態を確認する
docker-compose ps
```

### それでも起動しない場合

* Docker Desktop を再起動します
* PC を再起動します

### ハードディスクの容量が逼迫したら

不要なイメージ、コンテナなどを削除します。

```bash
# Docker の不要なイメージ、コンテナなどを削除する
docker system prune
```

### ポートが重複して起動しない場合

* PC を再起動します
* ポートを使用しているプロセスを調べて kill します
* docker-compose.yml の ports の左側の番号を変更します

※Apacheがある日突然レスポンスを返さなくなった場合もポートの重複が原因の可能性が高い

### dbコンテナが起動しない場合

下記のエラーでdbコンテナが起動しない場合

```bash
2017-11-20 02:56:52 1 [ERROR] InnoDB: auto-extending data file ./ibdata1 is of a different size 0 pages
 MB) than specified in the .cnf file: initial 768 pages, max 0 (relevant if non-zero) pages!
2017-11-20 02:56:52 1 [ERROR] InnoDB: Could not open or create the system tablespace. If you tried to a
 to the system tablespace, and it failed here, you should now edit innodb_data_file_path in my.cnf back
and remove the new ibdata files InnoDB created in this failed attempt. InnoDB only wrote those files fu
did not yet use them in any way. But be careful: do not remove old data files which contain your precio
2017-11-20 02:56:52 1 [ERROR] Plugin 'InnoDB' init function returned error.
2017-11-20 02:56:52 1 [ERROR] Plugin 'InnoDB' registration as a STORAGE ENGINE failed.
2017-11-20 02:56:52 1 [ERROR] Unknown/unsupported storage engine: InnoDB
2017-11-20 02:56:52 1 [ERROR] Aborting
```

MySQLの古いデータを削除します。

```bash
# MySQLの以前のデータを削除する
rm -rf docker/db/mysql_data
```

Dockerの不要なイメージ、コンテナ、ネットワーク、ボリュームを削除します。

```bash
# Docker コンテナの停止・削除
docker-compose down

# Docker の不要なイメージ、コンテナ、ネットワーク、ボリュームを削除する
docker system prune --volumes
```

MySQLのデータの同期をやめるために、 `docker-compose.yml` の下記3行目を削除します

```bash
db:
  volumes:
    - ./docker/db/mysql_data:/var/lib/mysql # ← この行を削除します
```

イメージから作成し直します。

```bash
# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# コンテナの起動状態を確認する
docker-compose ps
```
