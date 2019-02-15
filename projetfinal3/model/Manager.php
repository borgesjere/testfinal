<?php
class Manager
{
    protected function dbconnect()
    {
        {
            try {
                $bdd = new PDO('pgsql:host=localhost;port=5433;dbname=projetfinal', 'postgres', 'adminkercode', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                return $bdd;
            } catch (Exception $e) 
            {
                die('Erreur : '.$e->getMessage());
            }
        }
    }
}