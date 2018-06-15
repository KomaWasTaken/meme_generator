<?php

class IndexController extends Controller {

    public function UploadMemes(){

    $target_dir = "uploads/";
   
    $uploadOk = 1;
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
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
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
    
    /* header("Content-Type: image/png");
    $im = @imagecreate(110, 20)
        or die("Impossible d'initialiser la bibliothèque GD");
    $background_color = imagecolorallocate($im, 0, 0, 0);
    $text_color = imagecolorallocate($im, 233, 14, 91);
    imagestring($im, 1, 5, 5,  "A Simple Text String", $text_color);
    imagepng($im);
    imagedestroy($im);
    
    print_r($_FILES['fileToUpload']['name']);  */
    
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
