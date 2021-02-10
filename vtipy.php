
<?php
require "Storage.php";
require "Account.php";


$storage = new Account();

//if (isset($_POST['newName'])) {
//    $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
//}

echo "dadadad";

if (isset($_POST['name'])) {
    if($storage->login($_POST['name'], $_POST['password']))
    {
        echo "podarilo!";
    }
}

if (isset($_POST['logout'])) {
    echo "odhlaseny!";
    $storage->logout();
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
    <title>Vtipy</title>
    <link rel="stylesheet" href="<?php echo $cssFileName; ?>">

</head>

<body>

<div class="hlavicka">
    <h1>Vitajte na stránke Tutaj!</h1>
    <p>najlepšia stránka na vtipy</p>

<!--    <p>najlepšia stránka na vtipy</p>-->
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
            <a href="textVtipy.php">Textové vtipy</a>
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

    <div class="side1">
        <h2>Najlepšie</h2>

        <h5>najlepší vtip týždňa:</h5>
        <div class="najlepsiVtip">
            <figure>
                <img src ="https://i.pinimg.com/originals/b8/23/e0/b823e0216fbcc8c520e30d9c0cb296e3.jpg" alt="Čítanie myšlienok" style="width:100%; height:100%;">
                <figcaption>Žiaci</figcaption>
            </figure>
        </div>



        <p>Autor vtipným spôsobom ukazuje každodenné problémy ako aj žiakov, tak aj dospelých.</p>
        <!--        <div class="fakeimg" style="height:60px;">Image</div><br>-->
        <!--        <div class="fakeimg" style="height:60px;">Image</div><br>-->
        <!--        <div class="fakeimg" style="height:60px;">Image</div>-->
    </div>


    <div class="main">
        <h2>TITLE HEADING</h2>
        <h5>Title description, Dec 7, 2017</h5>
               <p>Some text..</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <h2>TITLE HEADING</h2>
        <h5>Title description, Sep 2, 2017</h5>
        <p>Some text..</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>

    <div class="side2">
        <h2>Najlepšie</h2>
        <h5>najlepší vtip týždňa:</h5>
        <div class="najlepsiVtip">
            <figure>
                <img src ="https://img.klocher.sk/wp-content/uploads/2016/11/funny-unexpected-ending-comics-mrlovenstein-8-583815e9bbecd__700.jpg" alt="Radšej život" style="width:100%; height:100%;">
                <figcaption>Radšej život</figcaption>
            </figure>
        </div>



        <p>Autor vtipným spôsobom zobrazuje absurdnosť otázky nahnevaných delikventov.</p>
        <!--        <div class="fakeimg" style="height:60px;">Image</div><br>-->
        <!--        <div class="fakeimg" style="height:60px;">Image</div><br>-->
        <!--        <div class="fakeimg" style="height:60px;">Image</div>-->
    </div>


</div>


</body>
</html>