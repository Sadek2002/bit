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
            color: white;
        }

        array {
            color: white;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
</head>
<body style="background-color:#000563">
        <h1>Admin Page</h1>

        <ul>
            <li><a href="adminpage.php">Home</a></li>
            <li><a href="edit_item.php">Edit</a></li>
            <li><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">E-mails</a></li>
        </ul>

        <select name="Country" multiple size="5">
            <option value="USA">USA</option>
            <option value="Russia">Russia</option>
            <option value="India">India</option>
            <option value="Britain">Britain</option>
        </select>


        <?php
        require_once "../php/Database.php";
            $db = new Database("localhost", "bit_academy", "3306", "root", "");
            $db->checkConnectionToDatabase();
            echo "<pre>";
            print_r($db->getTableByName("products"));
            echo "</pre>";
?>
</body>
</html>
