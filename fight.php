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
    <link rel="stylesheet" href="css/fight.css">
</head>
<body>
<a href="index.php" class="accueil">Accueil</a>
    <div class="container">
        <h2>Combat :</h2>
        <p>
        <?php
            $manager = new HeroesManager($bdd);
            $hero = $manager->find($_GET['id']);
            
            $fightManager = new FightManager();
            $monster = $fightManager->createMonster();
            $fightResults=$fightManager->fight($hero,$monster);
            $manager->update($hero);
            foreach($fightResults as $result){
                echo $result. "<br/>";
            }
        ?>
        <p>
    </div>
    
</body>
</html>