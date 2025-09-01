<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $server_name = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "eteeapuserdb2";

    $conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = intval($_POST["id"]);

    $sql = "DELETE FROM eteeapusertbl2 WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: welcome.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: welcome.php");
    exit();
}
?>
