<?php
// MYSQLのアクセス情報
$host = 'localhost';
$user_name = 'yahiro';
$password = '1qaz2wsx';
$database_name = 'sampledb';
// データベースへの接続
$mysqli = new mysqli($host, $user_name, $password, $database_name);
// 接続エラーの確認
if ($mysqli->connect_error) {
  die("<p>接続に失敗しました（" . $mysqli->connect_errno . "）" . $mysqli->connect_error . "</p>");
}
