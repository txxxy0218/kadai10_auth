<?php
$id = $_GET["id"];

include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM sei_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
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
    <title>セイはてな｜質問管理 > 質問を編集する</title>
</head>
<body>
    <?php
        include('components/header.php');
    ?>

    <main>
        <div class="two-column">

            <div class="post">
                <div class="back">
                    <a href="question.php" class="back"><i class="fa-solid fa-arrow-left"></i>質問一覧に戻る</a>
                </div>

                <h2>質問を編集する</h2>
                <p>※専門家からの回答が届くまでには5営業日ほどかかりますのでご了承下さい。</p>
                <form method="POST" action="update.php">
                    <div class="input-wrapper">
                        <label for="name">ペンネーム</label>
                        <input type="text" name="name" value="<?=$v["name"]?>">
                    </div>
                    <div class="input-wrapper">
                        <label for="email">メールアドレス</label>
                        <input type="text" name="email" value="<?=$v["email"]?>">
                    </div>
                    <div class="input-wrapper">
                        <label for="question">ご質問</label>
                        <textarea name="question" rows="5"><?=$v["question"]?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?=$v["id"]?>">
                    
                    <button type="submit" action="update" class="primary-button">上書き保存する</button>
                    
                </form>
            </div>

        </div>
        

        
    </main>

    <footer>
        セイはてな 2024
    </footer>
    
</body>
</html>