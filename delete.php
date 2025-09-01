<html>
<body>
<?php
$server_name ="localhost";
$db_username = "root";
$db_password ="";
$db_name ="eteeapuserdb2";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if(!$conn){
    die("Failed to connect to the server: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM eteeapusertbl2 WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script>
        alert('User deleted successfully!');
        window.location='displaydatausers.php';
      </script>";
	  include("viewrecords.html");

    }
}

mysqli_close($conn,$query);
?>
</tbody>
</table>
</body>
</html>
