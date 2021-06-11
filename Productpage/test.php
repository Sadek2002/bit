<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
<?php
require_once "../php/Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();

$product = $db->getRecordsFromTable("products", "product_id", $_GET['id']);
//echo"<pre>";
//print_r($product);
//echo"</pre>";
?>


<header>
    <nav id= "menu">
        <ul>
            <li><img id="bit-img" src="../img/logo.svg"></li>
            <li style = "float: right" ><a href="../Cartpage/Cart.php"><img src="../img/Cart.png" id="cart"></a></li>
            <!--<li style="float: right; padding-right: 30px;" ><a href = "Contact.html" target = "_self">contact</a></li>-->
            <li style = "float: right"><a href = "">Account</a></li>
            <li style = "float: right"><a href = "../contact_pagina/Contact.html">Contact</a></li>
            <li class = "dropdown" style="float: right;">
                <a href = "javascript:void(0)" class="dropbtn">Category</a>
                <div class="dropdown-content">
                    <a href="#">link 1</a>
                    <a href="#">link 2</a>
                </div>
            </li>
            <li style = "float: right"><a href="../index.php" target = "_self">Home</a></li>
        </ul>
    </nav>

</header>

<div id="content" style="background-color:white">
<div class="row">
    <div class="column" >
        <?php echo "<img alt='' id='product' src='../".$product[0]['img_url']."'>"?>
    </div>
    <div class="column" >

        <h2 id="productname"><?php echo $product[0]['name'] ?></h2>
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
        <article><?php echo $product[0]['description'] ?></article>
    </div>

</div>
</div>
</body>
</html>
