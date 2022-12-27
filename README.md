# 漢字王決定戦API
## Setup
```bash
docker-compose up -d
docker-compose exec kanjiou-api bash
chmod 700 setup.sh
./setup.sh          # パッケージインストール等
php artisan migrate --path=database/migrations/** # テーブル作成
php artisan db:seed # テストデータ挿入
```
## API一覧
### GET /api/ranks/{secondsLeft}
#### 説明
100以内入っているか返します。  
入っていれば順位も一緒に返します。
#### レスポンス
```json
{
    "isRankedIn": "boolean",
    "rankOrder": "int"
}
```

### GET /api/ranks
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
        "secondsLeft": "int",
        "rankOrder": "int",
        "name": "string",
        "recordedAt": "string",
    },
    {
        "secondsLeft": "int",
        "rankOrder": "int",
        "name": "string",
        "recordedAt": "string",
    },
    {
        "secondsLeft": "int",
        "rankOrder": "int",
        "name": "string",
        "recordedAt": "string",
    }
]
```

### POST /api/records
#### 説明
残り秒数と名前を渡すと順位に登録されます。
#### リクエスト
```json
{
    "secondsLeft": "int",
    "name": "string"
}
```
#### レスポンス
```json
{}
```

