# 漢字王決定戦API
## API一覧
### /ranked
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
    "is_ranked": "boolean",
    "rank": "int"
}
```

### /register
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

### /rankes
#### 説明
順位を一覧して返します
#### リクエスト
```json
{}
```
#### レスポンス
```json
{
    "?": [
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
}
```
