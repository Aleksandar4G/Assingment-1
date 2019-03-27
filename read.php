
<?php include "templates/header.php";?>

<?php 
// this code will only execute after the submit button is clicked
if (!isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM working";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<?php  
    if (!isset($_POST['submit'])) {
        //if there are some results
        if ($result && $statement->rowCount() > 0) { ?>

<h2>Results</h2>

<!-- This is a loop, which will loop through each result in the array -->
<?php foreach($result as $row) { ?>

<!-- This Displays the entered Data -->
<p>
ID : <?php echo $row['id']; ?><br>
Total Income : <?php echo $row['totalincome']; ?><br> 
Bills : <?php echo $row['bills']; ?><br> 
Petrol :    <?php echo $row['petrol']; ?><br> 
Groceries :     <?php echo $row['groceries']; ?><br> 
Daily Spendings :    <?php echo $row['dailyspendings']; ?><br> 
</p>

<?php 
            
        ?>

<br>
<?php }; //close the foreach
        }; 
    }; 
?>

<form method="post">
    <input type="submit" name="submit" value="View Data" class="btn btn-primary">
</form>
