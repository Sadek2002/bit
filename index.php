<html> 
    <head>
        <title>Bit Merch Shop</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <header>
            <nav id= "menu">
                <ul>
                    <li><img src="img/logo.svg" id="bit-img"></li>
                    <li style = "float: right" ><a href="Cartpage/Cart.php"><img src="img/Cart.png" id="cart"></a></li>
                    <li style = "float: right"><a href = "">Account</a></li>
                    <li style = "float: right"><a href = "contact_pagina/Contact.html">Contact</a></li>
                    <li class = "dropdown" style="float: right;">
                        <a href = "javascript:void(0)" class="dropbtn">Category</a>
                        <div class="dropdown-content">
                            <a href="index.php">All</a>
                            <?php
                            require_once "php/Database.php";
                            $db = new Database("localhost", "bit_academy", "3306", "root", "");
                            foreach ($db->getTableByName("product_types") as $row) {
                                $id = $row['product_type'];
                                echo'<a href="index.php?product_type='.$id.'">'.$id.'</a>';
                            }
                            ?>

                        </div>
                    </li>
                    <li style = "float: right"><a href="index.php" target = "_self">Home</a></li>
                </ul>
            </nav>
            <!--<div class="slideshow">
                <img src="img/banner1%20(1).jpg" height="200" width="600">
                <img src="img/banner1%20(2).jpg" height="200" width="600">
            </div>-->
        </header>
        <div id="wrapper">
            
            <div id="producten">
                <?php
                require_once "php/Database.php";
                $db = new Database("localhost", "bit_academy", "3306", "root", "");

                foreach ($db->getTableByName("products") as $row) {
                    if (!isset($_GET['product_type']) || $_GET['product_type'] === $row['product_type']) {
                        echo "<div id='items'>";
                        echo "<a href='Productpage/test.php?id=".$row['product_id']."'>"."<img alt='' id='test-img' src='".$row['img_url']."'>"."</a>";
                        //echo $row['id'];
                        echo '<h3 id="name-tag">'.$row['name'].'</h3>'."<br>";
                        echo '<h4 id="price-tag">&#8364;'.$row['price'].'</h4>';

                        echo "</div>";
                        echo "<br>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
    </body>
</html>