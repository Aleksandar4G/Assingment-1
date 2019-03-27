<?php
//Session starts when the user clicks the login button
session_start();

//Connects to the userregistration database
$con = mysqli_connect('sql200.epizy.com','epiz_23669130','Dr5SKzTtfkUL');
//Selects the Database
mysqli_select_db($con,'epiz_23669130_userregistration');

//Functions for the user and password
$name = $_POST['user'];
$pass = $_POST['password'];

//Messages for the if statement
$message = "Login Successful";
$message2 = "Please Ensure Login Credentials Are Correct";

//Selects from the database and searches for the name and pass
$s = "select * from usertable where name = '$name' && password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);
// If the username and password match the user will login
if($num == 1){
    $_SESSION['username'] = $name;
    header("location:create.php");
    echo "<script type='text/javascript'>alert('$message'); </script>";

} else{
    // If the username and password dont match an error message will appear
    echo "<script type='text/javascript'>alert('$message2'); </script>";

}
?>