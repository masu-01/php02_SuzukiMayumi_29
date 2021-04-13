<?php
session_start();

require_once('funcs.php');   //「funcs.php」の中を読み込んで
loginCheck();

//  index.phpのフォームから↓送られてきたものを受け取って（$_POST）、変数に格納する
 $title = $_POST['title'];
 $author = $_POST['author'];
 $url = $_POST['url'];
 $memo = $_POST['memo'];

//  DBに接続する
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=book_list;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//  SQL文を用意する
  $stmt = $pdo->prepare("INSERT INTO
                       book_data(no,title,author,url,memo,date) 
                       VALUES(
                         NULL, :title, :author, :url, :memo, sysdate() )"
                        //  「:」は「const」や「let」みたいな変数のようなもの、フォームに命令文を書かれたりしても大丈夫なようにするために必要
                      );

//  バインド変数を用意する
  $stmt->bindValue(':title', $title, PDO::PARAM_STR);
  $stmt->bindValue(':author', $author, PDO::PARAM_STR);
  $stmt->bindValue(':url', $url, PDO::PARAM_STR);
  $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);


//  実行する
//  成功したか失敗したかが「$status」に入る→成功したら「true」、失敗は「false」
//  データ登録処理後にフォームがリセットされる（というかもっかいindex.phpを表示させる）
  $status = $stmt->execute();

  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:". print_r($error, true));
  }else{
    //成功したらindex.phpへリダイレクト
    header('Location: index.php');
  }

?>


