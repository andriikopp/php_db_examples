<?php
session_start();

require_once "connect_db.php";

$conn = get_db_connection();

if (!empty($_POST["login"]) && !empty($_POST["pass"])) {
    $login = trim($_POST["login"]);
    $pass = md5(trim($_POST["pass"]));

    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT `login` FROM `moder` WHERE `login` = ? AND `pass` = ?");
    $stmt->execute([$login, $pass]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    $conn = null;

    if (count($results) == 1) {
        $_SESSION["login"] = $login;

        header("location: manage.php");
    } else {
        header("location: moder.php?error=true");
    }
} else {
    header("location: moder.php?error=true");
}
