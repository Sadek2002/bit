<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'bit_academy');

if(isset($_POST['insert']))
{
    $id = $_POST['id'];
}
?>
