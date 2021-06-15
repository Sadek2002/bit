<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
<header>
    <nav id= "menu">
        <ul>
            <li><img src="../img/logo.svg" id="bit-img"></li>
            <li style = "float: right" ><a href="Cart.php"><img src="../img/Cart.png" id="cart"></a></li>
            <li style = "float: right"><a href = "">Account</a></li>
            <li style = "float: right"><a href = "../contact_pagina/Contact.php">Contact</a></li>
            <li class = "dropdown" style="float: right;">
                <a href = "javascript:void(0)" class="dropbtn">Category</a>
                <div class="dropdown-content">
                    <a href="../index.php">All</a>
                    <?php
                    require_once "../php/Database.php";
                    $db = new Database("localhost", "bit_academy", "3306", "root", "");
                    foreach ($db->getTableByName("product_types") as $row) {
                        $id = $row['product_type'];
                        echo'<a href="../index.php?product_type='.$id.'">'.$id.'</a>';
                    }
                    ?>
                </div>
            </li>
            <li style = "float: right"><a href="../index.php" target = "_self">Home</a></li>
        </ul>
    </nav>
</header>
<h2 id="checkout">Checkout</h2>
<section class="details">
    <p id="Billing">Billing Details</p>
    <div id="produktinfo">
    <p>Product info</p>
    </div>
    <div id="produktinfo">
        <p>Product info</p>
    </div>
    <div id="produktinfo">
        <p>Product info</p>
    </div>
</section>
<section class="Info">
    <div id="overzicht">
        <form>
            <p>Contact Details</p>
            <div id="user">

                <p id="name">First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Last Name</p>
            <input type="text" name="First name" id="First name">
               <input type="text" name="Last name" id="Last name">
                <p id="email">Email Adress</p>
            <input type="text" name="e-mail adress" id="e-mail adress">
           </div>
            <p>Adress</p>
            <div id="adress">
            <input type="text" name="streetname" id="streetname" placeholder="Steetname">
            <input type="text" name="housenumber" id="housenumber" placeholder="House #">
            <input type="text" name="postcode" id="postcode" placeholder="Postal code">
            <input type="text" name="City" id="City" placeholder="City">
        </div>
            <p>Payment </p>
            <div id="Payment">
                <input type="text" name="e-mail adress" id="e-mail adress" placeholder="Card Number">
                <p id="expire">Expire date</p>
                <input type="month" id="month">
                <input type="text" id="cvc" placeholder="CVC">
                <br>
                <input type="submit" id="pay" value="Pay ">
            </div>
        </form>
    </div>
</section>
</body>
</html>