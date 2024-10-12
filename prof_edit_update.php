<?php
session_start();

//1. POSTデータ取得
$name     = $_POST["name"];
$lid      = $_POST["lid"];
$lpw      = $_POST["lpw"];

// パスワードのハッシュ化
$hashed_lpw = password_hash($lpw, PASSWORD_DEFAULT);

//2. DB接続します
include("funcs.php");
sschk(); //LOGINチェック
$pdo = db_conn();

//３．データ登録SQL作成
// 1. sei_user_tableの更新
$sql_user = "UPDATE sei_user_table SET name=:name, lid=:lid, lpw=:lpw WHERE lid=:old_lid";
$stmt_user = $pdo->prepare($sql_user);
$stmt_user->bindValue(':name', $name, PDO::PARAM_STR);
$stmt_user->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt_user->bindValue(':lpw', $hashed_lpw, PDO::PARAM_STR);
$stmt_user->bindValue(':old_lid', $_SESSION['lid'], PDO::PARAM_STR);  // 現在ログイン中のユーザーIDを使う
$status_user = $stmt_user->execute();


//４．データ登録処理後
// エラーが発生した場合
if($status_user==false){
    sql_error($stmt_user);
} else {
    // 正常終了した場合はリダイレクト
    redirect("profile.php");
}

?>
