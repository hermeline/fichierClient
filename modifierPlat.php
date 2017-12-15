<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifiez votre plat</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container list">
      <h1>Modifiez votre plat :</h1>

          <form class="ajoutPlat" action="traitementModif.php?id=<?php echo $_GET['id']; ?>" method="post">

            <label for="nomPlat">Entrez le nouveau nom du plat :</label>
            <input type="text" name="nomPlat" value=""> </br>

            <label for="prixPlat">Prix du plat :</label>
            <input type="text" name="prixPlat" value=""> <span> € </span>

            <input type="submit" name="envoiModif" value="Envoyer mes modifications">
          </form>


          </div>
  </body>
</html>
