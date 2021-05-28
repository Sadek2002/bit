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

        label {
            color: white;
            margin-left: 150px;
            margin-bottom: 100px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color:#000563">

        <h1>Edit</h1>

        <ul>
             <li><a href="adminpage.html">Home</a></li>
             <li><a href="edit_item.html">Edit</a></li>
             <li><a href="add_item.html">Add</a></li>
             <li><a href="delete_item.html">Delete</a></li>
             <li><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">E-mails</a></li>
        </ul>

        <label for="edit">Choose an item: </label>

        <select name="edit" id="edit">
          <option value="">Cup</option>
          <option value="">Caps</option>
          <option value="">Socks</option>
          <option value="">Glasses</option>
          <option value="">Pens</option>
          <option value="">Mouse Pad</option>
          <option value="">Bit Hoodie Text</option>
          <option value="">Bit Hoodie Logo</option>
         </select>

</body>
</html>