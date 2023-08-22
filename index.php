<?php
require_once('config/db.php');
require_once('config/autoload.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <form method="post">
        <label for="name">Entrez le nom de votre Héro:</label>
        <input type="text" name="name">
        <input type="submit">
    </form>

 <div>
 <?php
        $manager = new HeroesManager($bdd);

        if(isset($_POST["name"])&& $_POST['name'] != ""){
        
            $hero = new Hero($_POST['name']);
            $manager->add($hero);   
        }
        $heroes = $manager->findAllAlive();
        
        foreach($heroes as $hero){
            echo'<form method="get" action="fight.php">';
            echo 'nom : '.$hero['name'] . ' PV : '. $hero['health_point'] .' <input type="hidden"  name="id" value="'. $hero['id'].'">' ;
            echo' <input type="submit" class="choiceButton" value="choisir"> </form><br/>';
        }
        ?>
 </div>
        

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>