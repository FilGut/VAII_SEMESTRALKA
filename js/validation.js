function validate()
{
    if(checkEmail() && checkPassword())
    {
        return true;
    }
    togglePopup();
    return false;
}

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
    return false;
}

function checkEmail()
{
    var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;

    if((document.getElementById("email").value).match(reg)){
        return true;
    }
    return false;
}