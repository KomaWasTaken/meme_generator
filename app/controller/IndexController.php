<?php

class IndexController extends Controller {
   
   public function display() {
      $films = Film::getList();
      //$this->view->display();

      require_once 'vendor/autoload.php';

        $loader = new Twig_Loader_Filesystem('app/view');
        $twig = new Twig_Environment($loader, array(
            'cache' => false
        ));

        $template = $twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            'films'  => $films
        ));

   }

}
