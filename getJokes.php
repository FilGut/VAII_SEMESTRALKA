<?php

session_start();

$q = $_GET['q'];


//$con = mysqli_connect('localhost','peter','abc123','my_db');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"ajax_demo");

const DB_HOST = 'localhost';
const DB_NAME = 'tutaj';
const DB_USER = 'root';
const DB_PASS = 'dtb456';

try {
    $db = new PDO('mysql:dbname=' . DB_NAME.';host=' . DB_HOST, DB_USER, DB_PASS);
} catch (PDOException $e) {
//    print("Nepodarilo sa pripojiť!");
    echo 'Connection failed: ' . $e->getMessage();
}


if($q == "1")
{
//    $sql="SELECT * FROM user WHERE id = '".$q."'";

//    $result = $db->query('SELECT title, joke, likes from jokes where user_id = ' . $_SESSION['user_id']);

//    $result = mysqli_query($con,$sql);

    $stmt = $db->prepare('SELECT title, joke, likes from jokes where user_id = ' . $_SESSION['user_id']);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_NUM);
//    if ($stmt->rowCount() == 0)
//    {
//        print("nenašlo nič");
//    }
//    else
//    {
//        print("idema na result");
//        print($result);
//        print("koncime result");
//    }






    echo "<table>
<tr>
<th>Názov</th>
<th>Vtip</th>
<th>Počet likov</th>
</tr>";
    while($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['0'] . "</td>";
        echo "<td>" . $row['1'] . "</td>";
        echo "<td>" . $row['2'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
else if ($q == "2")
{
    $stmt = $db->prepare('SELECT title, joke, likes, name from jokes JOIN users ON jokes.user_id = users.user_id');
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_NUM);
//    if ($stmt->rowCount() == 0)
//    {
//        print("nenašlo nič");
//    }
//    else
//    {
//        print("idema na result");
//        print($result);
//        print("koncime result");
//    }


    echo "<br>
<table>
<tr>
<th>Názov</th>
<th>Vtip</th>
<th>Počet likov</th>
<th>Pridal</th>
</tr>";
    while($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['0'] . "</td>";
        echo "<td>" . $row['1'] . "</td>";
        echo "<td>" . $row['2'] . "<button onclick='addLike()'>LIKE</button>" ."</td>";
        echo "<td>" . $row['3'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
else
{

    $stmt = $db->prepare("SELECT title, joke, likes, name from jokes JOIN users ON jokes.user_id = users.user_id WHERE title LIKE '%" . $q . "%' OR name LIKE '%". $q . "%'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_NUM);
//    if ($stmt->rowCount() == 0)
//    {
//        print("nenašlo nič");
//    }
//    else
//    {
//        print("idema na result");
//        print($result);
//        print("koncime result");
//    }


    echo "<br>
<table>
<tr>
<th>Názov</th>
<th>Vtip</th>
<th>Počet likov</th>
<th>Pridal</th>
</tr>";
    while($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['0'] . "</td>";
        echo "<td>" . $row['1'] . "</td>";
        echo "<td>" . $row['2'] . "<button onclick='addLike()'>LIKE</button>" ."</td>";
        echo "<td>" . $row['3'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}



//mysqli_close($con);
?>
