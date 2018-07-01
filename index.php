<?php

require 'config.php';

function __autoload($class){
    require "libs/$class" . ".php";
}

$start = new Bootstrap();
$start->init();