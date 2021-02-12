<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require '../php/Storage.php'; require '../php/Account.php';?>
    <?php include '../php/checkings/zmenUdajeChecking.php' ?>
    <meta charset="UTF-8">
    <title>ZmenUdaje</title>
    <link rel="stylesheet" href="<?php include '../php/checkings/generalChecking.php' ?>">
</head>

<body>

<?php
include '../php/menu.php';
?>

<div class="row">

    <script src="../js/validation.js"></script>

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
            <input type="submit" onClick="return validateNew();" value="Zmeniť!" name="changeData">
        </form>

        <br>
        <br>

        <form method="post">
            <input type="submit" name="button1"
                   class="button" value="ZMAZAŤ ÚČET!" />
        </form>
    </div>
</div>



</body>
</html>