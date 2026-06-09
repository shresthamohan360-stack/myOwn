<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}

$userid = $_SESSION['userid'];
$entrydate = $_POST['entrydate'];

$check1 = 1;
$check2 = isset($_POST['check2']) ? 1 : 0;
$check3 = isset($_POST['check3']) ? 1 : 0;
$check4 = isset($_POST['check4']) ? 1 : 0;
$check5 = isset($_POST['check5']) ? 1 : 0;

$comment = $_POST['comment'] ?? "";

$point = ($check1 + $check2 + $check3 + $check4 + $check5) * 20;

$sql = "REPLACE INTO MantenDiary
(UserID, EntryDate, Check1, Check2, Check3, Check4, Check5, Comment, Point)
VALUES
(:userid, :entrydate, :check1, :check2, :check3, :check4, :check5, :comment, :point)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':userid', $userid);
$stmt->bindValue(':entrydate', $entrydate);
$stmt->bindValue(':check1', $check1);
$stmt->bindValue(':check2', $check2);
$stmt->bindValue(':check3', $check3);
$stmt->bindValue(':check4', $check4);
$stmt->bindValue(':check5', $check5);
$stmt->bindValue(':comment', $comment);
$stmt->bindValue(':point', $point);

$stmt->execute();

header('Location: diary_complete.php');
exit;
?>