<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */


//  index.phpのフォームから↓送られてきたものを受け取って（$_POST）、変数に格納する
 $title = $_POST['title'];
 $author = $_POST['author'];
 $url = $_POST['url'];
 $memo = $_POST['memo'];

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ



//DB接続
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=book_list;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                       book_data(no,title,author,url,memo,date) 
                       VALUES(
                         NULL, :title, :author, :url, :memo, sysdate() )"
                        //  「:」は「const」や「let」みたいな変数のようなもの、フォームに命令文を書かれたりしても大丈夫なようにするために必要
                      );

//  2. バインド変数を用意
// 定形なのでコピペでＯＫ
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);


//  3. 実行
// 成功したか失敗したかが「$status」に入る　成功したらtrue、失敗はfalse
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:". print_r($error, true));
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');
}
?>
