<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

class Controller
{
    private $commentManager;
    private $postManager;
    private $memberManager;

    public function __construct()
    {
        $this->commentManager= new commentManager();
        $this->postManager= new postManager();
        $this->memberManager= new MemberManager();
    }


    public function listPosts()
    {
        $req = $this->postManager->getPosts(); // Appel d'une fonction de cet objet
        require('view/accueil.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $memberManager = new memberManager();

        $post = $postManager->getPost($_GET['chapter']);
        $comments = $commentManager->getComments($_GET['chapter']);

        require('view/postview.php');
    }


    public function addComment($content, $id_mumber, $id_chapter)
    {
        $commentManager = new CommentManager();
        $comments =$commentManager->postComment($content, $id_mumber, $id_chapter);
   

        if ($comments === false) 
        {
            die('Impossible d\'ajouter le commentaire !');
        } else
        {
            header('Location: index.php?action=post&chapter=' .$id_chapter);
        }
    }

    //pour la connection
    public function addMember( $pseudo, $password)
    {
        $getcount =  $this->memberManager->getcount($pseudo, $password);
        header('Location: index.php');

    }
    //verifivation
    public function controlMember($pseudo,$password)
    {
        $pseudoverif=htmlspecialchars($pseudo);
        $passwordverif = htmlspecialchars($password);
        $verifMember=$this->memberManager->verifMember($pseudoverif);


        if ($verifMember==false)
        { 
             echo('Helo');
            // throw new Exception("erreur d'authentification"); 
        }
        else { 
                if (password_verify($passwordverif, $verifMember['password']))
                {
                    echo('Hello');
                    //$ echo 'Le mot de passe est valide !';TODO
                    $_SESSION['pseudo'] = $verifMember; 
            
                     header('Location: index.php'); 
                } 
                else 
                { 
                    echo('Helloyou');
                   // throw new Exception("erreur d'authentification");
                } 
            } 
    }
    
   
}
