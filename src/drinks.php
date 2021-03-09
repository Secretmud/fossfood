<!DOCTYPE html>
<html lang="en">
<?php
include "backend/readmd.php";
$recipies = new ParseRecipies("drinks");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free and opensource recipe book for the home cook">
    <link rel="stylesheet" href="css/main.css">
    <title>FOSS food</title>
</head>
<body>
    <div class="five">
        <?php 
            $recipies->lastFive();
        ?>
    </div>
    <div class="search">
        <form class="search_field" action="" method="get">
            <input name="find" type="text">
            <input name="search" type="submit" value="Search">
        </form>
        <?php 
            if (isset($_GET["search"])) {
                $recipies->search(htmlspecialchars($_GET["find"]));
            }
        ?>
    </div>
    
</body>
</html>