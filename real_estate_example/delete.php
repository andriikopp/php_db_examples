<?php
session_start();

require_once "connection.php";

if (!isset($_SESSION["user_name"])) {
    header("location: index.php");
}

$stmt = $conn->prepare("DELETE FROM real_estate_offers WHERE reo_id = ?");
$stmt->execute([$_GET["id"]]);

$conn = null;
header("location: home.php");
