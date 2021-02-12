var hidden1 = true;
var hidden2 = true;
document.querySelectorAll('.add')[0].style.display = 'none';
document.querySelectorAll('.add')[0].style.visibility = 'hidden';
showJokes();

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
        xmlhttp.open("GET","index.php?q=1",true);
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


