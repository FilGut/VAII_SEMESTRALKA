<?php
require "Storage.php";
require "Account.php";

$storage = new Account();

if (isset($_POST['title']) && isset($_POST['joke'])) {
    if (!isset($_SESSION['loggedIn']))
    {
        print ("Nie je možné pridávať, pokiaľ nie ste prihlásený!");
    }
    else {
//        print("volám metódu");
        $storage->addJokes($_POST['title'], $_POST['joke']);
    }
}

//if (isset($_POST['newName'])) {
//    $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
//}

//if (isset($_POST['name'])) {
//    if($storage->login($_POST['name'], $_POST['password']))
//    {
//        echo "podarilo!";
//    }
//}


//if(array_key_exists('button1', $_POST)) {
//    $storage->deleteMe();
//}


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
        <h1>TEXTOVÉ VTIPY</h1>

        <!-- Load icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- The form -->
        <input type="text" placeholder="Hľadaj..." id="search">
        <button onclick="searchJokes();"><i class="fa fa-search"></i></button>

        <br>

        <b id="content">Vtipy sa načítajú...</b>

<!--        <button onclick="showJokes()">MOJE VTIPY</button>-->
<!--        <button onclick="addJokes()">Pridaj ďalšie vtipy</button>-->

        <!--        <p id="jokes">Vtipy</p>-->
        <!--        <p id="add">Pridaj</p>-->

        <!--        <form action="/action_page.php">-->

<!--        <div class="add">-->
<!--            <form method="post" name="form">-->
<!--                           <label for="fname">First name:</label>-->
<!--                <br>-->
<!--                <input type="text" id="title" placeholder="Názov vtipu" name="title" required>-->
<!--                <br>-->
<!--                <br>-->
<!--                <textarea id="joke" rows="4" cols="50" name="joke">-->
<!--                Maximum je 255 znakov-->
<!--            </textarea>-->
<!--                <br><br>-->
<!--                <input type="submit" value="Pridaj" name="addjoke">-->
<!--            </form>-->
<!---->
<!--            <p>Klikni pridaj na uverejnenie vtipu.</p>-->
<!--        </div>-->
<!---->
<!--        <br><br>-->
<!---->
<!--        <div class="jokes">-->
<!--            <b id="jokes">Tu budú ukázané tvoje vtipy...</b>-->
<!--        </div>-->




        <script>
            showAllJokes();
            //document.write("začínam prvý skript");
            function showAllJokes() {

                //echo("Dokument je načítaný!");
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("content").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getJokes.php?q="+"2",true);
                xmlhttp.send();

            //onload=showAllJokes() toto bolo v body

            }
        </script>
        <script>
            function addLike()
            {

            }

            function searchJokes() {
                // if (str.length==0) {
                //     document.getElementById("livesearch").innerHTML="";
                //     document.getElementById("livesearch").style.border="0px";
                //     return;
                // }
                // var xmlhttp=new XMLHttpRequest();
                // xmlhttp.onreadystatechange=function() {
                //     if (this.readyState==4 && this.status==200) {
                //         document.getElementById("livesearch").innerHTML=this.responseText;
                //         document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                //     }
                // }
                // xmlhttp.open("GET","getJokes.php?q="+str,true);
                // xmlhttp.send();


                //document.write("Som vo funkcii");
                //document.write(document.getElementById("myText").value);

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("content").innerHTML = this.responseText;
                    }
                };
                //document.write(document.getElementById("myText").value);
                xmlhttp.open("GET", "getJokes.php?q="+document.getElementById("search").value, true);
                xmlhttp.send();
            }
        </script>





        <!--        <form method="post" name="form">-->
        <!--            <br>-->
        <!--            <input type="text" placeholder="Nové používat. meno" name="newName">-->
        <!--            <br>-->
        <!--            <br>-->
        <!--            <input type="password" placeholder="Nové heslo" name="newPassword">-->
        <!--            <br>-->
        <!--            <br>-->
        <!--            <input type="text" placeholder="Nový e-mail" name="newEmail">-->
        <!--            <br>-->
        <!--            <br>-->
        <!--            <input type="submit" value="Zmeniť!" name="signup">-->
        <!--        </form>-->
        <!---->
        <!--        <br>-->
        <!--        <br>-->
        <!---->
        <!--        <form method="post">-->
        <!--            <input type="submit" name="button1"-->
        <!--                   class="button" value="ZMAZAŤ ÚČET!" />-->
        <!--        </form>-->
    </div>







</div>


</body>
</html>