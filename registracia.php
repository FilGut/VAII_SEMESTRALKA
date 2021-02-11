<?php
    require "Storage.php";
    require "Account.php";

    $storage = new Account();

    if (isset($_POST['newName'])) {
        if($storage->checkPassword($_POST['newPassword'])==false)
        {
            print("ZLE ZADANÉ HESLO!");
        }
        else if($storage->checkEmail($_POST['newEmail'])==false)
        {
            print("ZLE ZADANÝ EMAIL!");
        }
        else
        {
            $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
        }
    }

//    if (isset($_POST['name'])) {
//        if($storage->login($_POST['name'], $_POST['password']))
//        {
//            echo "podarilo!";
//        }
//    }

    if (isset($_POST['logout'])) {
        //echo "odhlaseny!";
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
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="<?php echo $cssFileName; ?>">

</head>

<body>

<?php
include 'menu.php';
?>

<div class="row">

    <div class="oStranke">
        <h1>REGISTRÁCIA</h1>
        <form method="post" name="form">

            <div class="popup">
                <span class="popuptext" onclick="togglePopup()" id="myPopup">Zlý email alebo heslo (musí byť dlhé 6-12 a obsahovať 1 číslicu / špec. charakter)</span>
            </div>
            <br>

            <input type="text" placeholder="Používat. meno" name="newName" required>
            <br>
            <br>
            <input type="password" id="pass" placeholder="Heslo" name="newPassword" required>
            <br>
            <br>
            <input type="text" id="email" placeholder="E-mail" name="newEmail" required>
            <br>
            <br>
<!--            <input type="submit" value="Registrovať!" name="signup">-->
            <input type="submit" onClick="return validate();" value="Registrovať!" name="signup">
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


        if((document.getElementById("pass").value).match(reg)){
            return true;
        }
        //document.write("vratime false na prvom");
        return false;
    }

    function checkEmail()
    {
        var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;

        if((document.getElementById("email").value).match(reg)){
            return true;
        }
        //document.write("vratime false na druhom");
        return false;
    }

</script>


</body>
</html>