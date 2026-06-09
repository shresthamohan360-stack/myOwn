<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}

$userid = $_SESSION['userid'];
$today = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>日記入力</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<div class="container">
    <div class="header">満点ダイアリー</div>

    <div class="content">
        <div class="green-title">今日の日記を入力してください</div>

        <form action="diary_input_ok.php" method="post">
            <input type="hidden" name="entrydate" value="<?php echo $today; ?>">

            <p>
                <input type="checkbox" name="check1" value="1" checked onclick="return false;">
                毎日日記を付ける
            </p>

            <p><input type="checkbox" name="check2" value="1"> 時間通りに起きる</p>
            <p><input type="checkbox" name="check3" value="1"> 遅刻をしない</p>
            <p><input type="checkbox" name="check4" value="1"> 栄養バランスを考えた食事をする</p>
            <p><input type="checkbox" name="check5" value="1"> ちゃんとした挨拶をする</p>

            <p>今日の一言</p>
            <textarea name="comment" rows="4" cols="30"></textarea>

            <br><br>
            <button type="submit">送信</button>
        </form>

        <br>
        <a href="menu.php">メニューに戻る</a>
    </div>
</div>

</body>
</html>