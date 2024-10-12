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
    <title>セイはてな</title>
</head>
<body>
    <?php
        include('components/header.php');
    ?>

    <main>
        <div class="search">
            <input type="text" placeholder="検索したい質問を入力">
            <button type="submit">検索 <i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="questions-wrapper">

            <div class="questions" id="sex">
                <img src="img/1.png" alt="" class="img">
                <h3>セックス・避妊について</h3>
                <ul>
                    <li><a href="">セックスってなに？</a></li>
                    <li><a href="">セックスは何歳からしていいの？</a></li>
                    <li><a href="">コンドームってなに？</a></li>
                </ul>
                <a href="" class="more">このカテゴリの質問をもっと見る</a>
            </div>

            <div class="questions" id="fertility">
                <img src="img/2.png" alt="" class="img">
                <h3>妊娠・出産について</h3>
                <ul>
                    <li><a href="">赤ちゃんはどこからくるの？</a></li>
                    <li><a href="">お父さんも妊娠できるの？</a></li>
                    <li><a href="">赤ちゃんはどうやってお母さんのお腹に入るの？</a></li>
                </ul>
                <a href="" class="more">このカテゴリの質問をもっと見る</a>
            </div>

            <div class="questions" id="gender">
                <img src="img/3.png" alt="" class="img">
                <h3>ジェンダーについて</h3>
                <ul>
                    <li><a href="">男の子が女の子っぽいことを好きでもいいの？</a></li>
                    <li><a href="">男の子と女の子の違いって何？</a></li>
                    <li><a href="">同性を好きになるのはいけないことなの？</a></li>
                </ul>
                <a href="" class="more">このカテゴリの質問をもっと見る</a>
            </div>

            <div class="questions" id="woman">
                <img src="img/4.png" alt="" class="img">
                <h3>女性の身体について</h3>
                <ul>
                    <li><a href="">なんでお母さんのおっぱいは大きいの？</a></li>
                    <li><a href="">生理って何？どうして始まるの？</a></li>
                    <li><a href="">生理が来ると赤ちゃんができるって本当？</a></li>
                </ul>
                <a href="" class="more">このカテゴリの質問をもっと見る</a>
            </div>

            <div class="questions" id="man">
                <img src="img/5.png" alt="" class="img">
                <h3>男性の身体について</h3>
                <ul>
                    <li><a href="">なんで男の子にだけおちんちんがあるの？</a></li>
                    <li><a href="">男の子の声が変わるのはなぜ？いつまで変わるの？</a></li>
                    <li><a href="">大人になったらいろんなところから毛が生えてくるのはなんで？</a></li>
                </ul>
                <a href="" class="more">このカテゴリの質問をもっと見る</a>
            </div>

            <div class="questions" id="private">
                <img src="img/6.png" alt="" class="img">
                <h3>プライベートゾーンについて</h3>
                <ul>
                    <li><a href="">なんでお風呂は裸で入るのにプールは水着を着なきゃいけないの？</a></li>
                    <li><a href="">プライベートゾーンってなに？</a></li>
                    <li><a href="">誰かにプライベートゾーンを触られたら、どうしたらいいの？</a></li>
                </ul>
                <a href="" class="more">このカテゴリの質問をもっと見る</a>
            </div>

        </div>
    </main>

    <?php
    include('components/footer.php');
    ?>
    
</body>
</html>