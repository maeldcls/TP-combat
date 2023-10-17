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
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
</head>
<body>
    <form method="post">
        <label for="name">Crée ton héros:</label>
        <input type="text" name="name">
        <select name="class">
            <option value="warrior">Warrior</option>
            <option value="mage" selected>Mage</option>
            <option value="archer">Archer</option>
        </select>
        <select name="char">
            <option value="cloud">Cloud</option>
            <option value="raegan" selected>Raegan</option>
            <option value="tifa">Tifa</option>
            <option value="lulu">Lulu</option>
        </select>
        <input type="submit" choiceButton>
    </form>

 <div class="container">
 <?php
        $manager = new HeroesManager($bdd);

        if(isset($_POST["name"])&& $_POST['name'] != ""){
        
            $hero = new Hero($_POST['name']);
            $manager->add($hero,$_POST['class'], $_POST['char']);
            
        }
        $heroes = $manager->findAllAlive();
        
        foreach($heroes as $hero){
            echo'<div class="card bg-dark text-white d-flex flex-column border-white">';
            echo '<div class="pic"><img src="'.$hero['picture'].'"></div>';
            echo'<form method="get" action="fight.php" class="d-flex flex-column">';
            echo '<p class="nom">'.$hero['name'] . ' </p><div><p>'. $hero['health_point'] .' </p>';
            echo'<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) 
            Copyright 2023 Fonticons, Inc. --><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 
            47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 
            115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg></div>';
            echo '<input type="hidden"  name="id" value="'. $hero['id'].'">' ;
            echo' <input type="submit" class="choiceButton" value="choisir"> </form></div>';
        }
        ?>
 </div>
 <audio id="prelude" loop>
    <source src="sounds/prelude.mp3" type="audio/mpeg">
</audio>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
 <script src="utils/index.js"></script>
</body>
</html>