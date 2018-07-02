<?php

class Bootstrap {

    private $_controller = null;

    /**
     * Starts the bootstrap
     *
     * @return void
     */
    public function init(){
        // Get the URL
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url);

        // Allowed characters: a-z, 0-9, /
        $urlCheck = preg_match(/** @lang RegExp */'/^[a-zA-Z0-9\/]*$/',$url);
        if(!$urlCheck){
            $this->_error();
        }

        $url = explode('/',$url);

        // http://localhost/controller/method/(param)/(param)/(param)
        // url[0] = Controller
        // url[1] = Method
        // url[2] = Param
        // url[3] = Param
        // url[4] = Param

        if(empty($url[0])){
            // Go to index page if no controllers/methods/parameters are provided.
            require 'controllers/index.php';
            $this->_controller = new Index();
            $this->_controller->index();
        }else{
            // Load a controller from url[0]
            $controllerPath = 'controllers/' . $url[0] . '.php';
            if(!file_exists($controllerPath)){
                $this->_error();
            }
            // Load a corresponding model from url[0]
            require $controllerPath;
            $this->_controller = new $url[0]();
            $this->_controller->loadModel($url[0]);

            $length = sizeof($url);
            if($length>=2){
                if(!method_exists($this->_controller,$url[1])){
                    $this->_error();
                }
            }

            // http://localhost/controller/method/(param)/(param)/(param)
            // url[0] = Controller
            // url[1] = Method
            // url[2] = Param
            // url[3] = Param
            // url[4] = Param

            switch ($length){
                case 5:
                    // Controller->Method(Param1, Param2, Param3)
                    $this->_controller->{$url[1]}($url[2],$url[3],$url[4]);
                    break;

                case 4:
                    // Controller->Method(Param1, Param2)
                    $this->_controller->{$url[1]}($url[2],$url[3]);
                    break;

                case 3:
                    // Controller->Method(Param1)
                    $this->_controller->{$url[1]}($url[2]);
                    break;

                case 2:
                    // Controller->Method()
                    $this->_controller->{$url[1]}();
                    break;

                default:
                    $this->_controller->index();
                    break;
            }
        }
    }

    /**
     * Error in URL, go to error index.
     */
    private function _error(){
        require 'controllers/error_notice.php';
        $this->_controller = new Error_Notice();
        $this->_controller->index();
        exit;
    }
}