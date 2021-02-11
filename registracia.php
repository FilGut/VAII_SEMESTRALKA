<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <?php include 'registraciaChecking.php'?>
    <meta charset="UTF-8">
    <title>Registracia</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php' ?>">

</head>

<body>

<?php
include 'menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>REGISTRÁCIA</h1>
        <form method="post" name="form">

            <div class="popup">
                <span class="popuptext" onclick="togglePopup()" id="myPopup">Zlý email alebo heslo (musí byť dlhé 6-12 a obsahovať 1 číslicu / špec. charakter)</span>
            </div>
            <br>

            <input type="text" placeholder="Používat. meno" name="newName" required>
            <br>
            <br>
            <input type="password" id="pass" placeholder="Heslo" name="newPassword" required>
            <br>
            <br>
            <input type="text" id="email" placeholder="E-mail" name="newEmail" required>
            <br>
            <br>
<!--            <input type="submit" value="Registrovať!" name="signup">-->
            <input type="submit" onClick="return validate();" value="Registrovať!" name="signup">
        </form>
    </div>

</div>

<script src="validation.js"></script>

</body>
</html>