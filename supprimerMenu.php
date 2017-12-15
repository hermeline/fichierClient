<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Supprimer un plat</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>

    <div class="container">
      <div class="envoiOk">
        <p class="textEnvoiOk">
    <?php
    try{
        require_once('config/connexion.php');

        $id= $_GET['id'];  // On récupère l'id du menu

        $req = $bdd->prepare('DELETE FROM menu WHERE id = :id');
        $req->execute(array(
        	'id' => $id,
        	));

        echo "Le menu a bien été supprimé !";
        $req->closeCursor();
    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
      echo "Le menu n'a pas été supprimé, merci de rééssayer :)";
    }

  ?>
        </p>
        <a href="index.php"> Retour à l'accueil</a>
      </div>
    </div>
  </body>
</html>
