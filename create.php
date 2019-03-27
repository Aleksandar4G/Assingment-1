
<?php include "templates/header.php"; ?>

<?php
    //Session only starts when the user logs in
session_start();
    //The if Statement starts when user is successfully signed in
if(!isset($_SESSION['username'])){
    header('location:signup.php');

}
    //if statement is when the user hits the submit function it will execute the following
if (isset($_POST ['submit'])){

    require "config.php";

 try {
    $connection = new PDO($dsn, $username, $password, $options);

    //Get contentent of the form and store it in an array
    //Content that the user has inserted
    $new_work = array(
        "totalincome" => $_POST['totalincome'],
        "bills" => $_POST['bills'],
        "petrol" => $_POST['petrol'],
        "groceries" => $_POST['groceries'],
        "dailyspendings" => $_POST['dailyspendings'],
    );

    $sql = "INSERT INTO `working` (totalincome, bills, petrol, groceries, dailyspendings ) VALUES (:totalincome, :bills, :petrol, :groceries, :dailyspendings)";

    $sql1 = "SELECT SUM(totalincome, bills, petrol, groceries, dailyspendings)  FROM (working)";

    $statement = $connection -> prepare($sql);
    $statement-> execute($new_work);
   }catch(PDOException $error){
       echo $sql . "<br>" . $error -> getMessage(); 
   }
 }
?>


<h1> Spending Tracker </h1>
<!-- Following if statement executes when submit function is executeed -->
<?php if (isset($_POST['submit']) && $statement) { ?>

<h3>Work Has Been Successfully Added.</h3>

<br>

<?php } ?>

<!-- The following form is where the user inputs the numbers -->
<form method="post">
    <label for="Total Income">Total Income</label>
    <input type="number" name="totalincome" id="totalincome" class ="form-control">

    <label for="Bills">Bills</label>
    <input type="number" name="bills" id="bills" class ="form-control">

    <label for="Petrol">Petrol</label>
    <input type="number" name="petrol" id="petrol" class ="form-control">

    <label for="Groceries">Groceries</label>
    <input type="number" name="groceries" id="groceries" class ="form-control">

    <label for="Daily Spendings"> Daily Spendings </label>
    <input type="number" name="dailyspendings" id="dailypsendings" class ="form-control">

    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

</form>
    
<?php include "templates/footer.php"?>

 



