<?php

class Login extends Controller {

    private $_controller = null;

    public function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/default.js'); // Always copy JS to "controllers/error_notice.php".
    }

    /**
     * Calls login page.
     */
    public function index(){
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

    /**
     * Runs the login, and sets the session.
     */
    public function run(){
        $loginData = $this->model->run();

        if ($loginData != false) {
            // Set and regenerate session. Redirect to "Home tab".
            Session::init();
            session_regenerate_id(true);
            Session::set('loggedIn', true);
            Session::set('username', $loginData->username);
            Redirect::url(URL . 'dashboard');
        } else {
            $this->_error();
        }
    }

    /**
     * Error in login, sends the appropriate notice from "controllers/error_notice.php".
     */
    private function _error(){
        require 'controllers/error_notice.php';
        $this->_controller = new Error_Notice();
        $this->_controller->login();
        exit;
    }
}