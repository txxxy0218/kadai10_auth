<?php
session_start();
?>

<header>
    <div class="logo"><a href="index.php">セイはてな</a></div>
    <div class="nav">
        <a href="" class="like"><i class="fa-solid fa-heart"></i> いいね</a>
        <a href="question.php" class="post-question"><i class="fa-solid fa-paper-plane"></i> 質問管理</a>
        <?php
        if(!$_SESSION){
            print '<a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> ログイン</a>';
        } else {
            print '<a href="profile.php"><i class="fa-solid fa-circle-user"></i> プロフィール</a>';
        }
        if($_SESSION){
            print '<a href="logout.php">ログアウト</a>';
        }
        ?>
        
    </div>
</header>
