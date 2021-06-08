<?php
require_once '../php/Database.php';
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();
$id=$_GET["id"];


$product =$db->getRecordsFromTable("products", 'product_id', $id);

?>
 <?php
        if(isset($_POST['update']))
        {
            $id=$_GET["id"];


            $db->updateRecordsFromTable("products", "product_type", $_POST['product_type'], "product_id", $id);
            $db->updateRecordsFromTable("products", "name", $_POST['name'], "product_id", $id);
            $db->updateRecordsFromTable("products", "description", $_POST['description'], "product_id", $id);
            $db->updateRecordsFromTable("products", "img_url", $_POST['img_url'], "product_id", $id);
            $db->updateRecordsFromTable("products", "price", $_POST['price'], "product_id", $id);
        ?>
        <script type="text/javascript">
            window.location.href="adminpage.php";
        </script>
        <?php
        }
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

<div class="container">
    <div class="col-lg-4">
        <h2>Updating Database by PHP</h2>
        <form action="" name="form1" method="post">
            <div class="form-group">
                <label for="Product Type">Product Type</label>
                <input type="text" class="form-control" id="product_type" placeholder="Enter product type" name="product_type" value="<?php echo $product[0]['product_type']; ?>">
            </div>
            <div class="form-group">
                <label for="Item Name">Item Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" value="<?php echo $product[0]['name']; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Item description</label>
                <input type="text" class="form-control" id="description" placeholder="Enter item description" name="description" value="<?php echo $product[0]['description']; ?>">
            </div>
            <div class="form-group">
                <label for="Image URL">Image URL</label>
                <input type="text" class="form-control" id="img_url" placeholder="Enter Image URL" name="img_url" value="<?php echo $product[0]['img_url']; ?>">
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Enter item price" name="price" value="<?php echo $product[0]['price']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
    </div>
</div>

</tr>
</thead>
<tbody>
</body>
</html>