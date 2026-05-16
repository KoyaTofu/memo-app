# テキストメモ

リッチテキストを記録できるメモ帳

## サブ機能一覧

| サブ機能 | 説明 |
|----------|------|
| 一覧 | 登録済みメモを一覧表形式で表示 |
| 詳細 | メモの内容を表示、クリップボードコピー可能 |
| 作成 | 新規メモを作成 |
| 編集 | 既存メモを編集 |
| 削除 | 既存メモを削除 |

## 画面一覧

| 画面名 | URL | ルート名 |
|--------|-----|----------|
| 一覧 | `/text-memo/list` | `text-memo.list` |
| 詳細 | `/text-memo/detail` | `text-memo.detail` |
| 作成 | `/text-memo/create` | `text-memo.create` |
| 編集 | `/text-memo/{id}/edit` | `text-memo.edit` |

## 画面遷移図

| 操作 | 画面遷移 |
|------|--------|
| ※ルート | [root] --> ホーム |
| メモ一覧確認 | ホーム --> 一覧 |
| メモ新規作成 | 一覧 --> 作成 ==> 一覧 |
| メモ詳細確認 | 一覧 --> 詳細 |
| メモ編集 | 詳細 --> 編集 ==> 詳細 |

## その他

- 参考 : rich-text-laravel | https://github.com/tonysm/rich-text-laravel
- エディタ : trix | https://github.com/basecamp/trix
