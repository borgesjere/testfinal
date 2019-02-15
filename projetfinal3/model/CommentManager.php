<?php
    require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $bdd = $this->dbconnect();
        $comments = $bdd->prepare('SELECT to_char(create_date, \'DD/MM/YYYY HHhMImSSs\')AS create_date_fr, content, id_mumber, mumber.pseudo
        FROM content INNER JOIN mumber ON mumber.id = content.id_mumber WHERE id_chapter = ? ORDER BY create_date');
        $comments->execute(array($_GET['chapter']));
        return $comments;
    }
    public function postComment( $content,$id_mumber,$id_chapter)
    {
        $bdd = $this->dbconnect();
        $comments = $bdd->prepare('INSERT INTO content(create_date,content,id_chapter,id_mumber,alert)
        VALUES(now(),?,?,?,0)');
        $comments->execute(array(
        $content,$id_chapter, $id_mumber));
        return $comments;
    }
}