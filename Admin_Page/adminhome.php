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
        <li><a class="active" href="adminpage.php">Home</a></li>
        <li><a href="edit.php">Edit</a></li>
        <li><a href="https://mail.google.com/mail/u/0/#inbox">Mail</a></li>
    </ul>


    <h1 class="text">Create Function</h1>
    <p>Type in the product type</p>
    <p>Listed types: mouth mask, cap and t-shirt</p>
    <img src="../img/p" alt="">


</font>
</body>
</html>
