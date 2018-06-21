<?php

class IndexController extends Controller {

    public function display() {
        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        $upload = '';
    
    
        if(isset($_FILES["fileToUpload"]))  {      
            $uploadOk = 1;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
                    if($check !== false) {
                        /* echo "File is an image - " . $check["mime"] . "."; */
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

                $allowed = array('png','jpg','jpeg','PNG','JPG','JPEG');
                $nomImage = $_FILES['fileToUpload']['name'];
                $ext = pathinfo($nomImage, PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed) ){
                    echo "Merci de choisir une image au format .jpg ou .png";
                    
                }

                
    
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Désolé, votre image n'a pas été uploadée";
                // if everything is ok, try to upload file
                }
                
            }
        

        

        $memes = Gallery::getMemes();        
        $displayUrl = Gallery::displayUrl();


        echo $template->render(array(
            'memes'  => $memes,
            'url' => $displayUrl,
            'upload' => $upload
        ));

   }

}
