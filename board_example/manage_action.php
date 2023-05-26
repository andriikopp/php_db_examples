<?php
session_start();

include_once "header.php";

if (!isset($_SESSION["login"])) {
    header("location: moder.php");
}

require_once "connect_db.php";

$conn = get_db_connection();

if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];

    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM `post` WHERE `id` = ?");
    $stmt->execute([$id]);
    $conn = null;
}

header("location: manage.php");
