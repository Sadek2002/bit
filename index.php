<html> 
    <head>
        <title>Bit Merch Shop</title>
        <link rel="stylesheet" href="contact_pagina/style.css">
    </head>
    <body>
        <header>
            <nav id= "menu">
                <ul>
                    <li><img src="img/logo.svg" id="bit-img"></li>
                    <li style = "float: right" ><a href=""><img src="img/Cart.png"></a></li>
                    <li style = "float: right"><a href = "">Account</a></li>
                    <li style = "float: right"><a href = "contact_pagina/Contact.html">Contact</a></li>
                    <li class = "dropdown" style="float: right;">
                        <a href = "javascript:void(0)" class="dropbtn">Categorie</a>
                        <div class="dropdown-content">
                            <a href="#">link 1</a>
                            <a href="#">link 2</a>
                            <a href="#">link 3</a>
                            <a href="#">link 4</a>
                        </div>
                    </li>
                    <li style = "float: right"><a href="index.php" target = "_self">Home</a></li>
                    <!--<li id="searchbar">
                        <div id="search">
                            <div id="icon"></div>
                            <div id="input"></div>
                        </div>
                    </li>-->
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
                    echo "<div id='items'>";
                    echo "<img alt='' id='test-img' src='".$row['img_url']."'>";
                    //echo $row['id'];
                    echo '<h3 id="name-tag">'.$row['name'].'</h3>'."<br>";
                    echo '<h4 id="price-tag">&#8364;'.$row['price'].'</h4>';  
                    echo "<a href='Productpage/test.php?id=".$row['product_id']."'>"."go"."</a>";
                    echo "</div>";
                    echo "<br>";
                }

                ?>
            </div>
        </div>
     
    </div>
    <footer>
        <a>contact</a>
    </footer>
    </body>
</html> 