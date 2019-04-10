<?php
include './controller/location.php';

$place=ip_location('78.31.41.54');
var_dump($place);

places($place->data->latitude.','.$place->data->longitude);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>sign in</h2>

<form action="./view/account.php" method="get">
    <label>
        Mail
        <input type="email" placeholder="your email" name="mail">
    </label>
    <label>
        password
        <input type="password" placeholder="password" name="psw">
    </label>
    <input type="submit">
</form>

<h2>sign up</h2>

<form action="./view/create_account.php" method="post">
    <label>
        nom
        <input type="text" placeholder="your name" name="name">
    </label>
    <label>
        mail
        <input type="email" placeholder="your mail" name="mail">
    </label>
    <label>
        nom
        <input type="password" placeholder="password" name="psw">
    </label>
    <input type="submit">
</form>
</body>
</html>