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
    <title>セイはてな｜新規登録</title>
</head>
<body>
    <header>
        <div class="logo">セイはてな</div>
    </header>

    <main>
        <div class="log-wrapper">
            <h2 class="log_title">新規登録</h2>
            <form action="signin_act.php" method="POST">
                <div class="input-wrapper">
                    <label for="name">ユーザー名</label>
                    <input type="text" name="name" placeholder="例：はなこママ">
                </div>
                <div class="input-wrapper">
                    <label for="lid">ID（メールアドレス）</label>
                    <input type="text" name="lid" placeholder="例：hanakomama@seihatena.com">
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
                <div class="input-wrapper">
                    <input type="hidden" name="u_type" value="0">
                    <input type="hidden" name="life_flg" value="0">
                </div>

                <button type="submit" class="primary-button fill-btn">新規登録する</button>
            </form>

            <div class="switch-log">
                <p>アカウントをお持ちの方</p>
                <a href="login.php">ログインする</a>
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