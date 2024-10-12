<?php
session_start()
?>

<header>
    <div class="logo"><a href="kanri_index.php">セイはてな管理</a></div>
    <div class="nav">
        <p><?=$_SESSION["name"]?></p>
        <a href="kanri_logout.php" class="log_out">ログアウト</a>
    </div>
</header>
