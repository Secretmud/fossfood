<!DOCTYPE html>
<html lang="en">
<?php
include "backend/readmd.php";
$drinks = new ParseRecipies("drinks");
$food = new ParseRecipies("food");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free and opensource recipe book for the lazy home cook">
    <link rel="stylesheet" href="css/main.css">
    <title>FOSS food</title>
</head>

<body>
    <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="drinks.php">Drinks</a>
        <a href="food.php">Food</a>
    </nav>
    <div class="information">
        Total amount of recipies: <?php echo ($drinks->total + $food->total) ?><br>
        This is made up of <?php echo $drinks->total ?> drink(s) and <?php echo $food->total ?> food(s).
    </div>
    <div class="support">
        If you enjoy this project, feel free to support it on <a href="https://github.com/Secretmud/fossfood" target="_blank">GitHub</a>
    </div>
</body>
</html>