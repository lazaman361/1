<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        // Constructor must be called because index function used to be reserved word for constructor.
        // This can be avoided by changing the name of index function below.
        // Parent constructor is called because we don't want to overwrite with present (empty) (child) constructor.
    }

    /**
     * Calls index page.
     */
    public function index(){
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }
}