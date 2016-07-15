<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */

class Application
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    function __construct()
    {
        ob_start();
        $url = $this->parse_url();

        if (!isset($url)) {
          $this->load_home_controller();
          return true;
        }

        $file = 'app/controllers/' . $url[0] . '_controller.php';

        if(!file_exists($file))
        {
          $this->load_home_controller();
          return true;
        }

        require_once $file;

        $this->controller = new $url[0] . 'Controller';
        unset($url[0]);

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? $url : [];
        call_user_func_array([$this->controller, $this->method], $this->params);

        ob_end_flush();
    }

    private function parse_url()
    {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

    private function load_home_controller() {
      require 'app/controllers/home_controller.php';
      $this->controller = new HomeController();
      $this->controller->{$this->method}();
    }
}
