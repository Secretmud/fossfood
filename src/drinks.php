<!DOCTYPE html>
<html lang="en">
<?php
include "backend/readmd.php";
$recipes = new ParseRecipes("drinks");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free and open-source recipe book for the home cook">
    <link rel="stylesheet" href="css/main.css">
    <title>FOSS food</title>
</head>
<body>
    <?php 
        include "menu.php";
    ?>
    <?php 
        include "form.php";
    ?>
    <div class="five">
        <?php 
            $recipes->fiveRandom();
        ?>
    </div>
</body>
</html>