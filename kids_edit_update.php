<?php
session_start();
include("funcs.php");

//1. POSTデータ取得
$k_name   = $_POST["k_name"];
$birthday = $_POST["birthday"];
$age      = $_POST["age"];
$gender   = $_POST["gender"];
$lid      = $_SESSION["lid"];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO kids_table (lid, k_name, birthday, age, gender, k_life_flg) 
    VALUES (:lid, :k_name, :birthday, :age, :gender, 0)
    ON DUPLICATE KEY UPDATE
    k_name = VALUES(k_name), 
    birthday = VALUES(birthday), 
    age = VALUES(age), 
    gender = VALUES(gender),
    k_life_flg = 0
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':k_name', $k_name, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("profile.php");
}
?>
