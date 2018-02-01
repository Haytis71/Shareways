<?php
include('_include/head.php');
include('_include/headerNewUser.php');
?>

<div class="containerFormulaire">
  <div class="row">
    <div class="col md-4 col-sm-4"></div>
    <div class="col md-4 col-sm-4">
      <div class="ajoutActeur">
        <h2 class="text-center">Nouvel acteur</h2>
        <br>
        <form class="formGlobal" action="ajoutActeur_post.php" method="post">

          <!--Nom Acteur-->
          <div class="form-group">
            <label for="nomActeur">Acteur</label>
            <div class="input-group">
              <!--Petit icône descriptif-->
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </div>
              <input class="form-control" id="nomActeur" placeholder="Nom" name="nomActeur" type="text" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="adresseActeur">Adresse</label>
            <div class="input-group">
              <!--Petit icône descriptif-->
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </div>
              <input class="form-control" id="adresseActeur" placeholder="Adresse" name="adresseActeur" type="text" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="villeActeur">Ville</label>
            <div class="input-group">
              <!--Petit icône descriptif-->
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </div>
              <input class="form-control" id="villeActeur" placeholder="Ville" name="villeActeur" type="text" required/>
            </div>
          </div>

          <?php
          //si le code postal entré n'est pas valide alors on colore le champs en rouge avec un message d'erreur
          if ((isset($_GET['errorCodePostal']) == 1)) {
            ?>
            <div class="form-group">
              <label for="cpActeur">Code Postal</label>
              <input class="form-control" id="cpErrorInput" placeholder="Code Postal" name="cpActeur" type="text" maxlength="5" required/>
              <!--Message d'erreur afficher en rouge et centré-->
              <div class="invalid-feedback" id="formErrorInputCP">
                Le Code Postal entré n'est pas valide !
              </div>
            </div>
            <?php
          }
          //affichage normale si pas d'erreur ou si pas de CP encore rentré
          else {
            ?>
            <div class="form-group">
              <label for="cpActeur">Code Postal</label>
              <input class="form-control" id="cpActeur" placeholder="Code Postal" name="cpActeur"  maxlength="5" type="text" required/>
            </div>
            <?php
          }
          ?>

          <div class="form-group">
            <label for="descriptionActeur">Description</label>
            <textarea class="form-control" name="descriptionActeur" rows="8" cols="75" required></textarea>
          </div>


          <button type="submit" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-check"></span> Ajouter</button>
          <a href="afficherActeur.php"> <button type="button" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-list"></span> Liste des acteurs</button></a>

        </form>

      </div>


    </div>
    <div class="col md-4 col-sm-4"></div>
  </div>
</div>
