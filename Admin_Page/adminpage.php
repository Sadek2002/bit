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

        .colors {
            color: black;
            padding-bottom: 20px;
        }

        .button {
            padding-bottom: 20px;
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

        <div class="container" style="margin-left: 0px">
        <div class="col-lg-4">
            <h2>Create Product</h2>
            <form action="" name="form1" method="post">
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
                    <input type="text" class="form-control" id="description" placeholder="Enter item description" name="description">
                </div>
                <div class="form-group">
                    <label for="Image URL">Image URL</label>
                    <input type="text" class="form-control" id="img_url" placeholder="Enter Image URL" name="img_url">
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter item price" name="price">
                </div>
                <div class="form-group">
                    <label for="Size">Sizes</label><br>
                    <input type="checkbox" id="sizes" name="sizes">
                    <label for="Small">S</label><br>
                    <input type="checkbox" id="sizes" name="sizes">
                    <label for="Medium">M</label><br>
                    <input type="checkbox" id="sizes" name="sizes">
                    <label for="Large">L</label><br>
                </div>
                <div class="colors">
                    <select name="color">
                        <option value="blue" id="color">Blue</option>
                        <option value="green" id="color">Green</option>
                        <option value="white" id="color">White</option>
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
                    <th>Edit</th>
                    <th>Delete</th>
        </div>
                </tr>
                </thead>
                <tbody>
        <?php
        require_once '../php/Database.php';
        $db = new Database("localhost", "bit_academy", "3306", "root", "");
        $db->checkConnectionToDatabase();

        foreach ($db->getTableByName("products") as $row)
        {
            echo "<tr bgcolor='#333'>";
            echo "<td>"; echo $row["product_id"]; echo "</td>";
            echo "<td>"; echo $row["product_type"]; echo "</td>";
            echo "<td>"; echo $row["name"]; echo "</td>";
            echo "<td>"; echo $row["description"]; echo "</td>";
            echo "<td>"; echo $row["img_url"]; echo "</td>";
            echo "<td>"; echo $row["price"]; echo "</td>";
            echo "<td>"; echo $row["color"]; echo "</td>";
            //sizes 
            echo "<td>";
            foreach ($db->getRecordsFromTable("products_has_sizes", "product_id", $row['product_id']) as $size) {
                echo $size['size']." ";
            }
            echo "</td>";

            echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["product_id"]; ?>"<button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
            echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["product_id"]; ?>"<button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
        }
        ?>
                </tbody>
            </table>

            <?php
        if (isset($_POST['create']))
        {
            $p_id = $_POST['product_id'];
            $db->insertRecordToProducts($_POST['product_type'], $_POST['name'], $_POST['description'], $_POST['img_url'], $_POST['color'], $_POST['price']);
            $db->insertRecordToProductsHasSizes($_POST['product_id'], $_POST['sizes']);
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
