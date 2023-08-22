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
        $damage = rand(0,50);
        $heroHP = $hero->getHp();
        $hero->setHp($heroHP-$damage);

        return $damage;
    }
}
?>