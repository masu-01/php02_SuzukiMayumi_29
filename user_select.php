<?php
session_start();

require_once('funcs.php');   //「funcs.php」の中を読み込んで
$pdo = db_conn();  //そのなかの「db_conn（関数）」を呼び出す
loginCheck();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        // detail.phpに「detail.php?id=_」ってidを送れるようにする
        $view .= '<p>';
        $view .= '<a href="user_detail.php?id=' . $result['id'] .  '">';
        $view .=  $result["name"];
        $view .= '</a>';

        $view .= '<a href="user_delete.php?id=' . $result['id'] .  '">';
        $view .= '　[削除]';
        $view .= '</a>';

        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">書籍登録</a>
                    <a class="navbar-brand" href="user_regi.php">ユーザー登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
