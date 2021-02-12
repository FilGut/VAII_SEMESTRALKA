<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require '../php/Storage.php'; require '../php/Account.php';?>
    <meta charset="UTF-8">
    <title>TextVtipy</title>
    <link rel="stylesheet" href="<?php include '../php/checkings/generalChecking.php' ?>">
</head>

<body>

<?php
include '../php/menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>TEXTOVÉ VTIPY</h1>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <input type="text" placeholder="Hľadaj..." id="search">
        <button onclick="searchJokes();"><i class="fa fa-search"></i></button>

        <br>

        <b id="content">Vtipy sa načítajú...</b>

    </div>

</div>

<script src="../js/textVJokesControl.js"></script>

</body>
</html>