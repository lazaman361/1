<?php

class Controller {

    public $view;
    public $model;

    public function __construct() {
        $this->view = new View();
    }

    /**
     * Loads the corresponding model.
     *
     * @param string $name Name of the model.
     * @param string $modelPath Location of the models.
     */
    public function loadModel($name, $modelPath = 'models/'){

        $path = $modelPath . $name . '_model.php';

        if(file_exists($path)){
            require $path;

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

}