<!DOCTYPE html>
<html lang="en">
    <?php
    include "backend/readmd.php";
    $drinks = new ParseRecipes("drinks");
    $food = new ParseRecipes("food");
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Free and open-source recipe book for the lazy home cook">
        <link rel="stylesheet" href="css/main.css">
        <title>FOSS food</title>
    </head>

    <body>
    <body>
        <?php 
            include "menu.php";
        ?>
        <div class="information">
            Total number of recipes: <?php echo ($drinks->total + $food->total) ?>.
            This is made up of <?php echo $drinks->total ?> drink(s) and <?php echo $food->total ?> dish(es).
        </div>
        <div class="support">
            If you enjoy this project, feel free to support it on <a href="https://github.com/Secretmud/fossfood" rel="noreferrer" target="_blank">GitHub</a>.
        </div>
    </body>
</html>