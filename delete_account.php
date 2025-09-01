<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eteeapuserdb2";

$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION["username"];
$query = "DELETE FROM eteeapusertbl2 WHERE username='$username'";

if (mysqli_query($conn, $query)) {
    session_destroy();
    echo "<script>alert('Your account has been deleted successfully.'); window.location='login.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
