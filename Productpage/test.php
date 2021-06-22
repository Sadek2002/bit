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

<div id="content" style="background-color:white">
<div class="row">
    <div class="column" >
        <?php echo "<img alt='' id='product' src='../".$product[0]['img_url']."'>"?>
    </div>
    <form class="column" action="../Cartpage/Cart.php" method="post">

        <h2 id="productname"><?php echo $product[0]['name'] ?></h2>
        <p>$<?php echo $product[0]['price'] ?></p>

        <?php if ($db->getRecordsFromTable("product_has_sizes", "product_id", $_GET['id'])) { ?>
        <p id="text">Size</p>
        <select name="size" id="size" required>
            <option value="">None</option>
            <?php
                foreach ($db->getRecordsFromTable("product_has_sizes", "product_id", $_GET['id']) as $size) {
                    echo "<option value='".$size['size']."'>".$size['size']."</option>";
                }
            ?>
        </select>
        <?php } ?>
        <br>
        <p id="tekst">Quantity</p>

        <input type="number" id="quantity" name="quantity" max="10" min="1" required>
        <input type="number" id="product_id" name="product_id" value="<?php echo $_GET['id'] ?>" required>

        <?php
            if($product[0]['in_stock'] > 0){
                echo '<p id="in_stock" style="color: lawngreen; font-weight: bolder">Available</p>';
            }else{
                echo '<p id="in_stock" style="color: red; font-weight: bolder">Not available</p>';
            }
        ?>
        <br>
        <?php
        if($product[0]['in_stock'] >= 1){
             echo '<input type="submit" id="button" value="Add to Cart"> ';
        }
        else{
            echo '<div id="disabled-add-to-cart">';
            echo 'Add to Cart';
            echo '</div>';
        }


        ?>
        <br>
        <br>
        <div id="line"></div>
        <p>Description</p>
        <article><?php echo $product[0]['description'] ?></article>
    </form>

</div>
</div>
</body>
<footer>
    <div id="footer-text">

    </div>
</footer>
</html>
