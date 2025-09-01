
<html>
<body>
<?php
$server_name ="localhost";
$db_username = "root";
$db_password ="";
$db_name ="eteeapuserdb2";
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);
if(!$conn){
die("failed to connect to the server". mysqli_connect_error());
} else {
echo "RECORD ADDED SUCCESFULLY!!! <BR><BR>";
include("viewrecords.html");
}
$username =$_POST['uname'];
$password =$_POST['pword'];
$first =$_POST['fname'];
$last =$_POST['lname'];
$query = "INSERT INTO eteeapusertbl2 VALUES('','$username','$password','$first','$last')";
mysqli_query($conn,$query);
?>
</body>
</html>