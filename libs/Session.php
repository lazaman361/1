<?php

class Session {

    /**
     * Starts the session.
     */
    public static function init()
    {
        @session_start();
    }

    /**
     * Sets a session pair key->value.
     * @param string $key Session key.
     * @param string $value Session value.
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Gets the session variable
     * @param String $key Check if this variable exists.
     * @return String|bool
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }

    /**
     * Destroys a session by combining "unset" and session_destroy.
     */
    public static function destroy()
    {
        $_SESSION = [];
        session_destroy();
    }

}