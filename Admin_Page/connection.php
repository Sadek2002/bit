<?php
require_once "../php/Database.php";
    $link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
    mysqli_select_db($link,"bit_academy") or die(mysqli_error($link));
?>
