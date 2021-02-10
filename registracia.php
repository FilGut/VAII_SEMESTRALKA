<?php
    require "Storage.php";
    require "Account.php";

    $storage = new Account();

    if (isset($_POST['newName'])) {
        if($storage->control($_POST['newEmail'])==false)
        {
            print("ZLE ZADANÝ EMAIL!");
        }
        else
        {
            $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
        }
    }

    if (isset($_POST['name'])) {
        if($storage->login($_POST['name'], $_POST['password']))
        {
            echo "podarilo!";
        }
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
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="<?php echo $cssFileName; ?>">

</head>

<body>

<div class="hlavicka">
    <h1>Registrácia</h1>
    <div class="vtipyObrazky">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =unnamed.gif alt="Korunka" style="width:5%; height:5%;">
    </div>

</div>

<div class="menu">
    <a href="vtipy.php">Domov</a>



    <div class="rozbal">

        <button class="kategorie">Kategórie
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="rozbalObsah">
            <a href="#">Textové vtipy</a>
            <a href="#">Vtipné obrázky</a>
            <a href="memecka.php">Memečka</a>
        </div>
    </div>

    <div class="rozbal">

        <button class="kategorie">Prihlásiť
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="rozbalObsah">
            <form method="post" name="form">
                <input type="text" placeholder="Používat. meno" name="name" required>
                <br>
                <input type="password" placeholder="Heslo" name="password" required>
                <br>
                <input type="submit" value="Prihlásiť!" name="login">
            </form>
        </div>
    </div>

    <a href="registracia.php">Registrovať</a>

    <div class = loggedIn>
        <a href="zmenUdaje.php">Zmeň údaje</a>
    </div>

    <a href="oStranke.php">O stránke</a>
</div>

<div class="row">

    <div class="oStranke">
        <h1>REGISTRÁCIA</h1>
        <form method="post" name="form">
            <br>
            <input type="text" placeholder="Používat. meno" name="newName" required>
            <br>
            <br>
            <input type="password" placeholder="Heslo" name="newPassword" required>
            <br>
            <br>
            <input type="text" placeholder="E-mail" name="newEmail" required>
            <br>
            <br>
            <input type="submit" value="Registrovať!" name="signup">
        </form>
    </div>

</div>


</body>
</html>