<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("../funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kanri_user_table";
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
            <div class="page-title">
                <h1>管理者一覧</h1>
                <a href="kanri_signin.php" class="kanri_add">管理者追加 <i class="fa-solid fa-plus"></i></a>
            </div>
            
            <div class="content_wrapper">
                <div class="search_area">
                    <div class="search">
                        <input type="text" placeholder="">
                        <button type="submit">検索 <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="order">
                        <select name="order" id="order" class="order_select">
                            <option value="ID昇順">ID昇順</option>
                            <option value="ID降順">ID降順</option>
                            <option value="登録日が新しい">登録日が新しい</option>
                            <option value="登録日が古い">登録日が古い</option>
                            <option value="名前昇順">名前昇順</option>
                            <option value="名前降順">名前降順</option>
                        </select>
                        <i class="fa-solid fa-caret-down select-icon"></i>
                    </div>
                </div>
                

                <table>
                    <tr class="kanri-u-list">
                        <th class="">ID</th>
                        <th class="t-2">氏名</th>
                        <th class="t-3">権限</th>
                        <th class="">編集</th>
                        <th class="">削除</th>
                    </tr>
                <?php foreach($values as $v){ ?>
                    <tr>
                        <td class=""><?=h($v["id"])?></td>
                        <td class="t-2"><?=h($v["name"])?></td>
                        <td class="t-3"><?=h($v["kanri_flg"])?></td>
                        <td class=""><a href="kanri_edit.php?id=<?=h($v["id"])?>" class="edit_button">編集</a></td>
                        <td class=""><a href="#" class="delete_button" data-id="<?=h($v["id"])?>">削除</a></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </main>
    
    <?php
        include('components/footer.php');
    ?>

    <script>
        $(document).ready(function() {
            // 削除ボタンがクリックされたときの処理
            $('.delete_button').click(function(event) {
                // confirmで削除確認のメッセージを表示
                if (confirm("本当にこの質問を削除しますか？")) {
                    // 「はい」の場合はフォームを送信
                    var id = $(this).data('id'); // data-id属性からIDを取得
                    window.location.href = "kanri_user_delete.php?id=" + id;
                } else {
                    // 「いいえ」の場合は送信をキャンセルし、元の画面に戻る
                    event.preventDefault(); // フォーム送信をキャンセル
                }
            });
        });
    </script>

</body>
</html>