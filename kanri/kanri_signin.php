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
    <title>セイはてな管理｜管理者追加</title>
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
                <h1>管理者追加</h1>
            </div>
            
            <div class="content_wrapper">
                <form action="kanri_signin_act.php" method="POST" class="kanri_signin_form">
                    <div class="input-wrapper">
                        <label for="name">氏名</label>
                        <input type="text" name="name" placeholder="例：田中太郎">
                    </div>
                    <div class="input-wrapper">
                        <label for="lid">ID（メールアドレス）</label>
                        <input type="text" name="lid" placeholder="例：tanaka@seihatena.com">
                    </div>
                    <div class="input-wrapper">
                        <label for="lpw">パスワード</label>
                        <div class="pw-wrapper">
                            <input type="password" id="lpw" name="lpw">
                            <div class="eye" id="passview"><i class="fa-regular fa-eye"></i></div>
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <label for="lpw">パスワード確認</label>
                        <div class="pw-wrapper">
                            <input type="password" id="lpw_confirm" name="lpw_confirm">
                            <div class="eye" id="passview2"><i class="fa-regular fa-eye"></i></div>
                        </div>
                    </div>
                    <div class="input-wrapper radio_btn">
                        <label for="kanri_flg">管理者権限</label>
                        <div class="radio_o_wrapper">
                            <div class="radio_option">
                                <input type="radio" name="kanri_flg" value="0">マスター管理者
                            </div>
                            <div class="radio_option">
                                <input type="radio" name="kanri_flg" value="1">一般管理者
                            </div>
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <input type="hidden" name="life_flg" value="0">
                    </div>

                    <button type="submit" class="primary-button">登録する</button>
                </form>
                
            </div>
        </div>
    </main>
    
    <?php
        include('components/footer.php');
    ?>

    <script>
        $(document).ready(function() {

            // (1)パスワード入力欄とボタンのHTMLを取得
            let lpw = $("#lpw");
            let lpw_confirm = $("#lpw_confirm");
            let passviewIcon = $("#passview i");
            let passviewIcon2 = $("#passview2 i");

            // (2)ボタンのイベントリスナーを設定
            $("#passview").on("click", function(e) {

                // (3)ボタンの通常の動作をキャンセル（フォーム送信をキャンセル）
                e.preventDefault();

                // (4)パスワード入力欄のtype属性を確認
                if (lpw.attr('type') === 'password') {
                    // (5)パスワードを表示する
                    lpw.attr('type', 'text');
                    // アイコンをfa-eyeからfa-eye-slashに変更
                    passviewIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    // (6)パスワードを非表示にする
                    lpw.attr('type', 'password');
                    // アイコンをfa-eye-slashからfa-eyeに変更
                    passviewIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // (2)ボタンのイベントリスナーを設定
            $("#passview2").on("click", function(e) {

                // (3)ボタンの通常の動作をキャンセル（フォーム送信をキャンセル）
                e.preventDefault();

                // (4)パスワード入力欄のtype属性を確認
                if (lpw_confirm.attr('type') === 'password') {
                    // (5)パスワードを表示する
                    lpw_confirm.attr('type', 'text');
                    // アイコンをfa-eyeからfa-eye-slashに変更
                    passviewIcon2.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    // (6)パスワードを非表示にする
                    lpw_confirm.attr('type', 'password');
                    // アイコンをfa-eye-slashからfa-eyeに変更
                    passviewIcon2.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

        });
    </script>

</body>
</html>