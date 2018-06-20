<?php

class Model {
public static function createImages(){
$target_dir = "uploads/";


$imageFileType = array('png','jpg','jpeg','PNG','JPG','JPEG');
if(isset($_FILES["fileToUpload"]))  {      

    $filename = $_FILES["fileToUpload"]['name'];    
    $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]); /* Renvoie le nom du fichier avec l'heure d'upload */
    

    $pos = strrpos($filename, '.'); //Récupère la première apparition d'un "." dans $filename
    $ext = substr($filename, $pos+1); //Avance d'1 dans la chaîne de caractère pour récupérer ce qu'il y a après le "." (extension)
    if(in_array($ext, $imageFileType)){

        $arrayJpg=array('jpeg','JPEG','jpg','JPG');
        $arrayPng=array('png','PNG');

        if(in_array($ext,$arrayJpg)){
            $image = imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
            imagejpeg($image, $target_file);
        }elseif(in_array($ext,$arrayPng)){
            $image = imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]);
            imagepng($image, $target_file);
        }
        
        $image_width=imagesx($image);
        $image_height=imagesy($image);
            //Rotation du texte
        $rotation = 0;
        //Margin
        $top_margin = 60;
        //Récupère les valeurs des blocs où on écrit
        $text_top = strtoupper($_POST['text-top']);
        $text_bot = strtoupper($_POST['text-bottom']);
        $font = 'impact.ttf';
        $font_size = 30;
        $text_bound_top = imageftbbox($font_size, $rotation, $font, $text_top);
        $text_bound_bot = imageftbbox($font_size, $rotation, $font, $text_bot);
    //Récupère les coordonnées des 4 coins du rectangle en X et Y
        //top
        $lower_left_x_top =  $text_bound_top[0]; 
        $lower_left_y_top =  $text_bound_top[1];
        $lower_right_x_top = $text_bound_top[2];
        $lower_right_y_top = $text_bound_top[3];
        $upper_right_x_top = $text_bound_top[4];
        $upper_right_y_top = $text_bound_top[5];
        $upper_left_x_top =  $text_bound_top[6];
        $upper_left_y_top =  $text_bound_top[7];

        //bot
        $lower_left_x_bot =  $text_bound_bot[0]; 
        $lower_left_y_bot =  $text_bound_bot[1];
        $lower_right_x_bot = $text_bound_bot[2];
        $lower_right_y_bot = $text_bound_bot[3];
        $upper_right_x_bot = $text_bound_bot[4];
        $upper_right_y_bot = $text_bound_bot[5];
        $upper_left_x_bot =  $text_bound_bot[6];
        $upper_left_y_bot =  $text_bound_bot[7];

        //Création du texte
        //Récupère la largeur du texte et sa hauteur
        //top
        $text_width_top =  $lower_right_x_top - $lower_left_x_top;
        $text_height_top = $lower_left_y_top - $upper_left_y_top; 

        //bot
        $text_width_bot =  $lower_right_x_bot - $lower_left_x_bot;
        $text_height_bot = $lower_left_y_bot - $upper_left_y_bot;
        $start_end_offset = $image_height - 20; //Place le texte en bas - 20px de la hauteur de l'image.

            //Récupère la position ou le texte sera centré.
        $start_x_offset_top = ($image_width - $text_width_top) / 2; //Centre Horizontalement le texte.
        $start_y_offset_top = (($text_height_top) / 2) + 20; //Centre verticalement le texte.

        $start_x_offset_bot = ($image_width - $text_width_bot) / 2; //Centre Horizontalement le texte.
        $start_y_offset_bot = $start_end_offset; //Centre verticalement le texte.



        if(isset($_POST["submit"]))
        
            {
                
                $white = imagecolorallocate($image, 255, 255, 255);
                imagettftext($image, 25, 0, $start_x_offset_top, $start_y_offset_top, $white, $font, $text_top);
                imagettftext($image, 25, 0, $start_x_offset_bot, $start_y_offset_bot, $white, $font, $text_bot);
                imagejpeg($image, $target_file);
                imagepng($image, $target_file);
                imagedestroy($image); 

            }
            
            
        }

    }
}
}