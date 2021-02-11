<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <?php include 'profilChecking.php';?>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php'; ?>">
</head>

<body>

<?php
include 'menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>VITAJ SPÄŤ!</h1>

        <button onclick="showJokes()">MOJE VTIPY</button>
        <button onclick="addJokes()">Pridaj ďalšie vtipy</button>

<!--        <p id="jokes">Vtipy</p>-->
<!--        <p id="add">Pridaj</p>-->

<!--        <form action="/action_page.php">-->

        <div class="add">
            <form method="post" name="form">
                <!--            <label for="fname">First name:</label>-->
                <br>
                <input type="text" id="title" placeholder="Názov vtipu" name="title" required>
                <br>
                <br>
                <textarea id="joke" rows="4" cols="50" name="joke">
                Maximum je 255 znakov
            </textarea>
                <br><br>
                <input type="submit" value="Pridaj" name="addjoke">
            </form>

            <p>Klikni pridaj na uverejnenie vtipu.</p>
        </div>

        <br><br>

        <div class="jokes">
            <b id="jokes">Tu budú ukázané tvoje vtipy...</b>
        </div>




        <script>
            var hidden1 = true;
            var hidden2 = true;
            document.querySelectorAll('.add')[0].style.display = 'none';
            document.querySelectorAll('.add')[0].style.visibility = 'hidden';

            showJokes();

            //document.querySelectorAll('.jokes')[0].style.display = 'none';

            //document.querySelectorAll('.jokes')[0].style.visibility = 'hidden';

            function showJokes() {
                    hidden1 = !hidden1;

                    if(hidden1) {
                        document.querySelectorAll('.jokes')[0].style.display = 'none';
                        document.querySelectorAll('.jokes')[0].style.visibility = 'hidden';
                    } else {
                        if(!hidden2)
                        {
                            addJokes();
                        }
                        document.querySelectorAll('.jokes')[0].style.display = 'block';
                        document.querySelectorAll('.jokes')[0].style.visibility = 'visible';

                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState === 4 && this.status === 200) {
                                document.getElementById("jokes").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET","getJokes.php?q="+"1",true);
                        xmlhttp.send();
                    }
            }

            function addJokes() {
                hidden2 = !hidden2;
                if(hidden2) {
                    document.querySelectorAll('.add')[0].style.display = 'none';
                    document.querySelectorAll('.add')[0].style.visibility = 'hidden';
                } else {
                    if(!hidden1)
                    {
                        showJokes();
                    }
                    document.querySelectorAll('.add')[0].style.display = 'block';
                    document.querySelectorAll('.add')[0].style.visibility = 'visible';
                }
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