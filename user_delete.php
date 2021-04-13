<?php
// 0. SESSION開始！！
session_start();

//1. POSTデータ取得
$id = $_GET["id"];

//2. DB接続します
require_once("funcs.php");
$pdo = db_conn();
loginCheck();

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM book_user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
