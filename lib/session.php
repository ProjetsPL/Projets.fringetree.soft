<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */

class Session {

    static function init() {
        session_start();
    }

    static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }


    static function get_all() {
        return $_SESSION;
    }

    static function get_once($key) {
        $value = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $value;
    }

    static function exists($key) {
        return isset($_SESSION[$key]);
    }

    static function destroy($key) {
        unset($_SESSION[$key]);
    }
}
