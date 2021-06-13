<?php
include_once ('../php/Database.php');

$db = new Database('localhost','bit_academy','3306','root','root');
$db->checkConnectionToDatabase();

if(isset($_POST['submit'])){

}

