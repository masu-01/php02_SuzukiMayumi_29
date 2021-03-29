
<?php

// POSTデータ(検索キーワード)を受け取る
$keyword = $_POST['kensaku'];

// DB接続情報
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=book_list;charset=utf8;host=localhost','root','root');

    //  検索するSQL文
    // $sql = 'select * from book_data where author = :keyword';


    // プリペアドステートメントを作成
	$stmt = $pdo->prepare("SELECT * FROM book_data WHERE author = :keyword");

    // プレースホルダと変数をバインド
	$stmt -> bindParam(":keyword", $keyword, PDO::PARAM_STR);
	$stmt -> execute(); //実行

	// データを取得
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>検索結果</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">書籍登録フォームはこちら</a>
        </div>
        <div class="navbar-header">
        <a class="navbar-brand" href="select copy.php">一覧に戻る</a>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $rec ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
