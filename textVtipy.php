<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <meta charset="UTF-8">
    <title>TextVtipy</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php' ?>">
</head>

<body>

<?php
include 'menu.php';
?>

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
                xmlhttp.open("GET","index.php?q=2",true);
                xmlhttp.send();

            //onload=showAllJokes() toto bolo v body

            }
        </script>
        <script>
            function addLike(id)
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("content").innerHTML = this.responseText;
                    }
                };
                //document.write(document.getElementById("myText").value);
                xmlhttp.open("GET", "index.php?q=3&j="+id, true);
                xmlhttp.send();
                //showAllJokes();
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
                xmlhttp.open("GET", "index.php?q="+document.getElementById("search").value, true);
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