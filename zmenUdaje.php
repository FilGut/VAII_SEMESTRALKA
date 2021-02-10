<?php
require "Storage.php";
require "Account.php";

$storage = new Account();

if (isset($_POST['newName'])) {
    if (!isset($_SESSION['loggedIn']))
    {
        print ("Nie je možné meniť, pokiaľ nie ste prihlásený!");
    }
    else {
        $storage->changeMyData($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
    }
}

//if (isset($_POST['newName'])) {
//    $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
//}

if (isset($_POST['name'])) {
    if($storage->login($_POST['name'], $_POST['password']))
    {
        echo "podarilo!";
    }
}


if(array_key_exists('button1', $_POST)) {
    $storage->deleteMe();
}


//if (isset($_POST['name'])) {
//    if($storage->login($_POST['name'], $_POST['password']))
//    {
//        echo "podarilo!";
//    }
//}
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
    <title>Vtipy</title>
    <link rel="stylesheet" href="<?php echo $cssFileName; ?>">
</head>

<body>

<div class="hlavicka">
    <h1>Zmeň údaje</h1>
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

    <div class="loggedOut">
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
    </div>



    <div class="loggedIn">
        <div class="rozbal">

            <button class="kategorie">Odhlásiť
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="rozbalObsah">
                <form method="post" name="form">
                    <input type="submit" value="Odhlásiť!" name="logout">
                </form>

            </div>
        </div>
    </div>

    <div class="loggedIn">
        <a href="profil.php">Profil</a>
    </div>


    <a href="registracia.php">Registrovať</a>


    <div class = loggedIn>
        <a href="zmenUdaje.php">Zmeň údaje</a>
    </div>


    <a href="oStranke.php">O stránke</a>
</div>

<div class="row">

    <div class="oStranke">
        <h1>ZMENA ÚDAJOV</h1>
        <form method="post" name="form">
            <br>
            <input type="text" placeholder="Nové používat. meno" name="newName">
            <br>
            <br>
            <input type="password" placeholder="Nové heslo" name="newPassword">
            <br>
            <br>
            <input type="text" placeholder="Nový e-mail" name="newEmail">
            <br>
            <br>
            <input type="submit" value="Zmeniť!" name="signup">
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