<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifiez votre menu</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container list">
      <h1>Modifiez votre menu :</h1>
          <form class="ajoutPlat" action="traitementModif.php?id=<?php echo $_GET['id']; ?>" method="post">

            <label for="nomMenu">Entrez le nouveau nom du menu :</label>
            <input type="text" name="nomMenu" value=""> </br>

            <label for="prixMenu">Prix du menu :</label>
            <input type="text" name="prixMenu" value=""> <span> € </span>

            <input type="submit" name="envoiModif" value="Envoyer mes modifications">
          </form>


          </div>
  </body>
</html>
