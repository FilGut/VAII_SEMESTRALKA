<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <?php include 'zmenUdajeChecking.php'?>
    <meta charset="UTF-8">
    <title>ZmenUdaje</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php' ?>">
</head>

<body>

<?php
include 'menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>ZMENA ÚDAJOV</h1>
        <form method="post" name="form">
            <div class="popup">
                <span class="popuptext" onclick="togglePopup()" id="myPopup">Zlý email alebo heslo (musí byť dlhé 6-12 a obsahovať 1 číslicu / špec. charakter)</span>
            </div>
            <br>
            <input type="text" placeholder="Nové používat. meno" name="newName">
            <br>
            <br>
            <input type="password" id="pass" placeholder="Nové heslo" name="newPassword">
            <br>
            <br>
            <input type="text" id="email" placeholder="Nový e-mail" name="newEmail">
            <br>
            <br>
            <input type="submit" onClick="return validate();" value="Zmeniť!" name="changeData">
        </form>

        <br>
        <br>

        <form method="post">
            <input type="submit" name="button1"
                   class="button" value="ZMAZAŤ ÚČET!" />
        </form>
    </div>
</div>

<script src="validation.js"></script>

</body>
</html>