<?php

$name =  "Ayedun James";
$age = 20;
$bmi = 12.5;
$male = true;
$cars = ["Volvo", "Bugatti", "Mazda", "Toyota"];
// $favoriteCar = null;
foreach ($cars as $car){
    // if($car == "Benz"){
    //     $favoriteCar = $car;
    // }
    $favoriteCar = ($car == "benz"? $car:null);
}

// $favoriteCar = array_filter($cars, $myCar) ? $myCar:null;
// if(array_filter($cars, $cars)){
//     echo true;
// }
function checkBrand($carBrand){
    // if($carBrand == null){
    //     $brand = null;
    // }elseif($carBrand == "Toyota"){
    //     $brand = "Toyota";
    // }elseif($carBrand == "Suzuki"){
    //     $brand = "Suzuki";
    // }elseif($carBrand == "Volkswagen"){
    //     $brand = "Volkswagen";
    // }elseif($carBrand == "Ford"){
    //     $brand = "Ford";
    // }else{
    //     $brand = "unknown";
    // }

    switch ($carBrand) {
        case 'Suzuki':
            $brand = $carBrand;
            break;
        
        default:
            $brand = "unknown";
            break;
    }

    return $brand;
}
$mycar = "Suzuki";
$mybrand = checkBrand($mycar);


// var_dump($car);

// class User{
//     function user(){
//         $this->name = "Dare";
//     }
// }

function sum($x, $y){
    $x = 5;
    $sum = $x + $y;

    return $sum;
}

$addition = sum(37, 40);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWE 305</title>
</head>
<body>
    <h1 style ="color: yellow; background-color: black; padding: 20px">
    Welcome! <?= $name?> you are <?= $addition ?> year's old </h1>
    <p>You like the following brand of cars</p>
    <ul>
        <?php foreach ($cars as $car){ ?>
        <li><?= $car ?></li>
        <!-- <p>
            <?php if($car == "Bugatti"){ ?> 
                Your Favourite car is <?= $car ?> 
            <?php } ?>   -->
        <?php } ?>
    </ul>
    <p> Your favorite car is <?= $favoriteCar ?></p>
    <p> Your brand of car is <?= $mybrand ?></p>
</body>
</html> 