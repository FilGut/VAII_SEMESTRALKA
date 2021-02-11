<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <meta charset="UTF-8">
    <title>TextVtipy</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php' ?>">
</head>

<body>

<?php
include 'menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>TEXTOVÉ VTIPY</h1>

        <!-- Load icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- The form -->
        <input type="text" placeholder="Hľadaj..." id="search">
        <button onclick="searchJokes();"><i class="fa fa-search"></i></button>

        <br>

        <b id="content">Vtipy sa načítajú...</b>

    </div>

</div>

<script src="textVJokesControl.js"></script>

</body>
</html>