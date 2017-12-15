<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription plat</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>

    <div class="container">
      <div class="envoiOk">
        <p class="textEnvoiOk">
    <?php
    require_once('config/connexion.php');


    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['imgPlat']) AND $_FILES['imgPlat']['error'] == 0)
    {
      // Testons si le fichier n'est pas trop gros
      if ($_FILES['imgPlat']['size'] <= 1000000)
      {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['imgPlat']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
          // On peut valider le fichier et le stocker définitivement
          move_uploaded_file($_FILES['imgPlat']['tmp_name'], 'uploads/' . basename($_FILES['imgPlat']['name']));
          echo 'Le repas a bien été créé !';
        }
      }
    }


    $nomPlat = htmlspecialchars($_POST['nomPlat']);
    $prixPlat = htmlspecialchars($_POST['prixPlat']);
    $imgPlat = 'uploads/' .basename($_FILES['imgPlat']['name']);

    $req = $bdd->prepare('INSERT INTO plat(nom, prix, image) VALUES(:nom, :prix, :image)');
    $req->execute(array(
    	'nom' => $nomPlat,
    	'prix' => $prixPlat,
    	'image' => $imgPlat,
    	));
    $req->closeCursor();

  ?>
        </p>
        <a href="listePlat.php"> Voir les plats</a>
      </div>
    </div>
  </body>
</html>
