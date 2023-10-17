<?php
class FightManager{
    
    public $monsterHP = array();

    public function fight(Hero $hero, Monster $monster):Array
    {
        $log[] = "";
        while($hero->getHp()>0 && $monster->getHp()>0){
            $dmg = $monster->hit($hero);
            $log[] = $monster->getName() ." inflige " .$dmg ." dégats à ".$hero->getName() . " !" .$hero->getHp();
            if($hero->getHp()>0){
                $dmg = $hero->hit($monster);
                //$monster->setHp($monster->getHp()-$dmg);
                $log[] = $hero->getName() ." inflige " .$dmg ." dégats à ".$monster->getName();
            }
        }

        if($hero->getHp()>0){
            $log[]= "Le héros ". $hero->getName() . " a térassé le monstre " .$monster->getName() . " !" .$hero->getHp();
        }else{
            $log[]= "Le héros ". $hero->getName() . "  s'est fait tuer par le monstre " .$monster->getName() . " !" .$hero->getHp();

        }
        return $log;
        
    }
}
?>