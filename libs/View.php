<?php

class View {

     /**
     * Renders the given page in folder "views".
     * @param $name String part of the absolute path.
     */
    public function render($name){
        require 'views/' . $name . '.php';
    }

}