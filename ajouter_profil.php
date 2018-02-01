<?php
include('_include/db.php');
include('_include/head.php');
include('_include/headerNewUser.php');
$rang=$bdd->query("SELECT * FROM rangs");
$rang->setFetchMode(PDO::FETCH_OBJ);
?>
<br><br><br><br><br><br>


<!--Partie qui contient le code du formulaire en lui-même-->
<div class="containerFormulaire">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<h2 class="text-center">Inscription</h2>
			<br>
			<form class="formGlobal" action="ajouter_profil_post.php" method="post">

				<!--Nom-->
				<div class="form-group">
					<label for="nom">Nom</label>
					<div class="input-group">
						<!--Petit icône descriptif-->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						<input class="form-control" id="nom" placeholder="Nom" name="nom" type="text" required/>
					</div>
				</div>

				<!--Prenom-->
				<div class="form-group">
					<label for="prenom">Prenom</label>
					<div class="input-group">
						<!--Petit icône descriptif-->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						<input class="form-control" id="nom" placeholder="Prenom" name="prenom" type="text" required/>
					</div>
				</div>

				<!--Pseudo-->
				<div class="form-group">
					<label for="pseudo">Pseudo</label>
					<div class="input-group">
						<!--Petit icône descriptif-->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						<input class="form-control" id="nom" placeholder="Pseudo" name="pseudo" type="text" required/>
					</div>
				</div>
				<!--Numéro de téléphone-->
				<?php
					//si le numéro entré n'est pas valide alors on colore le champ en rouge avec un message d'erreur
					if ((isset($_GET['errorTelephone']) == 1)) {
						?>
						<div class="form-group">
							<label for="telephone">Téléphone</label>
							<div class="input-group">
								<!--Petit icône descriptif-->
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-earphone"></span>
								</div>
								<input class="form-control" id="telephoneErrorInput" placeholder="Téléphone" name="telephone" type="tel" required/>
							</div>
							<!--Message d'erreur afficher en rouge et centré-->
							<div class="invalid-feedback" id="formErrorInputTelephone">
								Le numéro entré n'est pas valide !
							</div>
						</div>
						<?php
					}
					//affichage normale si pas d'erreur ou si pas de numéro encore rentré
					else {
						?>
						<div class="form-group">
							<label for="telephone">Téléphone</label>
							<div class="input-group">
								<!--Petit icône descriptif-->
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-earphone"></span>
								</div>
								<input class="form-control" id="telephone" placeholder="Téléphone" name="telephone" type="tel" required/>
							</div>
						</div>
						<?php
					}
					?>


				<!--Adresse-->
				<div class="form-group">
					<label for="adresse">Adresse</label>
					<div class="input-group">
						<!--Petit icône descriptif-->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-home"></span>
						</div>
						<input class="form-control" id="adresse" placeholder="Adresse" name="adresse" type="text"/>
					</div>
				</div>

				<?php
				//si le code postal entré n'est pas valide alors on colore le champs en rouge avec un message d'erreur
				if ((isset($_GET['errorCodePostal']) == 1)) {
					?>
					<div class="form-group">
						<label for="cp">Code Postal</label>
						<input class="form-control" id="cpErrorInput" placeholder="Code Postal" name="cp" type="text" required/>
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
						<label for="cp">Code Postal</label>
						<input class="form-control" id="CP" placeholder="Code Postal" name="cp" type="text" required/>
					</div>
					<?php
				}
				?>

				<!--Ville-->
				<div class="form-group">
					<label for="ville">Ville</label>
					<input type="text" class="form-control" id="ville" placeholder="Ville" name="ville" required/>
				</div>


				<!--Adresse E-mail-->
				<div class="form-group">
					<label for="adresse_mail">Email</label>
					<div class="input-group">
						<!--Petit icône descriptif-->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</div>
						<input class="form-control" id="email" placeholder="Email" name="adresse_mail" type="email" required/>
					</div>
				</div>

				<!--Mot de passe-->
				<div class="form-group">
					<label for="MDP">Mot de Passe</label>
					<div class="input-group">
						<!--Petit icône descriptif-->
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</div>
						<input class="form-control" id="myInput" placeholder="Mot de Passe" name="MDP" type="password" required/>
						<div class="input-group-addon">
							<span onclick="myFunction()" id="spanEye"  class="glyphicon glyphicon-eye-open"></span>
						</div>
					</div>

					<!--afficher ou cacher le MDP rentré-->
					<script>
						function myFunction() {
							var x = document.getElementById("myInput");
							if (x.type === "password") {
								x.type = "text";
							} else {
								x.type = "password";
							}

						}
					</script>
				</div>

				<!--Rang-->
				<div class="form-group">
					<label for="rang">Rang</label>
					<div class="input-group">
						<select>

							<?php
										while( $rangs = $rang->fetch() )
											{
											echo "
										    <option class='form-control' name='rang' value='". $rangs->id_rang."' >".$rangs->nomRang."</option>
											";
											}
											?>
						</select>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Envoyer</button>

			</form>
		</div>
		<div class="col-sm-5"></div>
	</div>
</div>

<!--

<p class="message_modifier">AJOUTER</p>

<div class="ajout">
<h2>FORMULAIRE</h2>
	<form action="./ajouter_profil_post.php" method="post">
		<p>
			Nom:<br />
			<input type="text" name="nom" /><br /><br />
			Prénom:<br />
			<input type="text" name="prenom" /><br /><br />
            Pseudo:<br />
			<input type="text" name="pseudo" /><br /><br />
            Adresse:<br />
			<input type="text" name="adresse" /><br /><br />
            Code postal:<br />
			<input type="text" name="cp" /><br /><br />
            Ville:<br />
			<input type="text" name="ville" /><br /><br />
            Mail:<br />
			<input type="email" name="adresse_mail" /><br /><br />
            Rang:<br />
			<select>
			<?php
			//while( $rangs = $rang->fetch() )
				{
				?>
			    <option value="<?php// $rangs->id_rang; ?>" name="rang"><?php //echo $rangs->nomRang; ?></option>
				<?php
				;
				}
				?>
			</select><br /><br />

			<input type="submit" value="Valider" />
		</p>
	</form>
</div>
-->
