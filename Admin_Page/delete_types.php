<?php

require_once "../php/Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();


if (isset($_GET['type'])) {
    $db->deleteRecordsFromTable("product_types", "product_type", $_GET['type']);
}


if (isset($_GET['color'])) {
    $db->deleteRecordsFromTable("colors", "color", $_GET['color']);
}
?>

<script type="text/javascript">
    window.location = "types.php";
</script>