
/**
 * funkcia slúži na validovanie sily hesla a čiastočné zistenie validity zadaného emaila pri registrácii
 *
 * @returns {boolean}
 */
function validate()
{
    if(checkEmail() && checkPassword())
    {
        return true;
    }
    togglePopup();
    return false;
}

/**
 * funkcia slúži na validovanie sily hesla a čiastočné zistenie validity zadaného emailu
 * pri zmene zákl. údajov používateľa
 *
 * @returns {boolean}
 */
function validateNew()
{
    if((document.getElementById("email").value) !== "")
    {
        if(checkEmail()===false)
        {
            togglePopup();
            return false;
        }
    }

    if((document.getElementById("pass").value) !== "")
    {
        if(checkEmail()===false)
        {
            togglePopup();
            return false;
        }
    }

    return true;
}

/**
 * funkcia slúži na ukázanie a skrytie tzv. popup okna, informujúceho, či máme dostatočnú silu hesla / validitu emailu
 */
function togglePopup()
{
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

/**
 * funkcia priamo zisťuje silu zadaného hesla za pom. regulárneho výrazu (viď. trieda Account.php)
 *
 * @returns {boolean}
 */
function checkPassword()
{
    var reg = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/;


    if((document.getElementById("pass").value).match(reg)){
        return true;
    }
    return false;
}

/**
 * funkcia priamo zisťuje čiastočnú validitu zadaného emailu za pom. regulárneho výrazu (viď. trieda Account.php)
 *
 * @returns {boolean}
 */
function checkEmail()
{
    var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;

    if((document.getElementById("email").value).match(reg)){
        return true;
    }
    return false;
}