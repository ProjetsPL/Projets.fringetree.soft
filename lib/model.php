<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */

abstract class Model {

    public $session;
    public $message;

    public function __construct() {
        include_once 'configs/sql.php';

        $this->session = new Barmat_Session();
        $this->message = new Message();


        // set default language
        if(!$this->session->exists('language')) {
            $this->session->language = 'pl';
            $this->session->language_id = 1;
        }
    }


}
