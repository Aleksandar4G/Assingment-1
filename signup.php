<?php
//Session starts when the user has entered values into the signup
session_start();

//Connects to the userregistration database
$con = mysqli_connect('sql200.epizy.com','epiz_23669130','Dr5SKzTtfkUL');

mysqli_select_db($con,'epiz_23669130_userregistration');
//Functions for the user and password
$name = $_POST['user'];
$pass = $_POST['password'];

//Selectes and where to store the details
$s = "select * from usertable where name = '$name'";


$result = mysqli_query($con, $s);

//The following functions execute in the if statement
$message = "User Name has been taken. Please Try Again";
$message2 = "Signup was Successful :)"; 
$num = mysqli_num_rows($result);

if($num == 1){
    echo "<script type='text/javascript'>alert('$message'); </script>";

}else{
//If the username has not been taken, the user has successfully signed up
    $reg = " insert into usertable(name, password) values ('$name' , '$pass')";
    mysqli_query($con, $reg);
    echo "<script type='text/javascript'>alert('$message2'); </script>";
}



?>