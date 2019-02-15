<?php

    require_once("model/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

 class PostManager extends Manager
 {
     public function getPosts()
     {
         // Connexion à la base de données
         $bdd = $this->dbconnect();
         $req = $bdd->query('SELECT id, title, content, to_char(creation_date, \'DD/MM/YYYY HHhMImSSs\' )
        AS creation_date_fr ,mumber FROM chapter ORDER BY creation_date DESC ');
         return $req;
     }
     //recupere tous les posts
     public function getPost()
     {
         $bdd =  $this->dbconnect();
         $post = $bdd->prepare('SELECT id, title, content, to_char(creation_date, \'DD/MM/YYYY HHhMImSSs\') AS creation_date_fr,mumber
         FROM chapter WHERE id = ?');
         $post->execute(array($_GET['chapter']));
         return $post;
     }
 }
