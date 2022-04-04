<?php
    include 'includes/class-autoload.inc.php';
    
    
    $deletearray = new UsersContr;
    if(isset($_POST['submit']) && (!empty($_POST['marked']))){
    $deletearray->massDelete($_POST['marked']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-COmpatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/index.js"></script>

    <title>List of items</title>
</head>
<body>
    <div class="menu">
    <a href="/additem/"><button class="headerbutton">ADD ITEM</button></a>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="submit" name="submit" class="headerbutton" value="DELETE SELECTED ITEMS" id="delete-product-btn">
    </div>
    <div class="container">
    <?php

        $frontPage = new UsersView();
        $frontPage->showItems2();


    ?>
    </div>
    </form>

</body>
</html>