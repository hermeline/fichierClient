<?php include('inc/header.php') ?>
      <h1>Profil</h1>
      <div class="container-fluid">
        <!-- Partie profil -->
          <?php
          require_once 'config/connexion.php';
          $id = $_GET['id'];
          $reponse = $bdd->query("SELECT * FROM clients WHERE id_client='$id' ");  // Requête SQL : On récupère tout le contenu de la table clients

          // On affiche chaque entrée une à une dans une div différente grâce une boucle
          while ($donnees = $reponse->fetch())
          {
            ?>
            <div class="row">
                <div class="col-md-8">
                  <p> <?php echo $donnees['prenom'].' '.$donnees['nom'] ?> </p>
                  <p class="col-md-6"> <?php echo $donnees['tel']?> </p>
                  <p class="col-md-6"> <?php echo $donnees['email']?> </p>
                  <p> Paiements à jour : <?php if($donnees['etat_paiement']=true){
                      echo ' <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>';
                    }else{
                      echo ' <i class="fa fa-thumbs-down" aria-hidden="true"></i>';
                    }  ?> </p>
                </div>
                <div class="col-md-2">
                <!-- Liens pour modifier et pour supprimer le profil en insérant l'id du menu dans l'url pour pouvoir ensuite le récupérer en GET -->
                  <a class="btnmodif" href="modifierProfil.php?id=<?php echo $donnees['id_client']; ?>">Modifier le profil client</a>
                  <a class="btnmodif supp" href="supprimerProfil.php?id=<?php echo $donnees['id_client']; ?>">Supprimer ce client</a>
                </div>
            </div>
            <?php
          }
          $reponse->closeCursor();
          ?>
        </div>
        <!-- Partie liens -->
    <div class="row">
    <!-- Liens pour ajouter fiche alimentaire et pour ajouter un résumé en insérant l'id du menu dans l'url pour pouvoir ensuite le récupérer en GET -->
      <a class="col-md-6 btn" href="formFiche.php?id=<?php echo $donnees['id_client']; ?>"><i class="fa fa-address-card-o" aria-hidden="true"></i> Ajouter une fiche alimentaire</a>
      <a class="col-md-6 btn" href="formResume.php?id=<?php echo $donnees['id_client']; ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ajouter un résumé</a>
    </div>

    <!-- Partie résumés -->
    <h1>Résumés :</h1>
    <div class="container-fluid">
        <?php
        $reponse = $bdd->query("SELECT * FROM resumes WHERE resume_client='$id' ");  // Requête SQL : On récupère tout le contenu de la table clients

        if(!isset($donnees['contenu'])){
          echo "<p>Vous n'avez pas encore de résumés</p>";
        } else{


        // On affiche chaque entrée une à une dans une div différente grâce une boucle
        while ($donnees = $reponse->fetch())
        {
          ?>
          <div class="row">
            <p> <?php  echo $donnees['contenu'];  ?> </p>
          </div>
      <?php
        }
      }
        $reponse->closeCursor();
        ?>
    </div>
  </div>
    <?php include('inc/footer.php') ?>
