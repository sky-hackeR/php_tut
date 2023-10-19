<?php
include('connection.php');

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
            <td><a href="edit.php?user_id=<?= $fetchData['id'] ?>"</a>Edit</td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>