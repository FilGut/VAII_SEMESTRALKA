<div class="hlavicka">
    <h1>Vitajte na stránke Tutaj!</h1>
    <p>najlepšia stránka na vtipy</p>

    <div class="vtipyObrazky">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
        <img src =../images/unnamed.gif alt="Korunka" style="width:5%; height:5%;">
    </div>

</div>

<div class="menu">
    <a href="../sites/vtipy.php">Domov</a>

    <a href="../sites/textVtipy.php">Vtipy</a>

    <div class="loggedOut">
        <a href="../sites/prihlasit.php">Prihlásiť</a>
    </div>

    <div class="loggedIn">
        <a href="../sites/profil.php">Profil</a>
    </div>

    <a href="../sites/registracia.php">Registrovať</a>

    <div class = loggedIn>
        <a href="../sites/zmenUdaje.php">Zmeň údaje</a>
    </div>

    <div class = loggedIn>
        <a>
            <form method="post" name="form">
                <input id="logoutButton" type="submit" value="Odhlásiť!" name="logout">
            </form>
        </a>
    </div>

    <a href="../sites/oStranke.php">O stránke</a>

    <?php if(isset($_SESSION['rank'])) {
        if($_SESSION['rank']==0) {?>
            <div class = loggedIn>
                <a href="../sites/admin.php">Admin sekcia</a>
            </div>
        <?php } }?>
</div>
