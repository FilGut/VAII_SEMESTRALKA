<?php



class Jokes extends Storage
{
    function showMyJokes()
    {
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

    function showAllJokes()
    {
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

    function addLike($j)
    {
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

    function search($q)
    {
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

    function addJoke($title, $text)
    {
        try {
            $sql = 'INSERT into jokes(user_id, likes, joke, title) value(?,?,?,?)';
            $this->db->prepare($sql)->execute([$_SESSION['user_id'], 0, $text, $title]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
    }
}