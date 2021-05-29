<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../contact_pagina/style.css">

</head>
<body>
<?php
require_once "../php/Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "alicia573");
$db->checkConnectionToDatabase();

//print_r($db->getRecordsFromTableByName("products", "product_id", 1));

?>



<header>

</header>
<nav id= "nav">
    <ul>
        <li><img id="bit-img" src="../img/logo.svg"></li>
        <!--<li style="float: right; padding-right: 30px;" ><a href = "Contact.html" target = "_self">contact</a></li>-->
        <li style = "float: right"><a href = "">basket</a></li>
        <li style = "float: right"><a href = "">acount</a></li>
        <li style = "float: right"><a href = "">search</a></li>
        <li class = "dropdown" style="float: right;">
            <a href = "javascript:void(0)" class="dropbtn">Filter</a>
            <div class="dropdown-content">
                <a href="#">link 1</a>
                <a href="#">link 2</a>
            </div>
        </li>
        <li style = "float: right"><a href="index.html" target = "_self">Shop</a></li>
    </ul>
</nav>


<div class="row">
    <div class="column" >
        <img  id="product" src="../img/appel.jpg" >
    </div>
    <div class="column" >

        <h1>Product</h1>
        <p>$Price</p>
        <p id="text">Size</p>
        <select >
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
        <article>s simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting, remaining essentially unchanged.
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</article>
    </div>
</div>

</body>
</html>
