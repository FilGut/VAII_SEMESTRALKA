<?php
require "Storage.php";
require "Account.php";

$storage = new Account();

if (isset($_POST['logout'])) {
    $storage->logout();
    header('Location: '.'vtipy.php');
}

if(isset($_SESSION['loggedIn'])){
    $cssFileName = 'loggedIn.css';
}else{
    $cssFileName = 'styl.css';
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <meta charset="UTF-8">
    <title>Memecka</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php' ?>">
</head>

<body>

<?php
include 'menu.php';
?>

<div class="memeRow">
    <div class="memeColumn">
        <img src="masks.jpg" alt="masks">
        <img src="overthing.jpg" alt="overthing">
        <img src="leavingSchool.jpg" alt="leavingSchool">
        <img src="bean.png" alt="bean">
    </div>
</div>


</body>
</html>