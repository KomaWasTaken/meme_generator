<?php

class Film extends Model {
   public $id_film, $fil_titre, $fil_annee, $fil_affiche;

   public static function getFromSlug( $slug ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM film WHERE slug = :slug";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
/*       $real = "SELECT * FROM film AS f INNER JOIN realisateur AS r INNER JOIN film_has_realisateur AS h ON h.id_film = f.id_film AND h.id_realisateur = r.id_realisateur";
 */      
   }

   public static function getList() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM film
              order by rand()  
              limit 3";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();


   }

   public static function getRealisateurFromFilm($id_film){
        $db = Database::getInstance();
        $sql = "SELECT * FROM realisateur AS r 
                INNER JOIN film_has_realisateur AS h 
                where h.id_film = :id_film
                and r.id_realisateur = h.id_realisateur";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':id_film', $id_film, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();  
   }
   public static function getGenresFromFilm($id_film){
        $db = Database::getInstance();
        $sql = "SELECT * FROM genre AS g 
                INNER JOIN genre_has_film AS gh 
                where gh.id_film = :id_film
                and g.id_genre = gh.id_genre";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':id_film', $id_film, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();  
   }

}
