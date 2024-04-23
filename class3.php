<?php
include('connection.php');

if(isset($_POST['delete_user'])){
    $userId = mysqli_escape_string($connection, $_POST['user_id']);

    $deleteUserQuery = "DELETE FROM users WHERE id = '$userId'";
    $deleteUserResult = mysqli_query($connection, $deleteUserQuery);


    if($deleteUserResult){
        $error = null;
        $success = null;

        if($password != $confirm_password){
            $error = 'password mismatch';
        }else{
            $pass = md5($password);
        }
    }


}




$userCount = 1;

$fetchQuery = "SELECT * FROM users";
$fetchResult =  mysqli_query($connection, $fetchQuery);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Database Record</title>
</head>
<style>
    table, th, td{
        border: 1px solid;
        padding: 20px;
    }
</style>
<body>
    <table>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php while($fetchData = mysqli_fetch_array($fetchResult)) {?>
        <tr>
            <td><?= $userCount++ ?></td>
            <td><?= $fetchData['firstname']. ' '. $fetchData['lastname']  ?></td>
            <td><?= $fetchData['email'] ?></td>
            <td><?= $fetchData['date'] ?></td>
            <td><?= $fetchData['password'] ?></td>
            <td><a href="edit.php?user_id=<?= $fetchData['id'] ?>"</a>Edit
                <form action="class3.php" method="POST" enctype="multipart/form">
                    <input type="hidden" name="user_id" value="<?= $fetchData['user_id']?>">
                    <button style="background-color: red; color: #fff; border: 1px solid red; border-radius: 5px; padding:" type="submit" name="delete-user">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>