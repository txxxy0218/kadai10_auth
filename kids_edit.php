<?php 
    session_start();

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kids_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" /><!-- reset.css ress -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>セイはてな｜プロフィール</title>
</head>
<body>
    <?php
        include('components/header.php');
    ?>

    <main>

        <h1>子供の情報を編集</h1>

        <div class="prof-wrapper"> 

            <div class="kids-prof-wrapper">
                <form method="POST" action="kids_edit_update.php">
                    <button type="submit" class="link">保存する</button>
                    
                    <div class="k-prof">
                        <div class="input-wrapper">
                            <p>名前</p>
                            <input type="text" name="k_name">
                        </div>
                        <div class="input-wrapper">
                            <p>誕生日</p>
                            <input type="date" name="birthday">
                        </div>
                        <div class="input-wrapper">
                            <p>年齢</p>
                            <input type="text" name="age">
                        </div>

                        <div>
                            <p>ジェンダー</p>
                            <div class="radio_o_wrapper">
                                <div class="radio_option">
                                    <input type="radio" name="gender" value="男">
                                    <p>男</p>
                                </div>
                                <div class="radio_option">
                                    <input type="radio" name="gender" value="女">
                                    <p>女</p>
                                </div>
                                <div class="radio_option">
                                    <input type="radio" name="gender" value="その他">
                                    <p>その他</p>
                                </div>
                                <div class="radio_option">
                                    <input type="radio" name="gender" value="答えたくない">
                                    <p>答えたくない</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="secondary-button">子供の情報を追加する</button>
                
                </form>

            </div>       
        </div>

    </main>

    <?php
    include('components/footer.php');
    ?>
    
</body>
</html>