<html> 
    <head>
        <title>Bit Merch Shop</title>
        <link rel="stylesheet" href="contact_pagina/style.css">
    </head>
    <body>
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
        <div id="wrapper">
            <div id="filter">
                <form id="filter-form" method="post" action="">
                    <select id="price-filter">
                        <option value="">Prijs&nbsp;</option>
                        <option value="1">&#8364;&nbsp;10 - &#8364;20</option>
                        <option value="2">&#8364;&nbsp;21 - &#8364;30</option>
                        <option value="3">&#8364&nbsp;31 - &#8364;50</option>
                        <option value="4">&#8364;&nbsp;51 - &#8364;75</option>
                        <option value="5">&#8364;&nbsp;76 - &#8364;100</option>
                    </select>
                    <select id="price-filter">
                        <option value="">Kleur&nbsp;</option>
                        <option value="1">Zwart</option>
                        <option value="2">Rood</option>
                        <option value="3">Blauw</option>
                        <option value="4">Wit</option>
                        <option value="5">Bruin</option>
                    </select>
                    <button id="button-">Button</button>
                </form>
            </div>
            <div id="producten">
                <?php
                require_once "php/Database.php";
                $db = new Database("localhost", "bit_academy", "3306", "root", "alicia573");

                foreach ($db->getTableByName("products") as $row) {
                    echo "<div id='items'>";
                    echo "<img alt='' id 'image-product' src='".$row['img_url']."'>";
                    echo '<h3 id="nametag">'.$row['name'].'</h3>'."<br>";
                    echo '<h4 id="price-tag">&#8364;'.$row['price'].'</h4>';
                    echo "</div>";

                    echo "<br>";
                }

                ?>
            </div>
        </div>
     <footer>
         <a>contact</a>
     </footer>
    </div>
    </body>
</html>