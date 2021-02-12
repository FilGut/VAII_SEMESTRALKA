showAllJokes();

/**
 * funkcia vytvára AJAX volanie na žiadosť o načítanie všetkých vtipov
 */
function showAllJokes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../index.php?q=2",true);
    xmlhttp.send();
}

/**
 * funkcia vytvára AJAX volanie na žiadosť o aktualizovanie hodnoty počtu likov na stránke
 */
function addLike(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../index.php?q=3&j="+id, true);
    xmlhttp.send();
}

/**
 * funkcia vytvára AJAX volanie na žiadosť o načítanie takých vtipov, ktoré vyhovujú hľadanému výrazu
 */
function searchJokes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../index.php?q="+document.getElementById("search").value, true);
    xmlhttp.send();
}