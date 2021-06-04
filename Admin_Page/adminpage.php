

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
            <h2>Updating Database by PHP</h2>
            <form action="" name="form1" method="post">
                <div class="form-group">
                    <label for="Product ID">Product ID</label>
                    <input type="text" class="form-control" id="product_id" placeholder="Enter product id" name="product_id">
                </div>
                <div class="form-group">
                    <label for="Product Type">Product Type</label>
                    <input type="text" class="form-control" id="product_type" placeholder="Enter product type" name="product_type">
                </div>
                <div class="form-group">
                    <label for="Item Name">Item Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Item description</label>
                    <input type="text" class="form-control" id="Description" placeholder="Enter item description" name="Description">
                </div>
                <div class="form-group">
                    <label for="Image URL">Image URL</label>
                    <input type="text" class="form-control" id="img_url" placeholder="Enter Image URL" name="img_url">
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter item price" name="price">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <button type="submit" name="update" class="btn btn-default">Update</button>
                <button type="submit" name="create" class="btn btn-default">Create</button>
                <button type="submit" name="delete" class="btn btn-default">Delete</button>
            </form>
        </div>
        </div>

        <div class="col-lg-12">

        </div>

        <?php

        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,'bit_academy');

        if(isset($_POST['update']))
        {
            $product_id = $_POST['product_id'];

            $query = "UPDATE products SET product_id='$_POST[product_id]', product_type='$_POST[product_type]', name='$_POST[name]', Description='$_POST[Description]', img_url='$_POST[img_url]', price='$_POST[price]' WHERE product_id = '$_POST[product_id]'";
            $query_run = mysqli_query($connection, $query);
            if ($query_run)
            {
                 echo '<script type="text/javascript"> alert("Data Updated")</script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Data Not Updated")</script>';
            }
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
