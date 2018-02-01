<?php
session_start();
include('_include/db.php');
include('_include/head.php');
include('_include/headerConnexion.php');
 ?>




     <div class="containerFormulaire">

       <h2 class="text-center">Connexion</h2>
       <br>

       <div class="row">
         <div class="col md-4 col-sm-4"></div>
         <div class="col md-4 col-sm-4">
           <form class="formGlobal" action="connexion_post.php" method="post">

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

             <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Connexion</button>

           </form>


         </div>
         <div class="col md-4 col-sm-4"></div>
       </div>
     </div>
