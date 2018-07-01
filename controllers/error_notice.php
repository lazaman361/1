<?php

class Error_Notice extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

    public function login(){
        $this->view->js = array('login/js/default.js'); // Always copied from controllers/login.php
        $this->view->render('header');
        $this->view->render('error/login');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

    public function registrationAlphanum(){
        $this->view->js = array('registration/js/default.js'); // Always copied from controllers/registration.php
        $this->view->render('header');
        $this->view->render('error/registration_alphanum');
        $this->view->render('registration/index');
        $this->view->render('footer');
    }

    public function registrationExists(){
        $this->view->js = array('registration/js/default.js'); // Always copied from controllers/registration.php
        $this->view->render('header');
        $this->view->render('error/registration_exists');
        $this->view->render('registration/index');
        $this->view->render('footer');
    }

}