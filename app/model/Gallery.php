<?php

class Gallery extends Model {
   public $id_gallery, $gal_image;

   /*public static function getFromSlug( $slug ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM gallery WHERE slug = :slug";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();

   }*/

   public static function getMemes() {
      $db = Database::getInstance();
      $sql = "SELECT gal_image FROM gallery
              order by rand()";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();


   }

   public static function getUploads() {
        $uploaded = time() . basename($_FILES["fileToUpload"]["name"]);
        $db = Database::getInstance();
        $sql = "INSERT INTO meme_genere (mem_image) VALUES (:nom)";        
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':nom', $uploaded, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        
        
        }
        
}