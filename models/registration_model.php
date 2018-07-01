<?php

class Registration_Model extends Model {


    public function __construct() {
        parent::__construct();
    }

    /**
     * Tries to register the user and returns the data in form of array[bool,string].
     * @return array
     */
    public function register(){

        $username = trim($_POST['username']);
        $password = hash('sha256',$_POST['password']);

        // Regular expressions allowed characters: a-z, 0-9
        $usernameCheck = preg_match(/** @lang RegExp */'/^[a-zA-Z0-9]+$/',$username);
        if(!$usernameCheck) {
            return [
                'status'=>false,
                'info'=>'Alphanumerical error'
            ];
        }

        // Check if user already exists.
        $sth = $this->db->prepare("SELECT * FROM user WHERE BINARY username = ?");
        $sth->bindValue(1,$username);
        $sth->execute();
        $count =  $sth->rowCount();

        if ($count >= 1) {
            return [
                'status'=>false,
                'info'=>'User already exists'
            ];
        }

        // If everything is alright, insert into database and return "true array".
        $sth = $this->db->prepare("INSERT INTO user (username,password) VALUES (?,?)");
        $sth->bindValue(1,$username);
        $sth->bindValue(2,$password);
        $sth->execute();

        return [
            'status'=>true,
            'info'=>''
        ];

    }

    /**
     * Checks if user exist and returns: true if exist, false otherwise.
     * @param String @username Check if this username exists.
     * @return bool
     */
    public function ajaxCheck($username){

        $sth = $this->db->prepare("SELECT * FROM user WHERE BINARY username = ?");
        $sth->bindValue(1,$username);
        $sth->execute();
        $count =  $sth->rowCount();

        if ($count >= 1) {
            return true;
        }else{
            return false;
        }

    }

}