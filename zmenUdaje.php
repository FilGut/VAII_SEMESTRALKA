<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require 'Storage.php'; require 'Account.php';?>
    <?php include 'zmenUdajeChecking.php';?>
    <meta charset="UTF-8">
    <title>ZmenUdaje</title>
    <link rel="stylesheet" href="<?php include 'generalChecking.php' ?>">
</head>

<body>

<?php
include 'menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>ZMENA ÚDAJOV</h1>
        <form method="post" name="form">
            <div class="popup">
                <span class="popuptext" onclick="togglePopup()" id="myPopup">Zlý email alebo heslo (musí byť dlhé 6-12 a obsahovať 1 číslicu / špec. charakter)</span>
            </div>
            <br>
            <input type="text" placeholder="Nové používat. meno" name="newName">
            <br>
            <br>
            <input type="password" id="pass" placeholder="Nové heslo" name="newPassword">
            <br>
            <br>
            <input type="text" id="email" placeholder="Nový e-mail" name="newEmail">
            <br>
            <br>
            <input type="submit" onClick="return validate();" value="Zmeniť!" name="changeData">
        </form>

        <br>
        <br>

        <form method="post">
            <input type="submit" name="button1"
                   class="button" value="ZMAZAŤ ÚČET!" />
        </form>
    </div>
</div>


<script>
    function validate()
    {
        if(checkEmail() && checkPassword())
        {
            return true;
        }
        togglePopup();
        return false;
    }

    function togglePopup()
    {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }

    function checkPassword()
    {
        var reg = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/;


        if((document.getElementById("pass").value).match(reg) || (document.getElementById("pass").value) === ""){
            return true;
        }
        //document.write("vratime false na prvom");
        return false;
    }

    function checkEmail()
    {
        var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;

        if((document.getElementById("email").value).match(reg) || (document.getElementById("email").value) === ""){
            return true;
        }
        //document.write("vratime false na druhom");
        return false;
    }

</script>


</body>
</html>