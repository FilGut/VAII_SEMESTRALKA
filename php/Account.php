<?php

class Account extends Storage
{

    /**
     * funkcia slúži na zaregistrovanie používateľa
     *
     * @param $name
     * @param $password
     * @param $email
     */
    function register($name, $password, $email)
    {
        try {
            //najprv sa vytvorí hash, ten sa pridá spolu s menom, emailom a rankom do tabuľky používateľov
            $pass = password_hash($password,PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (name, password, email, rank) value (?, ?, ?, ?)';
            $this->db->prepare($sql)->execute([$name, $pass, $email, 1]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
        //ako posledný krok je užívateľ prihlásený
        $this->login($name,$password);


    }

    /**
     * funkcia kontroluje, či zadaný email spĺňa podmienky
     *
     * @param $email
     * @return bool
     */
    function checkEmail($email)
    {
        //regulárny výraz, email musí byť primerane dlhý, mať v sebe zavináč atď.
        if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email))
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * funkcia kontroluje, či zadané heslo spĺňa podmienky
     *
     * @param $password
     * @return bool
     */
    function checkPassword($password)
    {
        //regulárny výraz, heslo musí obsahovať aj písmeno, aj číslicu (alebo špec. znak) a byť 6 - 12 charakterov dlhé
        if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $password))
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * funkcia prihlasuje používateľa
     *
     * @param $name
     * @param $password
     * @return bool
     */
    function login($name, $password)
    {
        $stmt = $this->db->prepare("SELECT user_id, password, rank from users where name = '" . $name  ."'");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_NUM);
        if ($stmt->rowCount() == 0)
        {
            return false;
        }

        while ($row = $stmt->fetch()) {
            $id = $row[0];
            $hash = $row[1];
            $rank = $row[2];
        }

        //pokiaľ sa zhoduje heslo (po prevedení do hash), priradí sa session
        if(password_verify($password, $hash))
        {
            $_SESSION['user_id'] = $id;
            $_SESSION['loggedIn'] = true;
            $_SESSION['rank'] = $rank;
            return true;
        }

        return false;
    }

    /**
     * funkcia odhlási používateľa
     */
    function logout()
    {
        //všetky session spojené s používateľom sa dajú preč a následne sa vykoná príkaz na odstránenie session
        unset($_SESSION["user_id"]);
        unset($_SESSION["loggedIn"]);
        session_destroy();
    }

    /**
     * funkcia slúži na zmenu mena používateľa
     *
     * @param $name
     */
    function changeName($name)
    {
        //príkaz sa odošle do databázy a zmení meno používateľa na základe jeho id
        $sql = 'UPDATE users SET name = ? WHERE user_id = ?';
        $this->db->prepare($sql)->execute([$name, $_SESSION['user_id']]);
    }

    /**
     * funkcia slúži na zmenu hesla používateľa
     *
     * @param $password
     */
    function changePassword($password)
    {
        //príkaz sa odošle do databázy a zmení heslo používateľa na základe jeho id
        $pass = password_hash($password,PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET password = ? WHERE user_id = ?';
        $this->db->prepare($sql)->execute([$pass, $_SESSION['user_id']]);
    }

    /**
     * funckia slúži na zmenu emailu používateľa
     *
     * @param $email
     */
    function changeEmail($email)
    {
        //príkaz sa odošle do databázy a zmení email používateľa na základe jeho id
        $sql = 'UPDATE users SET email = ? WHERE user_id = ?';
        $this->db->prepare($sql)->execute([$email, $_SESSION['user_id']]);
    }

    /**
     * funkcia slúži na vymazanie účtu používateľa z tabuľky users (pridané vtipy sa nevymažú)
     */
    function deleteMe()
    {
        try {
            //príkaz sa odošle do databázy a odstráni používateľa na základe jeho id
            //ako posledný krok sa odstráni session
            $sql = 'DELETE from users where user_id = ?';
            $this->db->prepare($sql)->execute([$_SESSION['user_id']]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    /**
     * táto funkcia slúži na násilne zmazanie používateľa,
     * je prístupná len administrátorovi (používateľovi s rankom 0)
     *
     * @param $name
     * @return bool
     */
    function deleteUser($name)
    {
        try {
            $sql = 'DELETE from users where name = ?';
            $this->db->prepare($sql)->execute([$name]);

            $stmt = $this->db->prepare("SELECT user_id from users WHERE name = " . $name);
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