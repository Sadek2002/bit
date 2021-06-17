<?php
require_once '../php/Database.php';
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();
$id=$_GET["id"];

$product = $db->getRecordsFromTable("products", 'product_id', $id);

?>
<?php
if (isset($_POST['update'])) {
$file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'gif');

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

    $id=$_GET["id"];
    unlink("../".$product[0]['img_url']);

    $img_url = "img/".$fileNameNew;
    $db->updateRecordsFromTable("products", "product_type", $_POST['product_type'], "product_id", $id);
    $db->updateRecordsFromTable("products", "name", $_POST['name'], "product_id", $id);
    $db->updateRecordsFromTable("products", "description", $_POST['description'], "product_id", $id);
    $db->updateRecordsFromTable("products", "img_url", $img_url, "product_id", $id);
    $db->updateRecordsFromTable("products", "price", $_POST['price'], "product_id", $id);
    $db->updateRecordsFromTable("products", "color", $_POST['color'], "product_id", $id);
    $db->updateRecordsFromTable("products", "in_stock", $_POST['in_stock'], "product_id", $id);
    $db->deleteRecordsFromTable("product_has_sizes", "product_id", $id);

    for ($i = 0; $i < 10; $i++) {
        if (isset($_POST['size'.$i])) {
            $db->insertRecordToProductHasSizes($id, $_POST['size'.$i]);
        }
    }
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
<title>Edit</title>
</head>
<script>
    function createItem(name, description) {
        console.log()
    }
</script>
<link rel="stylesheet" href="AdminStyle.css">
<header style="margin-left: 30px">
    <img src="../img/logo.svg">
</header>
<body style="background-color:#000563">
<font color="white">
    <div class="container">
        <div class="col-lg-4">
            <h2>Edit Product</h2>
            <form action="" name="form1" method="post" enctype="multipart/form-data">
                <img src="<?php echo "../".$product[0]["img_url"];?>" height="100" width="100">
                <div>
                    <label for="Product Type">Product Type</label>
                </div>
                <div class="colors">
                    <select name="product_type" required>
                        <?php

                        echo "<option value='".$product[0]['product_type']."' id='product_type'>".$product[0]['product_type']."</option>";


                        foreach ($db->getTableByName("product_types") as $row) {
                            if ($row["product_type"] !== $product[0]['product_type']) {
                                echo "<option value='".$row['product_type']."' id='product_type'>".$row['product_type']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Item Name">Item Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" value="<?php echo $product[0]['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Item description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter product description" name="description" value="<?php echo $product[0]['description']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter product price" name="price" value="<?php echo $product[0]['price']; ?>" required>
                </div>
                    <div class="form-group mb-3">
                        <label for="size">Sizes</label><br>

                        <?php
                            $i = 0;
                            foreach ($db->getTableByName("sizes") as $row) {
                                echo "<input type='checkbox' value='" . $row['size'] . "' name='size" . $i . "'>" . $row['size'] . "<br>";
                                $i++;
                            }

                        ?>

                    </div>
                <div class="form-group">
                    <label for="Stock">Stock</label>
                    <input type="text" class="form-control" id="in_stock" placeholder="Enter stock" name="in_stock" value="<?php echo $product[0]['in_stock']; ?>" required>
                </div>
                    <div>
                        <label for="Product Color">Product Color</label>
                    </div>
                        <div class="colors">
                            <select name="color">
                                <?php
                                echo "<option value='".$product[0]['color']."' id='color'>".$product[0]['color']."</option>";


                                foreach ($db->getTableByName("colors") as $row) {
                                    if ($row["color"] !== $product[0]['color']) {
                                        echo "<option value='".$row['color']."' id='color'>".$row['color']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                <button type="submit" name="update" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
    </tr>
    </thead>
    <tbody>
</font>
</body>
</html>