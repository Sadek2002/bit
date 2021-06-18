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
<div id="wrapper">

    <?php
    if(empty($_POST['number'])){
        $_POST['number'] = 'N/A';
    }
    if(empty($_POST['ordernumber'])){
        $_POST['ordernumber'] = '0';
    }
    if(isset($_POST['submit'])) {
        echo '<p id="sentMessage"  style="color: white">Contact form has been sent!</p>';
        require_once "../php/Database.php";
        $db = new Database("localhost", "bit_academy", "3306", "root", "");
        $db->insertRecordToMessages($_POST['mail'],$_POST['number'],$_POST['ordernumber'],
            $_POST['name'],$_POST['subject'],$_POST['message']);

    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="contact_form">
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
<footer>
    <img src="../img/logo.svg"  id="bit-img">
    <div id="footer-content">
        <div id="footer-adres">
            <h4>Adres</h4>
            <a> Amsterdam<br>
                Science Park 608A<br>
                1098XH, Amsterdam<br>
            </a>
        </div>
        <div id="footer-contact">
            <h4>Contact</h4>
            <a href="mailto:info@bit-academy.nl"  style="text-decoration: none"> info@bit-academy.nl</a><br>
            <a href="tel:020 247 0347" style="text-decoration: none">020 247 0347</a>

        </div>
    </div>
</footer>
</html>