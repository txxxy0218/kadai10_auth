<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("funcs.php");
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
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>セイはてな｜質問管理</title>

    <script>
        $(document).ready(function() {
            // 削除ボタンがクリックされたときの処理
            $('.delete_button').click(function(event) {
                // confirmで削除確認のメッセージを表示
                if (confirm("本当にこの質問を削除しますか？")) {
                    // 「はい」の場合はフォームを送信
                    var id = $(this).data('id'); // data-id属性からIDを取得
                    console.log('リダイレクト先: http://localhost/kadai09_db2/delete.php?id=' + id);
                    window.location.href = "delete.php?id=" + id;
                } else {
                    // 「いいえ」の場合は送信をキャンセルし、元の画面に戻る
                    event.preventDefault(); // フォーム送信をキャンセル
                }
            });
        });
    </script>

</head>
<body>
    <?php
        include('components/header.php');
    ?>

    <main>
        <div class="two-column">

            <div class="post">
                <h2>新しい質問をする</h2>
                <p>※専門家からの回答が届くまでには5営業日ほどかかりますのでご了承下さい。</p>
                <form method="POST" action="insert.php">
                    <div class="input-wrapper">
                        <label for="name">ペンネーム</label>
                        <input type="text" name="name" placeholder="はなこママ">
                    </div>
                    <div class="input-wrapper">
                        <label for="email">メールアドレス</label>
                        <input type="text" name="email" placeholder="hanako@gmail.com">
                    </div>
                    <div class="input-wrapper">
                        <label for="question">ご質問</label>
                        <textarea name="question" rows="5" placeholder="質問の詳細をご入力ください"></textarea>
                    </div>
                    
                    <button type="submit" action="insert" class="primary-button">送信する</button>
                    
                </form>
            </div>

            <div class="my-q">
                <h2>あなたの質問履歴</h2>
                <table>
                    <tr>
                        <th class="t-1">No.</th>
                        <th class="t-2">ご質問</th>
                        <th class="t-3">更新</th>
                        <th class="t-4">削除</th>
                    </tr>
                <?php foreach($values as $v){ ?>
                    <tr>
                        <td class="t-1"><?=h($v["id"])?></td>
                        <td class="t-2"><?=h($v["question"])?></td>
                        <td class="t-3"><a href="question_filled.php?id=<?=h($v["id"])?>" class="edit_button">更新</a></td>
                        <td class="t-4"><a href="#" class="delete_button" data-id="<?=h($v["id"])?>">削除</a></td>
                    </tr>
                <?php } ?>
                </table>

                
            </div>

        </div>
        

        
    </main>

    <footer>
        セイはてな 2024
    </footer>
    
</body>
</html>