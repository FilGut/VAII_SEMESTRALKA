<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require '../php/Storage.php'; require '../php/Account.php';?>
    <?php include '../php/checkings/prihlasitChecking.php' ?>
    <meta charset="UTF-8">
    <title>Prihlasit</title>
    <link rel="stylesheet" href="<?php include '../php/checkings/generalChecking.php' ?>">

</head>

<body>

<?php
include '../php/menu.php';
?>

<div class="row">

    <div class="oStranke">

        <h1>PRIHLÁSIŤ</h1>

        <form method="post" name="form">
            <input type="text" placeholder="Používat. meno" name="name" required>
            <br>
            <input type="password" placeholder="Heslo" name="password" required>
            <br>
            <input type="submit" value="Prihlásiť!" name="login">
        </form>

    </div>

</div>


</body>
</html>
