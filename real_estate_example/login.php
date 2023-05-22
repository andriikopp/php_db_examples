<?php
session_start();

require_once "connection.php";

$userName = $_POST["userName"];
$userPass = $_POST["userPass"];

$stmt = $conn->prepare("SELECT user_name, user_pass FROM real_estate_admin WHERE user_name = ? AND user_pass = ?");
$stmt->execute([$userName, md5($userPass)]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$userList = $stmt->fetchAll();

if (count($userList) > 0) {
    $_SESSION["user_name"] = $userName;
    $conn = null;
    header("location: home.php");
} else {
    $conn = null;
    header("location: index.php?error=true");
}
