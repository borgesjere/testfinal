<?php
    require_once("model/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

        //il faut la combiner avec createcount

 class MemberManager extends Manager
    {  
    
        //je recupere pseudo et mot de pass en vue de l'envoyer dans la bdd
     public function getcount($pseudo, $password)
        {
            $bdd = $this->dbconnect();
            $createCount =$bdd->prepare( 'INSERT INTO mumber(pseudo,password,id_level )VALUES(?,?,?)');
            $createCount->execute(array($pseudo,$password,1));
            return $createCount;
        }
     public function verifMember($pseudo)
        {
            $bdd=$this->dbConnect();
            $verifUser= $bdd->prepare('SELECT id, pseudo, password, id_Level FROM mumber WHERE pseudo =?');
            $verifUser->execute(array($pseudo));
            $member=$verifUser->fetch();
            return $member;
        }
    }
