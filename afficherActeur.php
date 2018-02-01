<?php
session_start();
include('_include/db.php');
include('_include/head.php');
include('_include/headerNewUser.php');



$resultatRequete = $bdd->query('SELECT * FROM acteurs');
$resultatRequete->setFetchMode(PDO::FETCH_OBJ);

 ?>


 <div class="afficherActeur">
   <div class="container">
     <div class="row">
       <div class="col-md-4"> </div>
       <div class="col-md-4">
         <h1>Acteurs</h1>
       </div>
       <div class="col-md-4"> </div>
     </div>

      <br>
      <br>

     <div class="row">
       <!-- Tableau permettant d'afficher les données de la table 'recapitulatifs' -->
       <table class="table table-hover table-striped">
         <thead>
           <tr>
             <td>Nom</td>
             <td>Adresse</td>
             <td>Ville</td>
             <td>Code postal</td>
             <td>Description</td>
           </tr>
         </thead>
         <tbody>

         </div>

         <?php
         //insertion des données de la table 'recapitulatifs' dans le tableau créé .TableauDeResultat
         while( $resultatRencontre = $resultatRequete->fetch() )
         {
           echo"
           <tr>
           <td>".$resultatRencontre->nomActeur."</td>
           <td>".$resultatRencontre->adresseActeur."</td>
           <td>".$resultatRencontre->villeActeur."</td>
           <td>".$resultatRencontre->cpActeur."</td>
           <td>".$resultatRencontre->descriptionActeur."</td>
           </tr> ";
         }

         ?>
       </tbody>
       <tfoot>
         <tr>
           <td>Nom</td>
           <td>Adresse</td>
           <td>Ville</td>
           <td>Code postal</td>
           <td>Description</td>
         </tr>
       </tfoot>
     </table>

     </div>

     <a href="ajoutActeur.php"> <button type="button" class="btn btn-primary btn-primary btn-lg btn-block "><span class="glyphicon glyphicon-edit"></span> Insertion d'un nouvel acteur</button></a>


 </div>
