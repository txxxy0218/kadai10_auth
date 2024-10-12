<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn (){
    try {
        //さくらサーバー
        $db_name = "ur-special_seihatena_db";    //データベース名
        $db_id   = "ur-special";      //アカウント名
        $db_pw   = "yoshika0512";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
        $db_host = "mysql3101.db.sakura.ne.jp"; //DBホスト

        //ローカル
        // $db_name = "seihatena_db";    //データベース名
        // $db_id   = "root";      //アカウント名
        // $db_pw   = "";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
        // $db_host = "localhost"; //DBホスト

        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}



//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}



//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//SessionCheck(スケルトン)
function sschk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("Login Error");
    }else{
      session_regenerate_id(true); //セキュリティ強化のためセッションキーを入れ替える処理
      $_SESSION["chk_ssid"] = session_id();
    }
  }




