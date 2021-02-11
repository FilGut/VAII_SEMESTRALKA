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

        <div class="add">
            <form method="post" name="form">
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

    </div>

</div>

<script src="profilJokesControl.js"></script>

</body>
</html>