<?php
session_start();

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eteeapuserdb2";

$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Failed to connect: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM eteeapusertbl2 WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $resultSet = mysqli_fetch_assoc($result);

        $_SESSION["username"] = $resultSet["username"];
        $_SESSION["id"] = $resultSet["id"];

        mysqli_close($conn);

        echo "<script>alert('LOG-IN SUCCESSFUL!!!'); window.location.href='welcome.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!'); window.location.href='login.php';</script>";
    }
} else {
    die("There is some error");
}

mysqli_close($conn);
?>
