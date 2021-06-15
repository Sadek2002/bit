<html lang="en">
<head>
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>Contact</title>
</head>
<body>
<header>
    <nav id= "menu">
        <ul>
            <li><img src="../img/logo.svg"></li>
            <li style = "float: right" ><a href="../Cartpage/Cart.php"><img src="../img/Cart.png" id="cart"></a></li>
            <li style = "float: right"><a href = "">Account</a></li>
            <li style = "float: right"><a href = "Contact.php">Contact</a></li>
            <li class = "dropdown" style="float: right;">
                <a href = "javascript:void(0)" class="dropbtn">Category</a>
                <div class="dropdown-content">
                    <a href="../index.php">All</a>
                    <?php
                            require_once "../php/Database.php";
                            $db = new Database("localhost", "bit_academy", "3306", "root", "root");
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
<div id="wrapper">

    <form method="POST" id="contact_form">
        <h2 style="color: white">Guest Contact Form</h2>

        <label>Name
            <input name="name" type="text" class="contact_form_input" required>
        </label>
        <label>Phonenumber
            <input name="number" type="tel" class="contact_form_input">
        </label>
        <label>Email
            <input name="mail" type="email" class="contact_form_input" required>
        </label>
        <label>Ordernumber
            <input name="ordernumber" type="text" class="contact_form_input">
        </label>
        <label>Subject
            <input name="subject" type="text" class="contact_form_input" required>
        </label>
        <label>Message
            <textarea name="message" id="contact_textarea" placeholder="bericht" required></textarea>
        </label>
        <button type="submit" value="submit" name="submit" id="submit_button">Verstuur</button>
    </form>
    <img src="../img/contact.jpg" id="image">
    <!--<section id="Klantenservice">
        <h2>Klantenservice</h2>
        <h3>Email: Bitproject@gmail.com</h3>
        <h3>Telefoonnnumer: 0612345678</h3>
    </section>-->
</div>
</div>
</body>
</html>