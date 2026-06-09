<?php
require_once 'db.php';

$username = $_POST['username'];
$userid = $_POST['userid'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($username == "") {
    exit('ユーザ名を入力してください');
}

if ($userid == "") {
    exit('UserIDを入力してください');
}

if (!preg_match('/^[a-zA-Z0-9_]+$/', $userid)) {
    exit('UserIDには半角英数字と_のみ使用可能です');
}

if ($password == "") {
    exit('Passwordを入力してください');
}

if ($password2 == "") {
    exit('Password(再入力)を入力してください');
}

if ($password != $password2) {
    exit('Passwordが一致しません');
}

$sql = "SELECT * FROM MantenUser WHERE UserID = :userid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userid', $userid);
$stmt->execute();

$user = $stmt->fetch();

if ($user) {
    exit('入力されたUserIDは登録済みです');
}

$hashPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO MantenUser
(UserID, UserName, Password)
VALUES
(:userid, :username, :password)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':userid', $userid);
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $hashPassword);

$stmt->execute();

header('Location: user_entry_complete.php');
exit;
?>