<?php
require "php/Storage.php";
require "php/Account.php";

$storage = new Account();

if (isset($_POST['logout'])) {
    $storage->logout();
    header('Location: '.'vtipy.php');
}

if(isset($_SESSION['loggedIn'])){
    $cssFileName = 'style/loggedIn.css';
}else{
    $cssFileName = 'style/styl.css';
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require '../php/Storage.php'; require '../php/Account.php';?>
    <meta charset="UTF-8">
    <title>Memecka</title>
    <link rel="stylesheet" href="<?php include '../php/checkings/generalChecking.php' ?>">
</head>

<body>

<?php
include '../php/menu.php';
?>

<div class="memeRow">
    <div class="memeColumn">
        <img src="../images/masks.jpg" alt="masks">
        <img src="../images/overthing.jpg" alt="overthing">
        <img src="../images/leavingSchool.jpg" alt="leavingSchool">
        <img src="../images/bean.png" alt="bean">
    </div>
</div>


</body>
</html>