<?php
    session_start();
    include('_include/db.php');
    include('_include/head.php');



  $pseudo = $_POST['pseudo'];
  $password = ($_POST['MDP']);




  $req = $bdd->prepare("SELECT * FROM profils_utilisateurs WHERE pseudoUtilisateurs = '$pseudo' AND passwordUtilisateurs = '$password'");
  $req->execute(array(
    'pseudo' => $pseudo,
    'password' => $password
  ));


  $resultat = $req->fetch();

  if (!$resultat) {
    ?>
    <script type="text/javascript">
      alert("probleme lors de la connexion !");
      document.location.href = 'index.php';
    </script>
    <?php

  }
  else {
    $_SESSION['id_utilisateurs'] = $resultat['id_utilisateurs'];
    $_SESSION['pseudo'] = $pseudo;
    header('location:index.php?connexionSuccess=1');
  }





 ?>
