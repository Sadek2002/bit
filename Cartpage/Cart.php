<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <?php
        session_start();

        if (isset($_POST['product_id'])) {
            $newProduct = array();

            foreach ($_POST as $item => $value) {
                $newProduct[$item] = $value;
            }

            $_SESSION['product_list'][] = $newProduct;
            header('location: Cart.php');
        }

        /*echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";*/
    ?>
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

    <?php
        require_once '../php/Database.php';
        $db = new Database("localhost", "bit_academy", "3306", "root", "");
        $db->checkConnectionToDatabase();


        //makes the ordered products
        if (isset($_SESSION['product_list'])) {

            $totalPrice = 0;

            foreach ($_SESSION['product_list'] as $row) {
                echo "<div id='produktinfo'>";

                $product = $db->getRecordsFromTable("products", "product_id", $row['product_id']);


                echo "<img src='../" . $product[0]['img_url'] . "'>";
                echo "<div id='info'>";
                echo "<p id='price'>";
                echo "<p id='productname'>". $product[0]['name']; echo "</p>";
                echo "<br>";

                if (isset($row['size'])) {
                    echo 'Size:' . '   ' . $row['size'] . "<br>";
                }
                echo "<br>";
                echo 'QTY: '.$row['quantity'];
                echo "<br>";
                echo"<br>";
                echo '€' . $product[0]['price'] * $row['quantity'] . "<br>";

                echo"</p>";
                "</div>";
                echo "</div>";

                $calc = $product[0]['price'] * $row['quantity'];
                $totalPrice += $calc;
            }
            echo "<div id='totalprice'>";
            echo '€ '.$totalPrice;
            echo "</div>";
        }
        else {
            echo "<p id='cartinfo'>Cart is empty </p>";
        }
    ?>
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