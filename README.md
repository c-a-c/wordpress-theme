# CAC Web
C.A.C.の公式ホームページです。

## 開発環境
- wordpress
- MySQL 5.7

## 実行方法
### 環境変数  
`.env`ファイルのテンプレートを用意しているので、ファイル名を変更して、変数に値をセットして下さい。  
```
mv env/db.env-template env/db.env
mv env/db.env-template env/db.env
```

### コンテナ起動  
`docker-compose up -d` を実行した後、  
[http://localhost:8080](http://localhost:8080)にアクセスする。

- 終了方法  
`docker-compose down`
