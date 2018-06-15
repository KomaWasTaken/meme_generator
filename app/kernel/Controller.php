<?php

require_once 'vendor/autoload.php';


class Controller {
    protected $route;
    protected $view;
   
   public function __construct( $route ) {
        $this->route = $route;
        $this->view = new View( $route );

        $this->loader = new Twig_Loader_Filesystem('app/view');
        $this->twig = new Twig_Environment($this->loader, array(
        'cache' => false
    ));
   }

}
