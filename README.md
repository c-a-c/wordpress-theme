# CAC Web
C.A.C.の公式ホームページです。

## 開発環境
- wordpress
- MySQL 5.7
- Docker 

### 使用したイメージについて
- [wordpress:latest](https://hub.docker.com/layers/wordpress/library/wordpress/latest/images/sha256-f6218299a13f518e2d512a97fc87adbd7c4647919b8cff5fe2ac3a5be03e4566?context=explore)
- [MySQL:5.7](https://hub.docker.com/layers/mysql/library/mysql/5.7/images/sha256-375d2452a2009a51803d528ad9bd1926eead59b0d74a8e463afd0e6feb11a85e?context=explore)  
MySQLに関しては最新版だと動かない場合があるため、**必ず**5.7系を使用してください。  

## 実行方法
### 環境変数  
`.env`ファイルのテンプレートを用意しているので、ファイル名を変更して、変数に値をセットして下さい。  
```
mv env/db.env-template env/db.env
mv env/db.env-template env/db.env
```

### コンテナ起動  
`docker`ディレクトリに移動し、
`docker-compose up -d` を実行した後、  
[http://localhost:8080](http://localhost:8080)にアクセスする。

- 終了方法  
`docker-compose down`

## 変更する場合
通常、デフォルトのテーマや独自のテーマを追加する場合は、このプロジェクトではDockerを使用していますが、
`docker > assets > wordpress > wp-content > themes`にディレクトリ丸ごと置けば、
起動したのち、[http://localhost:8080/wp-admin/themes.php](http://localhost:8080/wp-admin/themes.php)にアクセスすることで有効化できる。  
また、サイト表示をしてからダッシュボードを表示したい場合は、クエリパラメータに`wp-admin/`と加える必要がある。  
つまり、[http://localhost:8080/wp-admin/](http://localhost:8080/wp-admin/)にアクセスする。
