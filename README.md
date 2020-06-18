# CAC Web
C.A.C.の公式ホームページです。

## 開発環境
- wordpress PHP 7.4
- MySQL 5.7
- Docker 

### 構成
- cac-wordpress-theme/
  - 本プログラム
- design/
  - wordpress移行前の設計図
- docker/
  - wordpressの設定やdocker-composeファイル
- env/
  - wordpressとdbの環境ファイル

### 使用したイメージについて
- [wordpress:php7.4](https://hub.docker.com/layers/wordpress/library/wordpress/php7.4/images/sha256-43a2e6caebd0b95479b76c800d2545315a5995875575b86b109c87a6317a6d11?context=explore)
- [MySQL:5.7](https://hub.docker.com/layers/mysql/library/mysql/5.7/images/sha256-375d2452a2009a51803d528ad9bd1926eead59b0d74a8e463afd0e6feb11a85e?context=explore)  
MySQLに関しては最新版だと動かない場合があるため、**必ず**5.7系を使用してください。  

## 実行方法
### 環境変数  
`.env`ファイルのテンプレートを用意しているので、`*.env`ファイルに変数に値をセットして下さい。  
```
cp env/wordpress.env-template env/wordpress.env
cp env/db.env-template env/db.env
```

### コンテナ起動  
- 起動方法  
`cd docker/`でディレクトリに移動し、
`docker-compose up -d` を実行した後、  
[http://localhost:8080](http://localhost:8080)にアクセスする。

- 終了方法  
`docker-compose down`

## wordpressのテーマ変更をする場合
通常、デフォルトのテーマや独自のテーマを追加する場合は、
起動したのちに[http://localhost:8080/wp-admin/themes.php](http://localhost:8080/wp-admin/themes.php)にアクセスすることで有効化できる。  
また、サイト表示をしてからダッシュボードを表示したい場合は、クエリパラメータに`wp-admin/`と加える必要がある。  
つまり、[http://localhost:8080/wp-admin/](http://localhost:8080/wp-admin/)にアクセスする。
