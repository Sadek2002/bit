<!doctype html>
<?php
require_once '../php/Database.php';
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="AdminStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>admin</title>
</head>

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


<body style="background-color: #000563">
    <font color="white">
        <ul class="menu-border">
            <li><a href="adminpage.php">Edit</a></li>
            <li><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">Mail</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="types.php">Types</a></li>
        </ul>

        <div class="container" style="margin-left: 0px; float: left; width: 50%">
            <div class="col-lg-4" style="width: 100%">
                <h2>Create Type</h2>
                <p style="color: red">Be aware that you can't delete a type that is being used by a product!</p>
                <form action="" name="form1" method="POST">
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <input type="text" class="form-control" id="product_type" placeholder="Enter New Type" name="product_type" required>
                    </div>
                    <div class="button">
                        <button type="submit" name="create_type" class="btn btn-success">Create</button>
                    </div>
                </form>

                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr bgcolor="black">
                                <th>Types</th>
                                <th>Delete</th>
                            </tr>

                            <?php
                                foreach ($db->getTableByName("product_types") as $row) {
                                    echo "<tr bgcolor='#333'>";
                                    echo "<td>"; echo $row["product_type"]; echo "</td>";
                                    echo "<td>"; ?> <a href="delete_types.php?type=<?php echo $row["product_type"]; ?>"<button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
                                }
                            ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


        <div class="container" style="margin-left: 0px; float: left; width: 50%">
            <div class="col-lg-4" style="width: 100%">
                <h2>Create Color</h2>
                <p style="color: red">Be aware that you can't delete a color that is being used by a product!</p>
                <form action="" name="form1" method="POST">
                    <div class="form-group">
                        <label for="Color">Color</label>
                        <input type="text" class="form-control" id="color" placeholder="Enter New Color" name="color" required>
                    </div>
                    <div class="button">
                        <button type="submit" name="create_color" class="btn btn-success">Create</button>
                    </div>
                </form>

                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr bgcolor="black">
                                <th>Color</th>
                                <th>Delete</th>
                            </tr>

                            <?php
                                foreach ($db->getTableByName("colors") as $row) {
                                    echo "<tr bgcolor='#333'>";
                                    echo "<td>"; echo $row["color"]; echo "</td>";
                                    echo "<td>"; ?> <a href="delete_types.php?color=<?php echo $row["color"]; ?>"<button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";
                                }
                            ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <?php
           if (isset($_POST['create_color'])) {
               $db->insertRecordToColors($_POST['color']);
        ?>
            <script type="text/javascript">
                window.location.href=window.location.href;
            </script>
        <?php
            }
        ?>


        <?php
            if (isset($_POST['create_type'])) {
            $db->insertRecordToProductTypes($_POST['product_type']);
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