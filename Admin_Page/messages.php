<!doctype html>
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
    <ul class="menu-border">
        <li><a href="adminpage.php">Edit</a></li>
        <li><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">Mail</a></li>
        <li><a href="messages.php">Messages</a></li>
        <li><a href="types.php">Types</a></li>
    </ul>
    <body style="background-color: #000563">
<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
        <tr bgcolor="black">
            <th>E-mail</th>
            <th>Telephone Number</th>
            <th>Order Number</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Text</th>
</div>
</tr>
</thead>
<tbody>
</body>
</html>
<?php

require_once '../php/Database.php';
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();


foreach ($db->getTableByName("messages") as $row)
{
    echo "<tr bgcolor='#333'>";
    echo "<td>"; echo $row["email"]; echo "</td>";
    echo "<td>"; echo $row["telephone_nr"]; echo "</td>";
    echo "<td>"; echo $row["order_nr"]; echo "</td>";
    echo "<td>"; echo $row["name"]; echo "</td>";
    echo "<td>"; echo $row["subject"]; echo "</td>";
    echo "<td>"; echo $row["text"]; echo "</td>";
}
?>
</tbody>
</table>