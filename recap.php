

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Recap Commande</title>
</head>
<body>
    <div class="container card text-center">
    <?php
session_start();
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$nbSandwitchs=$_POST['nbSandwitchs'];
$type=$_POST['type'];
?>
<div class="alert alert-success"><h1>
<?php
echo "Bienvenue ".$nom." ".$prenom."<br>";
?>
</h1></div>
<?php
echo "Vous avez commandé ".$nbSandwitchs." sandwitch(s) de type ".$type;
if(isset($_POST['harissa'])||isset($_POST['salade'])||isset($_POST['mayo'])) echo " avec : ";
if(isset($_POST['harissa'])) echo " harissa";
if(isset($_POST['salade'])) echo " salade";
if(isset($_POST['mayo'])) echo " mayo";
echo "<br>";

echo "L'adresse: ".$_POST['adresse']."<br>";

if($nbSandwitchs>10){
    echo "Le prix est ".(($nbSandwitchs*4)*0.9)." dt";
}else{
    echo "Le prix est ".($nbSandwitchs*4)." dt";
}

$CIN = $_FILES["CIN"];
if(isset($CIN["error"])&&$CIN["error"]==0) {
    move_uploaded_file($CIN["tmp_name"],"uploads/".uniqid().basename($CIN["name"])); ?> 
    <div class="alert alert-success"> <?php echo ("Votre fichier (CIN) a été téléchargé avec succès"); ?> </div>
    <?php
}
else{
?> 
   <div class="alert alert-danger"> <?php echo ("Il y a eu un problème dans le chargement de votre fichier (CIN)"); ?> </div>
<?php
}

?>
    </div>
    
</body>
</html>