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
    <title>セイはてな｜ログイン</title>
</head>
<body>
    <header>
        <a href="index.php" class="logo">セイはてな</a>
    </header>

    <main>
        <div class="log-wrapper">
            <h2 class="log_title">ログイン</h2>
            <form action="login_act.php" method="POST">
                <p class="error">IDかパスワードが間違っています。</p>
                <div class="input-wrapper">
                    <label for="lid">ID（登録時のメールアドレス）</label>
                    <input type="text" name="lid" placeholder="例：hanakomama@seihatena.com">
                </div>
                <div class="input-wrapper">
                    <label for="lpw">パスワード</label>
                    <div class="pw-wrapper">
                        <input type="password" id="lpw" name="lpw">
                        <div class="eye" id="passview"><i class="fa-regular fa-eye"></i></div>
                    </div>
                </div>

                <button type="submit" class="primary-button fill-btn">送信する</button>
            </form>

            <div class="switch-log">
                <p>アカウントをお持ちではない方</p>
                <a href="signin.php">新規登録する</a>
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
            let passviewIcon = $("#passview i");

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

        });
    </script>

</body>
</html>