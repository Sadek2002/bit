<?php
include "connection.php";
?>

<!doctype html>
<html lang="en">
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100px;
            background-color: black;
        }

        li a {
            display: block;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: blue;
            color: white;
        }

        h1 {
            color: black;
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
<script>
    function createItem(name, description) {
        console.log()
    }

</script>
<body style="background-color:white">
        <h1>Admin Page</h1>

        <ul>
            <li><a href="adminpage.php">Home</a></li>
            <li><a href="edit_item.php">Edit</a></li>
            <li><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">E-mails</a></li>
        </ul>

        <div class="container">
        <div class="col-lg-4">
            <h2>Vertical (basic) form</h2>
            <form action="" name="form1" method="post">
                <div class="form-group">
                    <label for="email">Item name</label>
                    <input type="text" class="form-control" id="product_id" placeholder="Enter email" name="product_id">
                </div>
                <div class="form-group">
                    <label for="pwd">Item description</label>
                    <input type="text" class="form-control" id="Description" placeholder="Enter item description" name="Description">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <button type="submit" name="insert" class="btn btn-default">Insert</button>
                <button type="submit" name="update" class="btn btn-default">Update</button>
                <button type="submit" name="delete" class="btn btn-default">Delete</button>
            </form>
        </div>
        </div>

        <div class="col-lg-12">

        </div>

        <?php
        if (isset($_POST["insert"]))
        {
            mysqli_query($link,"insert into tablel values($db->c('$_POST[product_id]', 't', 't', 't', '10.00')");
        }
        //Database Test
        #require_once "../php/Database.php";
        #    $db = new Database("localhost", "bit_academy", "3306", "root", "");
        #    $db->checkConnectionToDatabase();
        #    echo "<pre>";
        #    print_r($db->getTableByName("products"));
        #    $db->c("cap", "t", "t", "t", "10.00");
        #    echo "</pre>";
?>
</body>
</html>
