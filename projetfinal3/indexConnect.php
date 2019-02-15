<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
    </head>
    <body>
        <?php $title = "connecté"?>
        <?php ob_start();?> 
            <div class="container"> 
                <div class="row"> 
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4"> 
                            <h1>connexion aux blog de Béa</h1>
                            <p class="intro"> 
                            <br /> Bonjour veuillez vous connecter: </p> 
                                <form action="index.php?action=logMember" method="post" >
                                    <div class="form-group"> <label for="name">nom</label> 
                                        <input type="text" name="pseudo" required class="form-control" id="name" placeholder="name"> <br><br>
                                    </div> 
                                    <div class="form-group"> <label for="password">mot de passe</label> 
                                        <input type="password" name="password" required class="form-control" id="InputPassword" placeholder="Password"> 
                                    </div> 
                                        <button type="submit" class="btn btn-primary" name="submit" value="envoyer">envoyer</button> 
                    </div>
                   
                   
                    
                </div>
            </div>
        <?php $content = ob_get_clean(); ?>
        <?php require('view/template.php'); ?>
    </body>
</html>

       
