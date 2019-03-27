<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Spending Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div style="text-align:center">
    <h1>Spending Tracker </h1>
    </div>
<!-- These is the main screen where the user needs to sign up or login -->
    <h2> Login </h2>
        <form action="secure.php" method = "post"> 
            <label> Username </label>
             <input type="text" name="user" class ="form-control" required>

             <label> Password</label>
             <input type="password" name="password" class ="form-control" required>
             <button type="submit" class="btn btn-primary"> Login </button>
              
        </form>

    <h2> Sign Up </h2>
        <form action="signup.php" method="post"> 
            <label> Sign Up </label>
             <input type="text" name="user" class="form-control" required>

             <label> Password</label>
             <input type="password" name="password" class="form-control" required>
            <!-- This submit function goes to the signup.php to verfiy the details -->
             <button type="submit" class="btn btn-primary"> Sign Up </button>  
        </form>

</body>
</html>