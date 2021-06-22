<?php
include "adminpage.php";
require_once '../php/Database.php';
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();

$id = $_GET["id"];

$product = $db->getRecordsFromTable("products", "product_id", $id);
unlink("../".$product[0]['img_url']);

$db->deleteRecordsFromTable("order_has_products", 'product_id', $id);
$db->deleteRecordsFromTable("product_has_sizes", 'product_id', $id);
$db->deleteRecordsFromTable("products", 'product_id', $id);
?>

<script type="text/javascript">
    window.location="adminpage.php";
</script>
