<?php

$servername =  "localhost";
$username =  "root";
$dbpassword = "";
$dbname =  "sky";

//establishing connection to database
$connection = mysqli_connect($servername, $username, $dbpassword, $dbname);

$firstname = "Ayedun";
$lastname = "James";
$phone_number = "+2348126554129";
$address = "University Drive, Idofin Road off Oko Medical Center";
$email = "test@gmail.com";
$password = md5("password");


//adding record to database
// $insertQuery = "INSERT INTO users (firstname, lastname, phone_number, address, email, password) VALUES('$firstname', '$lastname', '$phone_number','$address', '$email','$password')";
// // $insertQuery = "INSERT INTO users (firstname, lastname, email, password, address, phonenumber)  VALUES ('$firstname','$lastname', '$email', '$password', '$address', '$phonenumber')";
// $executeQuery = mysqli_query($connection, $insertQuery);
// if($executeQuery) {
//     $executestatus = "Record inserted successfully";
// }else{
//     $executestatus = "Error while insertng record";
// }
// $connectionStatus = $connection
// ?"Database Connection Successful"
// :"Database Connection Failed";



if(isset($_POST['add_record'])){

    $firstname = mysqli_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_escape_string($connection, $_POST['lastname']);
    $phone_number = mysqli_escape_string($connection, $_POST['phone_number']);
    $email = mysqli_escape_string($connection, $_POST['email']);
    $password = mysqli_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);
    $address = mysqli_escape_string($connection, $_POST['address']);

    $error = null;
    $success = null;
    $pass = null;

    if($password != $confirm_password){
        $error = 'password mismatch';
    }else{
        $pass = md5($password);
    }

    $insertQuery = "INSERT INTO users (firstname, lastname, phone_number,email, password, confirm_password, address, )  VALUES ('$firstname','$lastname', '$email', '$password', '$address', '$phone_number')";

    $excecuteQuery = mysqli_query($connection, $insertQuery);

    if ($excecuteQuery) {
        $success = 'Record Inserted Successfully';
    }else{
        $error = 'Error While Inserting Record';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Record</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh
        }
        
        h2{
            color: green;
        }
        button{
            align-items: center;
            background-color: grey;
            color: green;
            width: 70%;
            height: 30px;

        }
    </style>
</head>
<body>
    <hr>
    <?php if(!empty($error)){ ?>
    <p style = "background-color: red; color: #fff; padding: 20px;"><?= $error ?></p>
    <?php } ?>
    <?php if(!empty($success)){ ?>
    <p style = "background-color: green; color: #fff; padding: 20px;"><?= $success ?></p>
    <?php } ?>
    <hr>
    <form action="insertion.php" method="POST" enctype="">
        <h2>WELCOME</h2> 
        <div class="inputbox">
            <label for="">Firstname:</label>
            <input type="text" name="firstname" id="" placeholder="Enter firstname" required>
        </div>
        <div class="inputbox">
            <label for="">Lastname:</label>
            <input type="text" name="lastname" id="" placeholder="Enter lastname" required>
        </div>
        <div class="inputbox">
            <label for="">Email:</label>
            <input type="email" name="email" id="" placeholder="Enter email address" required>
        </div>
        <div class="inputbox">
            <label for="">Password:</label>
            <input type="password" name="password" id="" placeholder="Enter your password" required>
        </div>
        <div class="inputbox">
            <label for="">Confirm Password:</label>
            <input type="confirm_password" name="confirm_password" id="" placeholder="Confirm your password" required>
        </div>
        <div class="inputbox">
            <label for="">Phone Number:</label>
            <input type="phone_number" name="phone_number" id="" placeholder="Enter phone number" required>
        </div>
        <div class="inputbox">
            <label for="">Address:</label>
            <textarea name="address" id="address" placeholder="Enter your address" cols="3" rows="10"></textarea>
            <!-- <input type="text" name="address" id="" placeholder="Enter your address" required> -->
        </div>
        
        <button type="submit" name="add_record" span>Submit</button>
    </form>
</body>
</html>