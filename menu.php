<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>トップメニュー</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<div class="container">
    <div class="header">満点ダイアリー</div>

    <div class="content">

        <p>ようこそ　<?php echo htmlspecialchars($username); ?>さん</p>

        <div class="green-title">メニューより選んでください</div>

        <a href="diary_input.php" class="blue-btn">日記を入力する</a>
        <a href="diary_list.php" class="blue-btn">過去の日記を見る</a>
        <a href="ranking_month.php" class="blue-btn">ランキングを見る</a>
        <a href="user_edit.php" class="blue-btn">ユーザ情報を変更する</a>
        <a href="logout.php" class="blue-btn">ログアウトする</a>

    </div>
</div>

</body>
</html>