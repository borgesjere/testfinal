<?php $title = 'commentaire'; ?>

<?php ob_start(); ?>
        <h1> commentaire des chapitres du LIVRE de BEA</h1>
        <p><a href="index.php">Retour des commentaires des sujets de béa</a></p>
 <?php
        // Connexion à la base de données
        $id_post=0;
        while ($donnees = $post->fetch()) 
    {
        $id_post=$donnees['id']; 
?>
        <div class="news">
            <h3>
                <?php   echo htmlspecialchars($donnees['title']); ?>
                  <em>le <?=$donnees['creation_date_fr']; ?></em>
            </h3>
                 <p>
                <?php   echo nl2br(htmlspecialchars($donnees['content'])); ?>
                </p>
        </div>
<?php
    }
?>
    <h2>Commentaires</h2>

<?php
    $post->closeCursor(); // Important : on libère le curseur pour la prochaine requête

        // Récupération des commentaires
while ($donnees = $comments->fetch()) 
{
    ?>
    <p><strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> le <?php echo $donnees
    ['create_date_fr']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($donnees['content'])); ?></p>
    <?php
}       // Fin de la boucle des commentaires
$comments->closeCursor();
?>

<!-- ... -->
<?php if (isset($_SESSION ['pseudo'])) 
{
    ?>
    <h2>Commentaires2</h2>


    <form action="index.php?action=addComment&amp;id=<?= $id_post?>" method="post">
       
    
        <div>
            <label for="content">Commentaire</label><br />
            <textarea id="content" name="content"></textarea>
        </div>

        <div>
            <input type="submit" />
        </div>
    </form>
    <?php
}   ?>

<!-- ... -->
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
