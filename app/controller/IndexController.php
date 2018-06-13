<?php

class IndexController extends Controller {
   
   public function display() {
      $memes = Gallery::getMemes();


        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            'memes'  => $memes
        ));

   }

}
