<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。

function db_conn(){
    try {
        $db_name = "book_list";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;    //「$pdo」を「db_conn（関数）」の外でも使えるようにする「return」
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}


//リダイレクト関数: redirect($file_name)
 function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function loginCheck(){
    if($_SESSION['chk_ssid'] != session_id()){   //「!=」は違ったらという意味
        exit("LOGIN ERROR");
    }else{
        session_regenerate_id(true);    //session_IDを新たに発行する
        $_SESSION['chk_ssid'] = session_id();   //「chk_ssid」の中身を新しいsession_IDに更新する
    }
}
