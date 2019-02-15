<?php $title = 'Black out à San Ftrancisco'; ?>

<?php if(isset($_SESSION['pseudo'])){
    ?> 
<a href="index.php?action=destroy"><button type="button" class="">deconnexion</button></a>
<?php
}
?>
<?php if (!isset($_SESSION ['pseudo'])) 
//bouton pour ce deconnecter

{
    ?>
    <!--pour mettre le login-->
    <form action='index.php?action=admumber' method='post'>

	<fieldset> 
            <legend> Formulaire de création de compte</legend>
                        </br>
                <label for="nom">  quel est votre pseudo ? </label>
                <input  type="text"  name="pseudo"  id="pseudo"  placeholder="pseudo"/> </br>
                        </br>
                <label for="password">  quel est votre mot de passe ? </label>
                <input type="password" name="password" placeholder="mot de passe"/>
                        </br>
                <label for="password">  Confirmation de votre mot de passe ? </label>
                <input type="password" name="passwordconfirm" placeholder="mot de passe"/>     
                        </br>
                <input type="submit" value="Valider" />      
    </fieldset>

    <form action='indexConnect.php?action=adconnect' method='post'>
    <a href="IndexConnect.php?action=connexion"><button type="button" class="">Connexion</button></a>
    <?php
} else 
    {
        echo 'bienvenue '.$_SESSION['pseudo'][1];
    } 
   
   
    ?>
    <?php ob_start(); ?>
        <h1> Chapitre en ligne de Béa</h1>
            <p>Voici les derniers chapitres présentés qui ne demandent qu'a être commenté</p>
<?php
while ($donnees = $req->fetch()) 
{
    ?>

    <div class="news">
        <h3>
            <?=htmlspecialchars($donnees['title']); ?>
            <em> le <?=$donnees['creation_date_fr']; ?></em>
        </h3>

            <p>
                <?php
                    echo nl2br(htmlspecialchars($donnees['content'])); ?>
                    <br/>
                 <em><a href="index.php?action=post&chapter=<?=$donnees['id'];
                ?>  ">Les commentaires des lecteurs</a></em>
            </p>

    </div>
    <?php
}
        $req->closeCursor();
    ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>

