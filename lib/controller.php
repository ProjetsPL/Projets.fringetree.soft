<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */
 
abstract class Controller {

    protected $view;
    protected $data;
    protected $message;

    function __construct() {
      Session::init();
      $this->view = new View();
      $this->data = new Data();
      $this->message = Message::getInstance();
      $this->user = User::getInstance();
      $this->data->message = $this->message->get_message_from_url();

      $this->data->user = $this->user;
    }

    abstract function index();

    public function is_ajax() {
      return (filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH') === 'xmlhttprequest');
    }
}
