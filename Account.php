<?php

session_start();

class Account extends Storage
{
    private $name;
    private $password;
    private $email;

    function register($name, $password, $email)
    {
        try {
            $pass = password_hash($password,PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (name, password, email) value (?, ?, ?)';
            $this->db->prepare($sql)->execute([$name, $pass, $email]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
        $this->login($name,$password);


    }

    function checkEmail($email)
    {
        if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email))
        {
            return true;
        } else {
            return false;
        }

    }

    function checkPassword($password)
    {
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
        print("MENO JE TAKETO");
        print($name);
        print("HESLO JE TAKETO");
        print($password);

        $pass = password_hash($password,PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("SELECT user_id, password from users where name = '" . $name  ."'");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        if ($stmt->rowCount() == 0)
        {
            print("zleMeno");
            return false;
        }
        else
        {
            print("idema na result");
            print($result);
            print("koncime result");
        }

        while ($row = $stmt->fetch()) {

            $id = $row[0];
            $hash = $row[1];
        }

//        $stmt = $this->db->prepare("SELECT user_id from users where name = '" . $name  ."'");
//        $stmt->execute();
//
//        $result2 = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        if ($stmt->rowCount() == 0)
//        {
//            print("zleMeno2");
//            return false;
//        }

        print("vysledky:");
        print($id);
        print($hash);

        print("PRIHLásili sme sa!!!!!!!!");

        if(password_verify($password, $hash))
        {
            $_SESSION['user_id'] = $id;
            $_SESSION['loggedIn'] = true;

            print("verifikované!");
        }

        return true;
    }

    function logout()
    {
        unset($_SESSION["user_id"]);
        unset($_SESSION["loggedIn"]);
        session_destroy();
    }

    function changeName($name)
    {
        $sql = 'UPDATE users SET name = ? WHERE user_id = ?';
        $this->db->prepare($sql)->execute([$name, $_SESSION['user_id']]);
    }

    function changePassword($password)
    {
        $pass = password_hash($password,PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET password = ? WHERE user_id = ?';
        $this->db->prepare($sql)->execute([$pass, $_SESSION['user_id']]);
    }

    function changeEmail($email)
    {
        $sql = 'UPDATE users SET email = ? WHERE user_id = ?';
        $this->db->prepare($sql)->execute([$email, $_SESSION['user_id']]);
    }

    function deleteMe()
    {
        try {
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

//    function setName()
//    {
//
//    }
//
//    function setPassword()
//    {
//
//    }
//
//    function setEmail()
//    {
//
//    }

//    /**
//     * @return mixed
//     */
//    public function getName()
//    {
//        return $this->db->query('SELECT name from users where user_id = ' . $this->user_id);
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPassword()
//    {
//        return $this->db->query('SELECT password from users where user_id = ' . $this->user_id);
//
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getEmail()
//    {
//        return $this->db->query('SELECT email from users where user_id = ' . $this->user_id);
//
//    }


}


//session_start();
//
//class Account extends Storage
//{
//    private $name;
//    private $password;
//    private $email;
//
//    function register($name, $password, $email)
//    {
//        try {
//            $pass = password_hash($password, PASSWORD_DEFAULT);
//            $sql = 'INSERT INTO users (name, password, email) value (?, ?, ?)';
//            $this->db->prepare($sql)->execute([$name, $pass, $email]);
//        } catch (PDOException $e) {
//            echo 'Connection failer: ' . $e->getMessage();
//        }
//        $this->login($name, $password);
//
//
//    }
//
//    function control($email)
//    {
//        if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
//            return true;
//        } else {
//            return false;
//        }
//
//    }
//
//    function login($name, $password)
//    {
//        $pass = password_hash($password, PASSWORD_DEFAULT);
//        $stmt = $this->db->prepare("SELECT user_id, password from users where name = '" . $name . "'");
//        $stmt->execute();
//
//        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
//        if ($stmt->rowCount() == 0) {
//            print("zleMeno");
//            return false;
//        } else {
//            print("idema na result");
//            print($result);
//            print("koncime result");
//        }
//
//        while ($row = $stmt->fetch()) {
//
//            $id = $row[0];
//            $hash = $row[1];
//        }
//
////        $stmt = $this->db->prepare("SELECT user_id from users where name = '" . $name  ."'");
////        $stmt->execute();
////
////        $result2 = $stmt->setFetchMode(PDO::FETCH_ASSOC);
////        if ($stmt->rowCount() == 0)
////        {
////            print("zleMeno2");
////            return false;
////        }
//
//        print("vysledky:");
//        print($id);
//        print($hash);
//
//        if (password_verify($password, $hash)) {
//            $_SESSION['user_id'] = $id;
//            $_SESSION['loggedIn'] = true;
//        }
//
//
//        return true;
//    }
//
//    function logout()
//    {
//        unset($_SESSION["user_id"]);
//        unset($_SESSION["loggedIn"]);
//        session_destroy();
//    }
//
//    function changeMyData($name, $password, $email)
//    {
//        try {
//            $sql = 'UPDATE users SET name = ?, password = ?, email = ? WHERE user_id = ?';
//            $this->db->prepare($sql)->execute([$name, $password, $email, $_SESSION['user_id']]);
//        } catch (PDOException $e) {
//            echo 'Connection failer: ' . $e->getMessage();
//        }
//    }
//
//    function addJokes($title, $text)
//    {
//        print("som vo vnútri metódy");
//
//        try {
//            $sql = 'INSERT into jokes(user_id, likes, joke, title) value(?,?,?,?)';
//            $this->db->prepare($sql)->execute([$_SESSION['user_id'], 0, $text, $title]);
//            print("spravil bez chyby");
//        } catch (PDOException $e) {
//            echo 'Connection failer: ' . $e->getMessage();
//        }
//    }
//
//    function deleteMe()
//    {
//        try {
//            $sql = 'DELETE from users where user_id = ?';
//            $this->db->prepare($sql)->execute([$_SESSION['user_id']]);
//        } catch (PDOException $e) {
//            echo 'Connection failer: ' . $e->getMessage();
//        }
//
//        $_SESSION = array();
//
//        if (ini_get("session.use_cookies")) {
//            $params = session_get_cookie_params();
//            setcookie(session_name(), '', time() - 42000,
//                $params["path"], $params["domain"],
//                $params["secure"], $params["httponly"]
//            );
//        }
//        session_destroy();
//    }
//
////    function setName()
////    {
////
////    }
////
////    function setPassword()
////    {
////
////    }
////
////    function setEmail()
////    {
////
////    }
//
//    /**
//     * @return mixed
//     */
//    public function getName()
//    {
//        return $this->db->query('SELECT name from users where user_id = ' . $this->user_id);
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPassword()
//    {
//        return $this->db->query('SELECT password from users where user_id = ' . $this->user_id);
//
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getEmail()
//    {
//        return $this->db->query('SELECT email from users where user_id = ' . $this->user_id);
//
//    }
//
//
//}