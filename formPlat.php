<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire ajout d'un plat</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container">

        <h1>Ajouter un plat :</h1>

        <form class="ajoutPlat" action="postPlat.php" method="post" enctype="multipart/form-data">
              <label for="nomPlat">Entrez le nom du plat :</label>
              <input type="text" name="nomPlat" value=""> </br>

              <label for="prixPlat">Prix du plat :</label>
              <input type="text" name="prixPlat" value=""> <span> € </span>

              <label for="imgPlat">Téléchargez une photo du plat :</label>
              <input type="file" name="imgPlat" value="">

              <input type="submit" name="envoiPlat" value="Envoyer le plat">
        </form>
      </div>

  </body>
</html>
