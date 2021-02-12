<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require '../php/Storage.php'; require '../php/Account.php'; require '../php/Jokes.php';?>
    <?php include '../php/checkings/adminChecking.php' ?>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php include '../php/checkings/generalChecking.php' ?>">
</head>

<body>

<?php
include '../php/menu.php';
?>

<div class="row">
    <div class="oStranke">
        <h1>Administrácia</h1>
        <form method="post" name="form">
            <br>
            <input type="text" placeholder="Meno vtipu" name="jokeName">
            <br>
            <br>
            <input type="text" id="pass" placeholder="Meno používateľa" name="userName">
            <br>
            <br>
            <input type="submit" value="Odstrániť!" name="delete">
        </form>
    </div>
</div>



</body>
</html>