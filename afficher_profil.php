

<?php
session_start();
include('_include/db.php');
include('_include/head.php');
include('_include/headerNewUser.php');



$utilisateur=$bdd->query("SELECT * FROM profils_utilisateurs");
$utilisateur->setFetchMode(PDO::FETCH_OBJ);


 ?>


 <div class="afficherActeur">
   <div class="container">
     <div class="row">
       <div class="col-md-4"> </div>
       <div class="col-md-4">
         <h1>Utilisateurs</h1>
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
						 <td>Prénom</td>
						 <td>Pseudo</td>
						 <td>Adresse</td>
						 <td>CP - Ville</td>
						 <td>Mail</td>
						 <td>Rang</td>
						 </tr>
				 </thead>
				 <tbody>

				<?php
					while( $utilisateurs = $utilisateur->fetch() )
					{
							echo"
						 <tr>
						 <td>".$utilisateurs->prenomUtilisateurs."</td>
						 <td>".$utilisateurs->nomUtilisateurs."</td>
						 <td>".$utilisateurs->pseudoUtilisateurs."</td>
						 <td>".$utilisateurs->adresseUtilisateurs."</td>
						 <td>".$utilisateurs->cpUtilisateurs." - ".$utilisateurs->villeUtilisateurs."</td>
						 <td>".$utilisateurs->mailUtilisateurs."</td>
						 <td>".$utilisateurs->id_rang."</td>
						 </tr>";
					}
				?>

				</tbody>
       <tfoot>
				 <tr>
				 <td>Nom</td>
				 <td>Prénom</td>
				 <td>Pseudo</td>
				 <td>Adresse</td>
				 <td>CP - Ville</td>
				 <td>Mail</td>
				 <td>Rang</td>
				 </tr>
       </tfoot>
     </table>

     </div>

     <a href="ajoutActeur.php"> <button type="button" class="btn btn-primary btn-primary btn-lg btn-block "><span class="glyphicon glyphicon-edit"></span> Insertion d'un nouvel utilisateur</button></a>


 </div>
