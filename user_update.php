<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$lpw    = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];
$id = $_POST["id"];

//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');   //「funcs.php」の中を読み込んで
$pdo = db_conn();  //そのなかの「db_conn（関数）」を呼び出す

//３．データ登録SQL作成
$stmt = $pdo->prepare(
                "UPDATE 
                    book_user_table 
                SET 
                    name = :name,
                    lid = :lid,
                    lpw = :lpw,
                    kanri_flg = :kanri_flg,
                    life_flg = :life_flg
                WHERE
                    id = :id
                ;"
            );

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    //*** function化する！******\
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('user_select.php');
    // header("Location: index.php");
    // exit();
}
