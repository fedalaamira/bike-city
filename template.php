<?php
session_start();
try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=pfe','root', '');
}
catch (Exception $e)

{
	die('Erreur : '.$e->getMessage());

}

if (isset($_POST['formconnexion']))
{ 
$Login = htmlspecialchars($_POST['mail']);
$Password = ($_POST['mdp']);

 if((empty($Login)) AND empty($Password) ) 
{ 
    header('Location: erreur_connexion.php');
}
else
{   
 $requser1= $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?  ");
 $requser1->execute(array($Login, $Password ));

 $userexist1 = $requser1->rowCount();


     if ($userexist1 == 1  )
     {
       $userinfo1 = $requser1->fetch();
      $_SESSION['mail']=$userinfo1['mail'];
      $_SESSION['num']=$userinfo1['num'];
      $_SESSION['prenom']=$userinfo1['prenom'];
      $_SESSION['nom']=$userinfo1['nom'];
     // $profil_type =  $bdd->prepare('SELECT `Type` FROM `membres` WHERE `mail`=?');
      //$profil_type-> execute(array($Login));
     // while($type = $profil_type->fetch())
     // {
      
        echo 'ok';
     // }
     
    
    }

     
     else
     { 
      header('Location: erreur_connexion.php');
      
     }
    }
  }   
?>

<html>
<head>
  <title>Connexion</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>  
<body>
	<div class="loginbox">
    <!--div id="titre"-->
      <!--h1>  Connectez vous ici </h1-->
    <!--/div-->
  <form method="POST" action="">
		
      <div class="formcontrol">
        <!--label for="email">  Email </label-->
		    <input type="email" class="Email" name="mail" placeholder="Email adress" id="email"/>
      </div>
	 
      <div class="formcontrol">
        <!--label for="password">  Mot de passe </label-->
	  	  <input type="password" class="mot2pass" name="mdp" placeholder="Password" id="password"/>
	  	</div>
      <div class="formcontrol">
	  	  <input class="save" type="submit" name="formconnexion"  value="Sign in" id="Connectez" />
      </div>
      <div id="naccount">
        <p>
         Not a member? <a href="inscriptioncompt.php">Sign in </a>
        </p>
    </div>
    </form>

</body>


</html>

