<!doctype html>

<?php
require_once '../php/Database.php';
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();
?>

<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<title>admin</title>
</head>
<link rel="stylesheet" href="AdminStyle.css">
<header style="margin-left: 30px">
    <img src="../img/logo.svg">
    <style>
        img.images{
            width: 50px;
        }
    </style>
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

    <div class="container" style="margin-left: 0px">
        <div class="col-lg-4">
            <h2>Create Product</h2>
            <form action="" name="form1" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="Product Type">Product Type</label>
                </div>
                <div class="colors">
                    <select name="product_type">
                        <?php
                        foreach ($db->getTableByName("product_types") as $row) {
                            echo "<option value='".$row['product_type']."' id='product_type'>".$row['product_type']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Item Name">Item Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Item description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter item description" name="description">
                </div>
                <div>
                    <label for="Images">Product Image</label>
                </div>
                <div class="form-group">
                    <input type="file" name="file">
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter item price" name="price">
                </div>
                <div class="form-group">
                    <label for="size">Sizes</label><br>
                    <input type="checkbox" id="sizes" name="size">
                    <label for="Small">S</label><br>
                    <input type="checkbox" id="sizes" name="size">
                    <label for="Medium">M</label><br>
                    <input type="checkbox" id="sizes" name="size">
                    <label for="Large">L</label><br>
                </div>
                <div class="form-group">
                    <label for="Stock">Stock</label>
                    <input type="text" class="form-control" id="in_stock" placeholder="Enter stock" name="in_stock">

                </div>
                <div>
                    <label for="Product Color">Product Color</label>
                </div>
                <div class="colors">
                    <select name="color">
                        <?php
                        foreach ($db->getTableByName("colors") as $row) {
                            echo "<option value='".$row['color']."' id='color'>".$row['color']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="button">
                    <button type="submit" name="create" class="btn btn-default">Create</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
            <tr bgcolor="black">
                <th>#</th>
                <th>Product Type</th>
                <th>Name</th>
                <th>Description</th>
                <th>img_url</th>
                <th>Price</th>
                <th>Colors</th>
                <th>Sizes</th>
                <th>In stock</th>
                <th>Edit</th>
                <th>Delete</th>
    </div>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($db->getTableByName("products") as $row)
    {
        echo "<tr bgcolor='#333'>";
        echo "<td>"; echo $row["product_id"]; echo "</td>";
        echo "<td>"; echo $row["product_type"]; echo "</td>";
        echo "<td>"; echo $row["name"]; echo "</td>";
        echo "<td>"; echo $row["description"]; echo "</td>";
        echo "<td>"; echo "<img class='images' src='../".$row["img_url"]."'>"; echo "</td>";
        echo "<td>"; echo $row["price"]; echo "</td>";
        echo "<td>"; echo $row["color"]; echo "</td>";

        //sizes
        echo "<td>";
        foreach ($db->getRecordsFromTable("product_has_sizes", "product_id", $row['product_id']) as $size) {
            echo $size['size']." ";
        }
        echo "<td>"; echo $row["in_stock"]; echo "</td>";
        echo "</td>";

        echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["product_id"]; ?>"<button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
        echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["product_id"]; ?>"<button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
    }
    ?>
    </tbody>
    </table>
    <?php
if (isset($_POST['create'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }


    $img_url = "img/".$fileNameNew;
    $db->insertRecordToProducts($_POST['product_type'], $_POST['name'], $_POST['description'], $img_url, $_POST['color'], $_POST['price'], $_POST['in_stock']);
    //$db->insertRecordToProductHasSizes($_POST['product_id'], $_POST['size']);
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
?>

</font>
</body>
</html>