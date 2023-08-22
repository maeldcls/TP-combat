<?php
class FightManager{
    


    public function createMonster():Monster
    {
        $monster = new Monster("Jerome",100);
        return $monster;
    }

    public function fight(Hero $hero, Monster $monster):Array
    {
        $log[] = "";
        while($hero->getHp()>0 && $monster->getHp()>0){
            $dmg = $monster->hit($hero);
            $log[] = $monster->getName() ." inflige " .$dmg ." dégat à ".$hero->getName() . "PV restants :" .$hero->getHp(). "//". $monster->getHp();
            if($hero->getHp()>0){
                $dmg = $hero->hit($monster);
                $log[] = $hero->getName() ." inflige " .$dmg ." dégat à ".$monster->getName();
            }
        }

        if($hero->getHp()>0){
            $log[]= "Le héros ". $hero->getName() . " a térassé le monstre " .$monster->getName();
            $hero->sethp(100);
        }else{
            $log[]= "Le héros ". $hero->getName() . " a s'est fait tuer par le monstre " .$monster->getName();

        }
        return $log;
    }

    
}
?>