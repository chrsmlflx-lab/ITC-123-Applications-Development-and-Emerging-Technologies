<?php
$server_name ="localhost";
$db_username = "root";
$db_password ="";
$db_name ="eteeapuserdb2";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if(!$conn){
    die("Failed to connect to the server: " . mysqli_connect_error());
}
?>
<html>
<head>
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        h3 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
        }
        th {
            background: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #f1f1f1;
        }
        td a {
            text-decoration: none;
            color: #e74c3c;
            font-weight: bold;
            border: 1px solid #e74c3c;
            padding: 5px 10px;
            border-radius: 4px;
            transition: 0.3s;
        }
        td a:hover {
            background: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
<h3>USER LIST</h3>
<table>
<tr>
    <th>User ID</th>
    <th>UserName</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
</tr>
<tbody>
<?php
$query = "SELECT * FROM eteeapusertbl2";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($Row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $Row["id"]; ?></td>
            <td><?php echo $Row["username"]; ?></td>
            <td><?php echo $Row["firstname"]; ?></td>
            <td><?php echo $Row["lastname"]; ?></td>
            <td>
                <a href="delete.php?id=<?php echo $Row['id']; ?>" 
                   onclick="return confirm('Are you sure you want to delete this user?');">
                   Delete
                </a>
            </td>
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='5' align='center'>No records found</td></tr>";
}
mysqli_close($conn);
?>
</tbody>
</table>
</body>
</html>

