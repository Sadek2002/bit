<?php
include_once ('../php/Database.php');

$db = new Database('localhost','bit_academy','3306','root','alicia573');
$db->checkConnectionToDatabase();

if(isset($_POST['submit'])){

}

