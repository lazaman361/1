<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Tries to login the user and returns the data.
     * @return Object|Bool
     */
    public function run(){

        $username = $_POST['login'];
        $password = $_POST['password'];

        // Regular expressions allowed characters: a-z, 0-9
        $usernameCheck = preg_match(/** @lang RegExp */'/^[a-zA-Z0-9]+$/',$username);
        if(!$usernameCheck) {
            return false;
        }

        $password = hash('sha256',$password);
        $sth = $this->db->prepare("SELECT * FROM user WHERE BINARY username = ? AND password = ?");
        $sth->bindValue(1,$username);
        $sth->bindValue(2,$password);
        $sth->execute();

        $data = $sth->fetchObject('login_Model');
        $count =  $sth->rowCount();

        if ($count > 0) {
            return $data;
        } else {
            return false;
        }

    }


}