<!doctype html>
<html lang="en">
<head >
    <style>

        header {
            background-color: #000563;
            color: white;
        }

        header h1 {
            margin: 0;
        }

        html, body {
            margin: 0;
            padding: 0;
        }

        li a:hover {
            background-color: blue;
            color: white;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #333;
        }

        .menu-border {
            border: 2px solid #ffffff;
        }

        .text  {
            font-size: 30px;
            font-weight: bold;
        }
        
        .edit {
            max-height: 100px;
            max-width: 350px;
            padding-left: 10px;
        }

        .buttons {
            max-height: 50px;
            max-width: 70px;
            padding-left: 10px;
        }

        .everything {
            padding-left: 30%;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<title>admin</title>
</head>
<header style="margin-left: 30px">
    <img src="../img/logo.svg">
</header>
<script>
    function createItem(name, description) {
        console.log()
    }
</script>
<body style="background-color: #000563" >
<font color="white">
    <ul class="menu-border">
        <li><a class="active" href="adminhome.php">Home</a></li>
        <li><a href="adminpage.php">Edit</a></li>
        <li><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">Mail</a></li>
    </ul>

    <div class="everything">
        <h1 class="text">Create Function</h1>

        <p>Type the product type</p>
        <img class="edit" src="../img/p_type.PNG" alt="">
        <p>Listed types: mouth mask, cap and t-shirt</p>

        <p>Type the product name</p>
        <img class="edit" src="../img/p_name.PNG" alt="">

        <p>Type the product description</p>
        <img class="edit" src="../img/p_desc.PNG" alt="">

        <p>Insert product image</p>
        <img class="edit" src="../img/p_img.PNG" alt="">

        <p>Insert the price you want your product to sell at</p>
        <img class="edit" src="../img/p_price.PNG" alt="">

        <p>Select the size/sizes your product has (if it has no size dont select anything!)</p>
        <img class="edit" src="../img/p_sizes.PNG" alt="">

        <p>Click on the white box to select the color your product is</p>
        <img class="edit" src="../img/p_colors.PNG" alt="">

        <p>Click on the create button to save changes!</p>
        <img class="buttons" src="../img/p_create.PNG" alt="">

        <h1 class="text">Edit Function</h1>

        <p>Type the product type</p>
        <img class="edit" src="../img/p_type.PNG" alt="">
        <p>Listed types: mouth mask, cap and t-shirt</p>

        <p>Type the product name</p>
        <img class="edit" src="../img/p_name.PNG" alt="">

        <p>Type the product description</p>
        <img class="edit" src="../img/p_desc.PNG" alt="">

        <p>Insert product image</p>
        <img class="edit" src="../img/p_img.PNG" alt="">

        <p>Insert the price you want your product to sell at</p>
        <img class="edit" src="../img/p_price.PNG" alt="">

        <p>Select the size/sizes your product has (if it has no size dont select anything!)</p>
        <img class="edit" src="../img/p_sizes.PNG" alt="">

        <p>Click on the white box to select the color your product is</p>
        <img class="edit" src="../img/p_colors.PNG" alt="">

        <p>Click on the update button to save changes!</p>
        <img class="buttons" src="../img/update.PNG" alt="">
        
        <h1 class="text">Delete Function</h1>

        <p>Click on the delete button</p>
        <img class="buttons" src="../img/delete.PNG" alt="">
        <p>Careful it will delete the item instantly!</p>
    </div>



</font>
</body>
</html>
