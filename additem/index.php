<?php
include '../includes/class-autoload.inc.php';

if ($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['type'])) {
$add = new UsersContr();
$add->createItem2(ucfirst($_POST['sku']), $_POST['name'], $_POST['price'], $_POST['type'],  $_POST['size'], $_POST['width'], $_POST['length'], $_POST['height'], $_POST['weight']);
header('Location: ../index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['sku'])){
$skucheck= new UsersContr();
$skucheck->checkingSku();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-COmpatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="../js/additem.js"></script>
        <script src="../js/validator.js"></script>
        <title>Add an item</title>
    </head>

    <header>

    </header>
    
    <body>
        <div class="menu">
                <a href='../'><button class=headerbutton>Cancel</button></a>
                <input type="submit" name="submit" id="submitbtn" value="Save" class="headerbutton">
            </div>
        <div id="form_container">
        <form id="product_form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
            <label for="sku">SKU:</label><div id="sku_response" ></div>
            <input type="text" name="sku" id="sku" required><br>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

            <label for="price">Price ($):</label>
            <input type="number" name="price" id="price" required><br>

            <label for="type">Product type:</label>
            <select name="type" id="productType">
                <option>Select a product type</option>
                <option value="dvd" name="dvd" id="DVD">DVD</option>
                <option value="furniture" name="furniture" id="Furniture">Furniture</option>
                <option value="book" name="book" id="Book">Book</option>
            </select><br>

            <div id="dvd" class="typeattr">
                <label for="size">Size (MB)</label>
                <input type="number" name="size" id="size" required><br>
                <p class="description">Please provide the size of the DVD in MB. </p>
            </div>

            <div id="furniture" class="typeattr">
                <label for="height">Height (CM)</label>
                <input type="number" name="height" id="height" required><br>
                <label for="width">Width (CM)</label>
                <input type="number" name="width" id="width" required><br>
                <label for="length">Length (CM)</label>
                <input type="number" name="length" id="length" required><br>
                <p class="description">Please provide the size of the furniture in CM.</p><br>
            </div>
            
            <div id="book" class="typeattr">
                <label for="weight">Weight (KG)</label>
                <input type="number" name="weight" id="weight" required><br>
                <p class="description">Please provide the weight of the book in KG.</p><br>
            </div>
            

            

        </form>
        </div>
    </body>
</html>