<?php
function get_db_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "board_example";

    $conn = NULL;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("MySQL Connection Failed! " . $e->getMessage());
    }

    return $conn;
}
