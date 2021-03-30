<?php

require_once('funcs.php');

// 検索キーワードを受け取ります
$keyword = $_POST['kensaku'];
// console_log($keyword);

//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=book_list;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_data WHERE author = '$keyword' ");  //WHERE author = '$keyword' 
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    //Selectデータの数だけ自動でループしてくれる「FETCH_ASSOC」
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>'
                    . h($result['no'])  . '＝＝＝＝＝＝＝＝＝＝<br> '
                    . h($result['date'])  . '<br>'
                    .'<a href= "'. h($result['url']).  '" target="_blank">'. h($result['title'])  .'</a>　'
                    . h($result['author']).  '<br>'
                    . h($result['memo']) . '<br>＝＝＝＝＝＝＝＝＝＝'
                .'</p>';  //「.」は「+」の意味
    }
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
        <a class="navbar-brand" href="select.php">一覧に戻る</a>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
