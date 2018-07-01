<?php

class Redirect {

    /**
     * Redirects to wanted page via JavaScript.
     * @param String $url Wanted URL.
     */
    public static function url($url){

        $string = '<script>';
        $string .= 'window.location = "' . $url . '"';
        $string .= '</script>';

        echo $string;

    }

}