<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("../funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM sei_an_table";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>セイはてな管理｜管理者ログイン</title>
</head>
<body>
    <?php
        include('components/header.php');
    ?>

    <main>
        <?php
            include('components/nav_bar.php');
        ?>

        <div class="main_wrapper">
            <h1>トップ</h1>
            <div class="content_wrapper">
                <h2>新着質問</h2>
                <table>
                    <tr>
                        <th class="t-1">No.</th>
                        <th class="t-2">質問内容</th>
                        <th class="t-3">ユーザー</th>
                        <th class="t-4">回答</th>
                    </tr>
                <?php foreach($values as $v){ ?>
                    <tr>
                        <td class="t-1"><?=h($v["id"])?></td>
                        <td class="t-2"><?=h($v["question"])?></td>
                        <td class="t-3"><?=h($v["name"])?></td>
                        <td class="t-4"><a href="question_filled.php?id=<?=h($v["id"])?>" class="edit_button">回答する</a></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </main>
    
    <?php
        include('components/footer.php');
    ?>

</body>
</html>