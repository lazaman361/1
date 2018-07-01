<?php

class Lau extends Controller {

    public function __construct() {

        parent::__construct();

        // Check if user is logged in, and redirect to Login page if not logged in.
        Session::init();
        @$logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            Redirect::url(URL . 'login');
            exit;
        }

    }

    /**
     * Creates a page where all users are listed, i.e. echoed in a table.
     */
    public function index(){
        $this->view->render('header');
        $this->view->render('lau/index');
        $this->createTable();
        $this->view->render('footer');
    }

    /**
     * Echoes the result table, but only privately for index function.
     */
    private function createTable(){

        $i = 1; // Must be 1, so the table always starts from 1. Doesn't matter if it's ASC or DESC.
        $data = $this->fetchAllUsersByDate();
        echo "<table>";
        echo "<tr><th>ID</th>";
        echo "<th>Username</th></tr>";
        foreach ($data as $array){
            echo "<tr><td>$i</td>";
            echo "<td>$array[username]</td></tr>";
            $i++;
        }
        echo "</table>";

    }

    /**
     * Returns the user table (user_id,username) as an array.
     * @return array
     */
    private function fetchAllUsersByDate(){
        return $this->model->fetchAllUsersByDate();
    }
}
