<?php
 session_start();

require_once('controler/Controller.php');
$controller=new Controller;

class Index
{
    private $controller;
    public function __construct()
    {
        $this->controller =new controller();
    }
    public function run()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action']=='listPosts') {
                    $this->controller->listPosts();
                } elseif ($_GET['action']=='post') {
                    if (isset($_GET['chapter']) && $_GET['chapter']>0) {
                        $this->controller->post();
                    } else {
                        echo'erreur:aucun identifiant de chapitre envoyé';
                    }
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['content'])) {
                            $this->controller->addComment($_POST['content'], $_SESSION['pseudo'][0], $_GET['id']);
                        } else {
                            echo 'Erreur:il faut remplir les champs';
                        }
                    } else {
                        echo 'Erreur il faut au moins un article a envoyer';
                    }
                }
                 //creer un compte
                elseif ($_GET['action'] == 'admumber') {
                    if (isset($_POST['pseudo']) && isset($_POST['password'])&& isset($_POST['passwordconfirm'])) {
                        $_pseudo = htmlspecialchars($_POST['pseudo']);
                        $_password = htmlspecialchars($_POST['password']);
                        $_passwordconfirm = htmlspecialchars($_POST['passwordconfirm']);
                        //comparaison de mot de passe
                        if ($_password ==$_passwordconfirm) {
                            //haschage
                            $passHash =password_hash($_password, PASSWORD_DEFAULT);
                            $this->controller->addMember($_pseudo, $passHash);
                        } else {
                            echo ' Erreur , ce ne sont pas les mêmes mots de passe, rééssaye';
                        }
                        //$this->controller->post();
                    } else {
                        echo 'erreur:aucun pseudo et passeword na été envoyé';
                    }
                }
                //comparer connexion et la base de données  

                elseif ($_GET['action'] == 'connexion')
                {
                    $this->controller->listPosts();
                }
                elseif ($_GET['action'] == 'logMember'){ 
                    $this->controller->controlMember($_POST['pseudo'],$_POST['password']);
                }
                elseif ($_GET['action'] == 'destroy') {
                    //pour ce deconnecter
                    session_destroy();
                    header('Location: index.php');
      
                }
                elseif( $_GET['action'] == 'test'){
                    require 'view/viewTest.php';
                }
                else {
                    $this->controller->listPosts();
                    //fonction pour afficher tout les post
                }

            } 
            else { $this->controller->listPosts();}
    



            
        } catch (Exception $e) {
            die('erreur:'.$e->getMessage());
        }
 }

 
}
$index= new Index;
$index->run();
