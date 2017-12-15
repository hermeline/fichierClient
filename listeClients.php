<?php include('inc/header.php') ?>

      <h1>Liste clients</h1>
      <div class="container-fluid">

        <table class="table table-hover ">
          <thead>
          </thead>

          <tbody>
            <?php
            require_once 'config/connexion.php';
            // Triple jointure, récupérant le nom + prénom de la table + les noms des plats (concat)
            $reponse = $bdd->query('SELECT * FROM clients');

            // On affiche chaque entrée une à une avec une boucle
            while ($donnees = $reponse->fetch())
            {
              if (isset($donnees['prenom']) && !empty($donnees['prenom'])) {
              ?>
              <tr>
              <th scope="row">
              <td> <?php echo $donnees['prenom'].' '.$donnees['nom']; ?> </td>
                  <!-- Liens pour modifier et pour supprimer le plat en insérant l'id du plat dans l'url pour pouvoir ensuite le récupérer en GET -->
              <td>    <a class="btn" href="profil.php?id=<?php echo $donnees['id_client']; ?>">Voir le profil</a> </td>
              <td>    <a class="btn" href="formResume.php?id=<?php echo $donnees['id_client']; ?>">Ajouter un résumé</a> </td>
              <td>    <a class="btn supp" href="supprimerMenu.php?id=<?php echo $donnees['id_client']; ?>">Supprimer ce client</a> </td>
            </tr>
              <?php
            }
            }

            $reponse->closeCursor();
            ?>

          </tbody>
        </table>

        </div>
    </div>
    <?php include('inc/footer.php') ?>
