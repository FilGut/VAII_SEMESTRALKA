<?php

class Jokes extends Storage
{

    /**
     * funkcia slúži na zobrazenie pridaných vtipov používateľa
     */
    function showMyJokes()
    {
        //najprv sa zistia pridané vtipy z databázy
        //následne sa vytvorí tabuľka, kde je možné tieto vtipy (a ďalšie info) prehliadať
        $stmt = $this->db->prepare('SELECT title, joke, likes from jokes where user_id = ' . $_SESSION['user_id']);
        $stmt->execute();

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

    /**
     * funckia slúži na zobrazenie všetkých vtipov na stránke
     */
    function showAllJokes()
    {
        //okrem tradičnej tabuľky sa vytvoria aj tlačidlá umožňujúce prihláseným používateľom dať like na konkrétny vtip
        $stmt = $this->db->prepare('SELECT joke_id, title, joke, likes, name from jokes JOIN users ON jokes.user_id = users.user_id');
        $stmt->execute();

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
            echo "<td>" . $row['1'] . "</td>";
            echo "<td>" . $row['2'] . "</td>";
            echo "<td>" . $row['3'] . "<button onclick='addLike(". $row['0'] .")' id='likeButton'>♥</button>" ."</td>";
            echo "<td>" . $row['4'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * funkcia slúži na pridanie a zápis liku do databázy k príslušnému vtipu
     *
     * @param $j
     */
    function addLike($j)
    {
        //funkcia taktiež dbá na to, aby nebolo možné jeden vtip olajkovať 1 užívateľom viackrát
        //v prípade opätovného stlačenia tlačidla sa pridaný like odoberie
        try {
            $sql = "SELECT like_id FROM likes WHERE user_id=? AND joke_id=?"; // SQL with parameters
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array($_SESSION['user_id'], $j));

            if ($stmt->rowCount() == 0)
            {
                $sql = 'UPDATE jokes SET likes = likes+1 WHERE joke_id = ?';
                $this->db->prepare($sql)->execute([$j]);

                $sql = 'INSERT INTO likes (user_id, joke_id) value (?, ?)';
                $this->db->prepare($sql)->execute([$_SESSION['user_id'], $j]);
            }
            else
            {
                $sql = 'UPDATE jokes SET likes = likes-1 WHERE joke_id = ?';
                $this->db->prepare($sql)->execute([$j]);

                $sql = 'DELETE FROM likes WHERE user_id = ? AND joke_id = ?';
                $this->db->prepare($sql)->execute([$_SESSION['user_id'], $j]);
            }
            $this->showAllJokes();

        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
    }

    /**
     * funkcia slúži na umožnenie vyhľadávania vtipov (podľa názvu alebo mena používateľa)
     *
     * @param $q
     */
    function search($q)
    {
        //zadaný argument sa porovnáva ako reťazec s názvami vtipov a menami požívateľov
        $stmt = $this->db->prepare("SELECT joke_id, title, joke, likes, name from jokes JOIN users ON jokes.user_id = users.user_id WHERE title LIKE '%" . $q . "%' OR name LIKE '%". $q . "%'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_NUM);

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
            echo "<td>" . $row['1'] . "</td>";
            echo "<td>" . $row['2'] . "</td>";
            echo "<td>" . $row['3'] . "<button onclick='addLike(". $row['0'] .")' id='likeButton''>♥</button>" ."</td>";
            echo "<td>" . $row['4'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * funkcia umožňuje prihlásenému užívateľovi pridať nový vtip
     *
     * @param $title
     * @param $text
     */
    function addJoke($title, $text)
    {
        try {
            $sql = 'INSERT into jokes(user_id, likes, joke, title) value(?,?,?,?)';
            $this->db->prepare($sql)->execute([$_SESSION['user_id'], 0, $text, $title]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
    }

    /**
     * táto funkcia slúži na násilne zmazanie vtipu používateľa,
     * je prístupná len administrátorovi (používateľovi s rankom 0)
     *
     * @param $title
     * @return bool
     */
    function deleteJoke($title)
    {
        try {
            $sql = 'DELETE from jokes where title = ?';
            $this->db->prepare($sql)->execute([$title]);

            $stmt = $this->db->prepare("SELECT joke_id from jokes WHERE title = " . $title);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_NUM);

            if ($stmt->rowCount() == 0)
            {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
        return false;
    }
}