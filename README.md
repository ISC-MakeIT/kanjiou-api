# 漢字王決定戦API
## Setup
```bash
docker-compose up -d
docker-compose exec kanjiou-api bash
chmod 700 setup.sh
./setup.sh       # パッケージインストール等
php artisan migrate # テーブル作成
php artisan db:seed # テストデータ挿入
```
## API一覧
### GET /time_limits/time_limit
#### 説明
100以内入っているか返します。  
入っていれば順位も一緒に返します。
#### リクエスト
```json
{
    "seconds": "int"
}
```
#### レスポンス
```json
{
    "rank": "int",
}
```

### GET /time_limits
#### 説明
順位を一覧して返します
#### リクエスト
```json
{}
```
#### レスポンス
```json
[
    {
        "seconds": "int",
        "name": "string"
    },
    {
        "seconds": "int",
        "name": "string"
    },
    {
        "seconds": "int",
        "name": "string"
    },
]
```

### POST /time_limits
#### 説明
秒数と名前を渡すと順位に登録されます。
#### リクエスト
```json
{
    "seconds": "int",
    "name": "string"
}
```
#### レスポンス
```json
{}
```

### DELETE /time_limits
#### 説明
time_limit_idを渡すとそのデータを削除してくれる
#### リクエスト
```json
{
    "time_limit_id": "int"
}
```
#### レスポンス
```json
{}
```

