
<?php

// POSTデータ(検索キーワード)を受け取る
$keyword = $_POST['kensaku'];

// DB接続情報
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=book_list;charset=utf8;host=localhost','root','root');

    //  検索するSQL文
    $sql = "select * from book_data where author = :keyword";

    // プリペアドステートメントを作成
	$stmt = $pdo->prepare($sql);

    // プレースホルダと変数をバインド
	$stmt -> bindParam(":keyword",$keyword);
	$stmt -> execute(); //実行

	// データを取得
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}


// try-catch
// try{
// 	// データベースへの接続を表すPDOインスタンスを生成
// 	$pdo = new PDO($dsn,$username,$password);

	//  SQL文 :idは、名前付きプレースホルダ
	$sql = "select * from syain where id = :id";

	// プリペアドステートメントを作成
	$stmt = $pdo->prepare($sql);

	// プレースホルダと変数をバインド
	$stmt -> bindParam(":id",$id);
	$stmt -> execute(); //実行

	// データを取得
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	// 接続を閉じる
	//$pdo = null; スクリプト終了時に自動で切断されるので不要
}catch (PDOException $e) {
	// UTF8に文字エンコーディングを変換します
	exit(mb_convert_encoding($e->getMessage(),'UTF-8','SJIS-win'));   
}
function escape1($str)
{
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}


?>


//検索したい