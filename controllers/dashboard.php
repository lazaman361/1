<?php

class Dashboard extends Controller {

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

    public function index(){
        $this->view->render('header');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }
}