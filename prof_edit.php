<?php 

    //【重要】
    //insert.phpを修正（関数化）してからselect.phpを開く！！
    include("funcs.php");
    $pdo = db_conn();

    //２．データ登録SQL作成
    $sql = "SELECT * FROM sei_user_table";
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
    <title>セイはてな｜プロフィール編集</title>
</head>
<body>
    <?php
        include('components/header.php');
    ?>

    <main>

        <h1>プロフィール編集</h1>

        <div class="prof-wrapper">
            <form action="prof_edit_update.php" method="POST">
            
                <button type="submit" class="link">保存する</button>

                <h2>基本情報</h2>
                <div class="basic-prof-wrapper">

                    <img src="img/1.png" alt="" class="lg-icon">

                    <div class="basic-prof">
                        <div class="input-wrapper">
                            <label for="name">ペンネーム</label>
                            <input type="text" name="name" value="<?=$_SESSION["name"]?>">
                        </div>
                        <div class="input-wrapper">
                            <label for="lid">ID（メールアドレス）</label>
                            <input type="text" name="lid" value="<?=$_SESSION["lid"]?>">
                        </div>
                        <div class="input-wrapper">
                            <label for="lpw">パスワード</label>
                            <div class="pw-wrapper">
                                <input type="password" id="lpw" name="lpw">
                                <div class="eye" id="passview"><i class="fa-regular fa-eye"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            
        </div>

    </main>

    <?php
    include('components/footer.php');
    ?>
    
</body>
</html>