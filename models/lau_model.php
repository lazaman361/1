<?php

class Lau_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Lists all users by ascending date (date of registration).
     * @return array
     */
    public function fetchAllUsersByDate(){

        $sth = $this->db->prepare("SELECT user_id,username,reg_date FROM user ORDER BY reg_date ASC");
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }


}