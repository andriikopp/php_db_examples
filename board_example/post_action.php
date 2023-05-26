<?php
require_once "connect_db.php";

$conn = get_db_connection();

if (!empty($_POST["username"]) && !empty($_POST["message"])) {
    $username = trim($_POST["username"]);
    $avatar_url = NULL;
    $message = trim(htmlspecialchars($_POST["message"]));
    $image_url = NULL;

    $sql = NULL;

    if (!empty($_POST["avatar_url"])) {
        $avatar_url = trim($_POST["avatar_url"]);
    } else {
        $avatar_url = "https://www.computerhope.com/jargon/g/guest-user.png";
    }

    if (!empty($_POST["image_url"])) {
        $image_url = trim($_POST["image_url"]);
        $sql = "INSERT INTO post (username, avatar_url, `message`, image_url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $avatar_url, $message, $image_url]);
    } else {
        $sql = "INSERT INTO post (username, avatar_url, `message`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $avatar_url, $message]);
    }

    $conn = null;

    header("location: index.php");
} else {
    header("location: post.php?error=true");
}
