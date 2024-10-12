<?php 

    //【重要】
    //insert.phpを修正（関数化）してからselect.phpを開く！！
    include("funcs.php");
    $pdo = db_conn();

    //２．データ登録SQL作成
    $sql = "SELECT * FROM sei_user_table JOIN kids_table ON sei_user_table.lid = kids_table.lid";
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

        <h1>プロフィール</h1>

        <div class="prof-wrapper">
            <a href="prof_edit.php" class="link"><i class="fa-solid fa-pen-to-square"></i> 編集する</a>
            <h2>基本情報</h2>
            <div class="basic-prof-wrapper">
                <img src="img/1.png" alt="" class="lg-icon">
                <div class="basic-prof">
                    <h2><?=$_SESSION["name"]?></h2>
                    <div class="prof-item">
                        <h4>ID</h4>
                        <p><?=$_SESSION["lid"]?></p>
                    </div>
                    <div class="prof-item">
                        <h4>パスワード</h4>
                        <p>******</p>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="prof-wrapper"> 
            <a href="kids_edit.php" class="link"><i class="fa-solid fa-pen-to-square"></i> 編集する</a>
            <div class="kids-prof-wrapper">
                <h2>子供の情報</h2>
                
                <table class="kids_table">
                    <tr>
                        <th class="">名前</th>
                        <th class="">誕生日</th>
                        <th class="">年齢</th>
                        <th class="">ジェンダー</th>
                    </tr>
                <?php foreach($values as $v){ ?>
                    <tr>
                        <td class=""><?=h($v["k_name"])?></td>
                        <td class=""><?=h($v["birthday"])?></td>
                        <td class=""><?=h($v["age"])?>歳</td>
                        <td class=""><?=h($v["gender"])?></td>
                    </tr>
                <?php } ?>
                </table>

                <a href="kids_edit.php" class="secondary-button">子供の情報を追加する</a>
            </div>
        </div>

    </main>

    <?php
    include('components/footer.php');
    ?>
    
</body>
</html>