<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../contact_pagina/style.css">

</head>
<body>
<?php
require_once "../php/Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();

$product = $db->getRecordsFromTableByName("products", "product_id", 1);
//echo"<pre>";
//print_r($product);
//echo"</pre>";
?>



<header>
    <nav id= "menu">
        <ul>
            <li><img src="img/logo.svg"></li>
            <li style = "float: right" ><a href = "">Basket</a></li>
            <li style = "float: right"><a href = "">Account</a></li>
            <li style = "float: right"><a href = "contact_pagina/Contact.html">Contact</a></li>
            <li class = "dropdown" style="float: right;">
                <a href = "javascript:void(0)" class="dropbtn">Categorie&#235;n</a>
                <div class="dropdown-content">
                    <a href="#">link 1</a>
                    <a href="#">link 2</a>
                    <a href="#">link 3</a>
                    <a href="#">link 4</a>
                </div>
            </li>
            <li style = "float: right"><a href="index.php" target = "_self">Shop</a></li>
            <!--<li id="searchbar">
                <div id="search">
                    <div id="icon"></div>
                    <div id="input"></div>
                </div>
            </li>-->
        </ul>
    </nav>

</header>


<div class="row">
    <div class="column" >
        <img  id="product" src="../img/appel.jpg" >
    </div>
    <div class="column" >

        <h1><?php echo $product[0]['product_type'] ?></h1>
        <p>$<?php echo $product[0]['price'] ?></p>
        <p id="text">Size</p>
        <select id="size" >
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        <br>
        <p id="tekst">Quantity</p>

        <input type="number" id="quantity" name="quantity">
        <br><br><br>
        <input type="submit" id="button" value="Add to Cart">
        <br>
        <br>
        <article><?php echo $product[0]['Description'] ?></article>
    </div>
</div>

</body>
</html>
