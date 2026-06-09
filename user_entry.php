<?php
$error = "";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザ登録</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<div class="container">

    <div class="header">
        満点ダイアリー
    </div>

    <div class="content">

        <?php if($error != "") { ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php } ?>

        <div class="green-title">
            必要事項を入力してください
        </div>

        <form action="user_entry_ok.php" method="post">

            <p>ユーザ名</p>
            <input type="text" name="username">

            <p>UserID</p>
            <input type="text" name="userid">

            <p>Password</p>
            <input type="password" name="password">

            <p>Password(再入力)</p>
            <input type="password" name="password2">

            <br><br>

            <button type="submit">登録</button>

        </form>

        <br>

        <a href="index.php">
            インデックス画面に戻る
        </a>

    </div>

</div>

</body>
</html>