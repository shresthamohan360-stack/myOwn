<?php
session_start();
require_once 'db.php';

$userid = $_POST['userid'] ?? "";
$password = $_POST['password'] ?? "";

if ($userid == "" || $password == "") {
    header('Location: login.php?error=1');
    exit;
}

$sql = "SELECT * FROM MantenUser WHERE UserID = :userid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userid', $userid);
$stmt->execute();

$user = $stmt->fetch();

if (!$user) {
    header('Location: login.php?error=1');
    exit;
}

if (!password_verify($password, $user['Password'])) {
    header('Location: login.php?error=1');
    exit;
}

$_SESSION['userid'] = $user['UserID'];
$_SESSION['username'] = $user['UserName'];

header('Location: menu.php');
exit;
?>