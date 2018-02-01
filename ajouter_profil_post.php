<?php
include('_include/db.php');
include('_include/head.php');
include('_include/headerNewUser.php');




    if ((isset($_POST['nom'])))  {
      //Récupération des données du formulaire
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $pseudo = $_POST['pseudo'];
      $cp = $_POST['cp'];
      $adresse = $_POST['adresse'];
      $ville = $_POST['ville'];
      $mail = $_POST['adresse_mail'];
      $rang = $_POST['rang'];
      $telephone = $_POST['telephone'];
      $mdp = $_POST['MDP'];

      $regexCP = "/^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/";
      if (!preg_match("#^0[1-8]([-. ]?[0-9]{2}){4}$#", $telephone)){
        header('location:ajouter_profil.php?errorTelephone=1');
      }

      if (!preg_match($regexCP, $cp)) {
        header('location:ajouter_profil.php?errorCodePostal=1');
      }

	    $requete = $bdd->prepare('INSERT INTO profils_utilisateurs(nomUtilisateurs, prenomUtilisateurs, pseudoUtilisateurs, passwordUtilisateurs, cpUtilisateurs, adresseUtilisateurs, villeUtilisateurs, mailUtilisateurs, telephoneUtilisateurs, id_rang)
                                VALUES (:nom, :prenom, :pseudo, :mdp, :cp, :adresse, :ville, :mail, :telephone, :rang)');
      $requete->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'pseudo' => $pseudo,
        'mdp' => $mdp,
        'cp' => $cp,
        'adresse' => $adresse,
        'ville' => $ville,
        'mail' => $mail,
        'telephone' => $telephone,
        'rang' => $rang
      ));
      header('location:index.php?newUserSuccess');
	}

?>
