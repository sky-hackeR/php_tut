<?php

include('connection.php');


if(isset($_POST['add_record'])){

    $firstname = mysqli_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_escape_string($connection, $_POST['lastname']);
    $date = mysqli_escape_string($connection, $_POST['date']);
    $email = mysqli_escape_string($connection, $_POST['email']);
    $password = mysqli_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_escape_string($connection, $_POST['confirm_password']);

    $formatted_date= $date;
    $error = null;
    $success = null;
    $pass = null;

    $pass = md5($password);
    $formatted_date = date('Y-m-d', strtotime($date));

    $insertQuery = "INSERT INTO users (firstname, lastname, date,email, password)  VALUES ('$firstname','$lastname', '$formatted_date', '$email', '$pass')";


    $executeQuery = mysqli_query($connection, $insertQuery);

    if ($executeQuery) {
        $success = 'Record Inserted Successfully';
    }else{
        $error = 'Error While Inserting Record';
    }

    // if ($executeQuery) {
    //     mysqli_commit($connection);
    //     $success = 'Record Inserted Successfully';
    // }else {
    //     $error = 'Error While Inserting Record';
    // }

    // $getUserSql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    // $getUserResult = mysqli_query($connection, $getUserSql);
    // $userRecord = mysqli_fetch_assoc($getUserResult);
    
    // if($userRecord){
    //     $user = $userRecord['name'];
    // }else{
    //     echo "User not found";
    // }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>SignUp</title>
    <style>
      *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        section{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(gee.jpg)no-repeat;
            background-position: center;
            background-size: cover;
        }

        .form-box{
            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px  rgba(225, 225, 225, 0.56);
            display: flex;
            justify-content: center;
            align-items: center;

        }

        h2{
            font-size: 2em;
            color: #fff;
            text-align: center;
        }

        .inputbox{
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s ease-in;
        }

        input:focus ~ label,
        input:valid ~ label{
            top: -5px;
        }

        .inputbox input{
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        .inputbox i{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }

        .forget{
            margin: -15px 0 15px;
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: center;
        }

        .forget label input{
            margin-right: 3px;

        }

        .forget label a{
            color: red;
            text-decoration: none;
        }

        .forget label a:hover{
            text-decoration: underline;
        }

        button{
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
        }

        .register{
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;  
        }

        .register p a{
            text-decoration: none;
            color: red !important;
            font-weight: 600;
        }

        .register p a:hover{
            text-decoration: underline;
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
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="Assignment2.php" method="POST">
                    <h2>SignUp</h2>
                    <div class="inputbox">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="firstname" required>
                        <label for="firstname">Firstname:</label>
                    </div>
                    <div class="inputbox">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="lastname" required>
                        <label for="lastname">Lastname:</label>
                    </div>
                    <div class="inputbox">
                        <i class="bi bi-calendar"></i>
                        <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                        <label for="">Date Of Birth:</label>
                    </div> 
                    <div class="inputbox">
                        <i class="bi bi-envelope-at"></i>
                        <input type="email" name="email" id="email" required>
                        <label for="">Email:</label>
                    </div>
                    <div class="inputbox">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" id="password" required>
                        <label for="">Password:</label>
                    </div>
                    <div class="inputbox">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="confirm_password" id="confirm_password" required>
                        <label for="">Confirm Password:</label>
                    </div>
                    <button type="submit" name="add_record">Sign Up</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>