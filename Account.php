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
            $sql = 'INSERT INTO users (name, password, email) value (?, ?, ?)';
            $this->db->prepare($sql)->execute([$name, $password, $email]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
        $this->login($name,$password);


    }

    function control($email)
    {
        if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email))
        {
            return true;
        } else {
            return false;
        }

    }

    function login($name, $password)
    {
        $stmt = $this->db->prepare("SELECT user_id from users where name = '" . $name  ."' and password = '" . $password . "'");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 0)
        {
            print("zle");
            return false;
        }
        $_SESSION['user_id'] = $result;
        $_SESSION['loggedIn'] = true;
        print("tuto to je");
        print $_SESSION['loggedIn'];
        print("tuto to je");


        return true;
    }

    function changeMyData($name, $password, $email)
    {
        try {
            $sql = 'UPDATE users SET name = ?, password = ?, email = ? WHERE user_id = ?';
            $this->db->prepare($sql)->execute([$name, $password, $email, $_SESSION['user_id']]);
        } catch (PDOException $e) {
            echo 'Connection failer: ' . $e->getMessage();
        }
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->db->query('SELECT name from users where user_id = ' . $this->user_id);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->db->query('SELECT password from users where user_id = ' . $this->user_id);

    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->db->query('SELECT email from users where user_id = ' . $this->user_id);

    }


}