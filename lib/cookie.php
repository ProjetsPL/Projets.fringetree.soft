<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */


class Cookie {

    function __construct() {

    }

    function __get($key) {
        return isset($_COOKIE[$key]) ?  $_COOKIE[$key] : NULL;
    }


}
