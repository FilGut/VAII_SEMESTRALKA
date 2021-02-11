
<?php
require "Storage.php";
require "Account.php";


$storage = new Account();

//if (isset($_POST['newName'])) {
//    $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
//}

//echo "dadadad";

//if (isset($_POST['name'])) {
//    if($storage->login($_POST['name'], $_POST['password']))
//    {
//        echo "podariloSaPrihlasitx  !";
//    }
//}

if (isset($_POST['logout'])) {
    //echo "odhlaseny!";
    $storage->logout();
    header('Location: '.'vtipy.php');
}



    if(isset($_SESSION['loggedIn'])){
        $cssFileName = 'loggedIn.css';
        print("používame loggedIn");
    }else{
        $cssFileName = 'styl.css';
        print("používame tradičný štýl");
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

<?php
    include 'menu.php';
?>

<div class="row">

    <div class="side1">
        <h2>Najlepšie</h2>

        <h5>najlepší vtip týždňa:</h5>
        <div class="najlepsiVtip">
            <figure>
                <img src ="https://i.pinimg.com/originals/b8/23/e0/b823e0216fbcc8c520e30d9c0cb296e3.jpg" alt="Čítanie myšlienok" style="max-width: 100%; max-height: 100%">
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
                <img src ="https://img.klocher.sk/wp-content/uploads/2016/11/funny-unexpected-ending-comics-mrlovenstein-8-583815e9bbecd__700.jpg" alt="Radšej život" style="max-width:100%; max-height:100%; ">
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