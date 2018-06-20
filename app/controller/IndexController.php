<?php

class IndexController extends Controller {

    public function display() {

    
    
        if(isset($_FILES["fileToUpload"]))  {      
            $uploadOk = 1;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                        $upload = Gallery::getUploads();
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
    
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                }         
            }
            
        

        $memes = Gallery::getMemes();        
        $displayUrl = Gallery::displayUrl();

        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            'memes'  => $memes,
            'url' => $displayUrl,
            'upload' => $upload
        ));

   }

}
