<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Menu envoyé</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container">
      <div class="envoiOk">
        <p class="textEnvoiOk">

          <?php
          require_once 'config/connexion.php';
          //
          try
          {
              $id= $_GET['id'];  // On récupère par un GET l'id du menu créé juste avant et récupéré avec lastInsertId
              //  var_dump($id);

              foreach($_POST['checkbox'] as $k => $check){  // Boucle pour que chaque checkbox cochée insère une nouvelle entrée dans la base relation_menu_plat
                   $check=intval($check);
                    // var_dump($check);
                         if (isset($_POST['checkbox']))
                         {
                            //  var_dump($id);
                             $req = $bdd->prepare('INSERT INTO relation_menu_plat(id_menu, id_plat) VALUES(:menu, :checkbox)');
                             $req->execute(array(
                                 'menu' => $id,
                                 'checkbox' => $check
                                 ));
                          }
                       else
                       {
                        echo 'Vous n\'avez pas selectionné de plat pour votre menu';
                       }
                      $req->closeCursor();
                }
            echo "Votre menu a bien été envoyé !";

          }catch(Exception $e)  //Si le menu n'a pas pu s'envoyer :
            {
                    die('Erreur : '.$e->getMessage());
                    echo "Votre menu n'a pas pu s'envoyer, merci de rééssayer :) ";
            }

          ?>
        </p>
        <a href="listeMenu.php"> Voir les Menus</a>
      </div>
    </div>
  </body>
</html>
