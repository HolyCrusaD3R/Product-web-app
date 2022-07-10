<?php require "config/database.php" ?>
<?php require_once "classes/DVD_disc.php" ?>
<?php require_once "classes/Book.php" ?>
<?php require_once "classes/Furniture.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Luka's Project</title>
</head>
<body>
<header>
    <a href="./index.php"><h1>Luka's Project</h1></a>
    <div>
        <input type="submit" form="product_form" value="Save"/>
        <a href="./index.php"><button id="cancel">Cancel</button></a>
    </div>
</header>
<hr>
<main>