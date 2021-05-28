<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Productpage.css">

</head>
<body>
<?php
require_once "../php/Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();

print_r($db->getRecordsFromTableByName("products", "product_id", 1));

?>



<header>
    <img src = "img/logo.svg" id="bit_img" alt="image">
</header>
<nav id= "nav">
    <ul>
        <li><a href="index.html" target = "_self">Home</a></li>
        <li class = "dropdown">
            <a href = "javascript:void(0)" class="dropbtn">Categorie&#235;n</a>
            <div class="dropdown-content">
                <a href="#">link 1</a>
                <a href="#">link 2</a>
            </div>
        </li>
        <li><a href = "about.html" target = "_self">About</a>
        <li><a href = "Contact.html" target = "_self">Contact</a></li>
        <li><a id="search_bar"><input type="text" placeholder="Search"></a></li>
        <li><a href="">Account</a></li>
        <li style="float:right"><a href="">Basket</a></li>
    </ul>
</nav>


<div class="row">
    <div class="column" >
        <img  id="product" src="img/appel.jpg" >
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
