### README

## アプリ名
タイムスケジュールを利用したメール送信アプリ

## 概要
laravelを使用して、登録したメール文を送信するアプリを作成。
herokuのタイムスケジュールを利用しているので、10分間隔で対象のメールを送信する。

対象のメールとは。
毎日送信フラグが立っている or 毎週送信する曜日が、本日の曜日。
かつ、
タイムスケジュールの発火時間～10分後までの時間内に送信時間が含まれているもの。

## 使用技術
- html
- php バージョン：PHP 7.3.24
- mysql
- laravel バージョン：Laravel Framework 6.20.4
- apache　バージョン：Apache/2.4.6
- centos バージョン：CentOS Linux release 7.7.1908 (Core)
- javascript
- virtualBox
- heroku

## 実装した機能
- 基本的なCRUD
- Validation
- メール
- 認証モデルの変更
