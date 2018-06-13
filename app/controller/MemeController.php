<?php

/* class MemeController extends Controller {
   public function display() {
    $slug = $this->route["params"]["slug"];
     $film = Film::getFromSlug($slug);
    $meme = Gallery::getMemes($meme['id_gallery']);
    
        
      require_once 'vendor/autoload.php';

        $loader = new Twig_Loader_Filesystem('app/view');
        $twig = new Twig_Environment($loader, array(
            'cache' => false
        ));

        $template = $twig->loadTemplate('/Meme/display.html.twig');
        echo $template->render(array(
            'meme'  => $meme            
        ));
   }
   
} */