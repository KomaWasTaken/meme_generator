<?php

class IndexController extends Controller {

    public function UploadMemes(){

    $target_dir = "uploads/";
   
    $uploadOk = 1;
    
        
    if(isset($_POST["submit"])) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($imageFileType == "jpg" OR $imageFileType == "jpeg"){
            $jpg_image = imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
            $white = imagecolorallocate($jpg_image, 255, 255, 255);
            $font_path = 'arial.ttf';
            $text = $_POST['text-top'];
            imagettftext($jpg_image, 25, 0, 75, 300, $white, $font_path, $text);
            imagejpeg($jpg_image, $target_file);
            imagedestroy($jpg_image); 
            echo($_FILES["fileToUpload"]["name"]);
        }
        else if($imageFileType=="png"){
            $png_image = imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]);
            $white = imagecolorallocate($png_image, 255, 255, 255);
            $font_path = 'arial.ttf';
            $text = $_POST['text-top'];
            imagettftext($png_image, 25, 0, 75, 300, $white, $font_path, $text);
            imagepng($png_image, $target_file);
            imagedestroy($png_image); 
            echo($_FILES["fileToUpload"]["name"]); 
        }

        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     ) {
        echo "Sorry, only JPG, JPEG PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }         
    
}
    
}

    public function display() {
        $memes = Gallery::getMemes();
        $upload = IndexController::UploadMemes();

        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            'memes'  => $memes,
            'upload' => $upload
        ));

   }

}
