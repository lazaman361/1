<?php

class Registration extends Controller {

    private $_controller = null;

    public function __construct() {
        parent::__construct();
        $this->view->js = array('registration/js/default.js'); // Always copy JS to "controllers/error_notice.php".
    }

    /**
     * Calls login page.
     */
    public function index(){
        $this->view->render('header');
        $this->view->render('registration/index');
        $this->view->render('footer');
    }

    /**
     * Informs new user of successful registration and next steps.
     */
    public function complete(){
        $this->view->render('header');
        $this->view->render('registration/complete');
        $this->view->render('footer');
    }

    /**
     * Registers a user.
     */
    public function register(){

        $registrationData = $this->model->register();

        if($registrationData['status'] == true){
            Redirect::url(URL . 'registration/complete');
        }else{
            $this->_error($registrationData['info']);
        }

    }

    /**
     * Checks if user exist and echoes the message to be picked up via AJAX.
     */
    public function ajaxCheck(){

        $username = $_POST['username'];
        $match = $this->model->ajaxCheck($username);

        if($match){
            echo "User already exists";
        }else{
            echo "";
        }
    }

    /**
     * Error in registration, sends the appropriate notice from "controllers/error_notice.php".
     */
    private function _error($errorType){

        require 'controllers/error_notice.php';
        $this->_controller = new Error_Notice();

        switch ($errorType){
            case 'Alphanumerical error':
                $this->_controller->registrationAlphanum();
                break;
            case 'User already exists':
                $this->_controller->registrationExists();
                break;
            default:
                $this->_controller->index();
        }
        exit;
    }

}