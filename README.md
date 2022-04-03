# 漢字王決定戦API
## API一覧
### /ranked
#### 説明
100以内入っているか返します。  
入っていれば順位も一緒に返します。
#### リクエスト
```json
{
    "score": "int"
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
スコアと名前を渡すと順位に登録されます。
#### リクエスト
```json
{
    "score": "int",
    "name": "string"
}
```
#### レスポンス
```json
{}
```