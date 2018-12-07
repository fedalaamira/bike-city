
<?php $pageTitle = 'Signup'; include './header.php'; ?>
<?php

if(isset($_POST['forminscription']))
{  $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp =($_POST['mdp']);
    $mdp2 =($_POST['mdp2']);
    $num = htmlspecialchars($_POST['num']);
    if(empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['mail']) OR empty($_POST['mdp']) OR empty($_POST['mdp2']) OR empty($_POST['num']))
    {
      //  header('Location: erreur_connexion.php');
    }
    else {
    
      $nomlength = strlen ($nom); 
      $prenomlength = strlen ($prenom); 
      if (($nomlength <= 255) AND ($prenomlength <= 255))
      {   if (filter_var($mail,FILTER_VALIDATE_EMAIL))
        {
         if ( $mdp == $mdp2)
         {
            $insertmbr =  $bdd->prepare("INSERT INTO  membres ( nom,prenom,mail,mdp,num)VALUES (?,?,?,?,?)");
            $insertmbr -> execute(array($nom,$prenom,$mail,$mdp,$num));
            echo ' votre compte a ete bien creer';
         }
         else {//  header('Location: erreur_connexion.php'); 
        }   
      }
      else { //  header('Location: erreur_connexion.php');
    }
    }
      else 
      {
       // header('Location: erreur_connexion.php'); 
      }
    }
}
?>
 
    <h2>Inscription</h2>

  
   
 <div  id="regestorbox" align="center">
    <form method="POST" action="">
      <table class="full-width" >
      <tr >
        <td>
          <input type="text" class="my-input" placeholder="Votre nom" name="nom" />
        </td>
        <td>
          <input type="text" class="my-input" placeholder="Votre Prenom" name="prenom" />
        </td>
      </tr> 
      <tr >
        <td>
          <input type="email" class="my-input" placeholder="Votre email" name="mail" />
        </td>
        <td >
          <input type="text" class="my-input" placeholder="votre numero de telephone" name="num" />
        </td>
      </tr >
      <tr >
        <td colspan="2">
          <input type="password" class="my-input" placeholder="Votre mot de passe"  name="mdp" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="password" class="my-input"  placeholder="confirmez votre mot de passe" name="mdp2" />
        </td>
      </tr>
      <tr>
      <td colspan="2">
        <input type="submit" class="button-success" name="forminscription" value=" Inscrire" />
      </td>
      </tr>
    </table>
</form>
  

  </div>

  <?php include './footer.php' ?>