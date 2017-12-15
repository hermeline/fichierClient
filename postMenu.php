<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Composez votre Menu</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container list">
      <h1>2eme étape : Ajoutez des plats</h1>
        <div class="resultat">

                  <?php
                  require_once 'config/connexion.php';
                  // Insertion en base du nom et du prix du menu dans la table menu
                  $req = $bdd->prepare('INSERT INTO menu(nom, prix) VALUES(:nom, :prix)');
                  $req->execute(array(
                    'nom' => $_POST['nomMenu'],
                    'prix' => $_POST['prixMenu'],
                  ));
                  $req->closeCursor();

                  $idDernierMenu = $bdd->lastInsertId();  // Récupération du dernier id entré en base -> donc id du menu
                  $idDernierMenu = intval($idDernierMenu);
                  // var_dump($idDernierMenu);
                  ?>

                  <form class="choixPlat" action="traitementMenu.php?id=<?php echo $idDernierMenu;// on met dans le lien l'id du dernier menu pour pouvroi le recup avec GET ?>" method="post">
                    <?php
                  $reponse = $bdd->query('SELECT * FROM plat'); // Récup des données de la table plat

                  // On affiche chaque plat un à un dans une checkbox grâce une boucle
                  while ($donnees = $reponse->fetch())
                  {
                    ?>

                        <div class="listePlat">
                            <input type="checkbox" name="checkbox[]" value="<?php echo $donnees['id']; ?>" id="choixPlat">
                                <label for="choixPlat">
                                    <h3> <?php echo $donnees['nom']; ?></h3>  <img class="imgChoix" src="<?php echo $donnees['image']; ?>" alt="image Plat">
                                </label>
                        </div>

                    <?php
                        }
                        $reponse->closeCursor();
                    ?>
                  <div class="btnMenu">
                    <input type="submit" name="envoiMenu" value="Créer Menu">
                  </div>
              </form>
            </div>
          </div>
  </body>
</html>
