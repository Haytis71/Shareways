

<?php

include('_include/db.php');
include('_include/head.php');
include('_include/headerNewUser.php');

?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
          if (isset($_POST['nomActeur'])) {
              $acteur = $_POST['nomActeur'];
              $adresse = $_POST['adresseActeur'];
              $ville = $_POST['villeActeur'];
              $CP = $_POST['cpActeur'];
              $description = $_POST['descriptionActeur'];
              $regexCP = "/^(([0-9][0-9])|(9[0-5]))[0-9]{3}$/";


              $verifPseudo = $bdd->query("SELECT nomActeur FROM acteurs WHERE nomActeur = '$acteur'");

              if ($donnes = $verifPseudo->fetch()) {
  
                if (!preg_match($regexCP, $CP)) {
                  header('location:ajoutActeur.php?errorCodePostal=1');
                }

              while ($CP < $cpLength) {
                if (!preg_match($regexCP, $CP)) {
                  header('location:ajoutActeur.php?errorCodePostal=1');
                }              }

                ?>
                <script type="text/javascript">
                  alert("Cet acteur existe déjà, dommage. \n\nVeuillez recommencer");
                  document.location.href = 'ajoutActeur.php';
                </script>
                <?php
              }
              else {
                $req = $bdd->prepare("INSERT INTO acteurs(nomActeur,adresseActeur,cpActeur,villeActeur,descriptionActeur) VALUES (:acteur, :adresseActeur, :cpActeur, :villeActeur, :descriptionActeur)");
                $req->execute(array(
                  'acteur' => $acteur,
                  'adresseActeur' => $adresse,
                  'cpActeur' => $CP,
                  'villeActeur' => $ville,
                  'descriptionActeur' => $description
                ));

                header('location:index.php?newUserSuccess=1');

              }

          }
          echo "<br><br><br><br><br><br><br>";
          echo "2222"
        ?>
      </div>
    </div>
  </div>
