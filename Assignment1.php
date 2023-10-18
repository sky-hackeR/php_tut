<?php
function BMI($height, $weight) { 
    $bmi = number_format($weight / pow($height, 2)); 
    return $bmi; 
} 

$height = 1.50; 
$weight = 120; 

$bmi = BMI($height, $weight);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh
        }
        .header{
            color: green;
        }
    </style>
</head>
<body>
    <h1 class="header">WELCOME!</h1>
    <p>Your BMI is <?= $bmi ?>,
        <?php
        switch (true) {
            case $bmi < 18.5:
                echo "you're underweight";
                break;
            case $bmi >= 18.5 && $bmi < 24.9:
                echo "you're healthy";
                break;
            case $bmi >= 24.9 && $bmi < 30:
                echo "you're overweight";
                break;
            case $bmi >= 30:
                echo "you broke the scale😂😂";
                break;
            default:
                echo "Invalid BMI value";
        }
        ?>
    </p>
</body>
</html>
