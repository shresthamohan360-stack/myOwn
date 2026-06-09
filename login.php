<?php
$error = $_GET['error'] ?? "";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<div class="container">
    <div class="header">満点ダイアリー</div>

    <div class="content">

        <?php if ($error != "") { ?>
            <p style="color:red;">UserIDまたはPasswordに誤りがあります</p>
        <?php } ?>

        <div class="green-title">ログインしてください</div>

        <form action="login_ok.php" method="post">
            <p>UserID</p>
            <input type="text" name="userid">

            <p>Password</p>
            <input type="password" name="password">

            <br><br>

            <button type="submit">ログイン</button>
        </form>

        <br>

        <a href="user_entry.php">新規登録はこちら</a>

    </div>
</div>

</body>
</html>