<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "gym";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO `gym`.`gym_data` (`name`, `age`, `gender`, `email`, `phone`) VALUES ('$name', '$age', '$gender', '$email', '$phone');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Fitness</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/gym.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="left">
            <img src="https://cdn.pixabay.com/photo/2016/12/14/02/51/gym-1905523_960_720.png" alt="">
            <div>City Fitness</div>
        </div>
        <div class="mid">
            <ul class="navbar">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Classes</a></li>
                <li><a href="#">Trainers</a></li>
                <li><a href="#">Membership</a></li>
            </ul>
        </div>
        <div class="right">
            <button class="btn">Contact</button>
            <button class="btn">Email Us</button>
        </div>
    </header>
    <div class="container">
        <div class="registration-form">
            <h3>Registration Form</h3>
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Enter your Name">
                </div>
                <div class="form-group">
                    <input type="text" name="age" id="age" id="name" placeholder="Enter your Age">
                </div>
                <div class="form-group">
                    <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Enter your Email Id">
                </div>
                <div class="form-group">
                    <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
                </div>
                <button class="btn">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>