<?php

class View {

  public function __construct() {

  }

  public static function general($name, $data) {
    $haml = new MtHaml\Environment('php', array('enable_escaper' => false));
    $executor = new MtHaml\Support\Php\Executor($haml, array(
        'cache' => sys_get_temp_dir().'/haml',
    ));

    $executor->display($name, $data);
  }

  public static function partial($name, $data) {
    $haml = new MtHaml\Environment('php', array('enable_escaper' => false));
    $executor = new MtHaml\Support\Php\Executor($haml, array(
        'cache' => sys_get_temp_dir().'/haml',
    ));

    $file = 'app/views/' . $name . '.haml';

    if(file_exists($file)) {
      $executor->display($file, $data);
    } else {
      echo 'Can not load view ' . $name .', on path: '.$file;
    }
  }

  public function render($filename, $data, $layout = "application") {

    $haml = new MtHaml\Environment('php', array('enable_escaper' => false));
    $executor = new MtHaml\Support\Php\Executor($haml, array(
        'cache' => sys_get_temp_dir().'/haml',
    ));


    // rendered view
    $file = 'app/views/' . $filename . '.haml';
    $layout = 'app/views/layouts/' . $layout . '.haml';

    if(file_exists($file) && file_exists($layout)) {
      $executor->display($layout, array(
        "view" => $file,
        "data" => $data->getArray())
      );

    } else {
      echo 'Can not load view ' . $filename .', on path: '.$file;
    }
  }

}
