<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// DB Connection
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eteeapuserdb2";

$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT id, username, firstname, lastname FROM eteeapusertbl2");
?>
<!doctype html>
<html lang="en">
<head>
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }
        section {
            margin: 20px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 60%;
        }
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s, transform 0.2s;
        }
        .logout {
            background: #e74c3c;
        }
        .logout:hover {
            background: #c0392b;
            transform: scale(1.05);
        }
        .delete {
            background: #d35400;
        }
        .delete:hover {
            background: #a84300;
            transform: scale(1.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .delete-btn {
            padding: 6px 12px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
<section>
    <h2>Welcome, <?php echo $_SESSION["username"]; ?> !</h2>
    <a class="btn logout" href="logout.php">Log Out</a>
    <a class="btn delete" href="delete_account.php" onclick="return confirm('Are you sure you want to delete your account?');">Delete My Account</a>
</section>

<section>
    <h2>List of Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['lastname']."</td>
                        <td>
                            <form method='POST' action='delete_user.php' onsubmit=\"return confirm('Are you sure you want to delete this user?');\">
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <button type='submit' class='delete-btn'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found.</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</section>
</body>
</html>
