<?php
class Monster{
    private $name;
    private $hp;

    function __construct($name,$hp)
    {
        $this->name = $name;
        $this->hp = $hp;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function hit(Hero $hero):int
    {
        $damage = 2*$this->multiplicator($hero);
        $heroHP = $hero->getHp();
        $hero->setHp($heroHP-($damage));
        var_dump($this->multiplicator($hero));
        if($hero->getHp()<0){
            $hero->setHp(0);
        }
        return $damage;
    }

    public function multiplicator(Hero $hero):int
    {
        $multi=0;
        if($this->getName() == "wizard"){
            if($hero->getClass() == "warrior"){
                $multi = 2;
            }else{
                $multi = 1;
            }
        }else if($this->getName() == "ogre"){
            if($hero->getClass() == "archer"){
                $multi = 2;
            }else{
                $multi = 1;
            }
        }else if($this->getName() == "fantassin"){
            if($hero->getClass() == "mage"){
                $multi = "boosté";
            }else{
                $multi = "normal";
            }
        }else{
            $multi = 1;
        }
        return $multi;
    }
}
?>