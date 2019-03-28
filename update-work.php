<?php 

    // This Statement requires the following 2 files
    require "config.php";
    require "common.php";


    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
            $work =[
              "id"         => $_POST['id'],
              "totalincome" => $_POST['totalincome'],
              "bills"  => $_POST['bills'],
              "petrol"   => $_POST['petrol'],
              "groceries"   => $_POST['groceries'],
              "dailyspendings" => $_POST['dailyspendings'],
              "date"   => $_POST['date'],
            ];
            
            // create SQL statement
            $sql = "UPDATE `working` 
                    SET id = :id, 
                        totalincome = :totalincome, 
                        bills = :bills, 
                        petrol = :petrol, 
                        groceries = :groceries, 
                        date = :date 
                    WHERE id = :id";

            
            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($work);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    // GET data from DB
    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM working WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };

?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work Successfully Has Been Updated.</p>
<?php endif; ?>

<h2>Edit a work</h2>

<form method="post">
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" class ="form-control" value="<?php echo escape($work['id']); ?>" >
    
    <label for="totalincome">Total Income</label>
    <input type="number" name="totalincome" id="totalincome" class ="form-control" value="<?php echo escape($work['totalincome']); ?>">

    <label for="bills">Bills</label>
    <input type="number" name="bills" id="bills" class ="form-control" value="<?php echo escape($work['bills']); ?>">

    <label for="petrol">Petrol</label>
    <input type="number" name="petrol" id="petrol" class ="form-control" value="<?php echo escape($work['petrol']); ?>">

    <label for="groceries">Groceries</label>
    <input type="number" name="groceries" id="groceries" class ="form-control" value="<?php echo escape($work['groceries']); ?>">
    
    <label for="dailyspendings">Daily Spendings</label>
    <input type="number" name="dailyspendings" id="dailyspendings" class ="form-control" value="<?php echo escape($work['dailyspendings']); ?>">
    
    <label for="date">Work Date</label>
    <input type="text" name="date" class ="form-control" id="date" value="<?php echo escape($work['date']); ?>">

    <input type="submit" name="submit" value="Update" class="btn btn-primary">

</form>

<?php include "templates/footer.php"; ?>
