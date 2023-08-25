<?php
class Monster{
    private $name;
    private $hp;
    private $picture;
    private $icon;
    private $id;

    function __construct($name)
    {
        $this->name = $name;
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

   

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
    /**
     * Get the value of icon
     */ 
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @return  self
     */ 
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function hit(Hero $hero):int
    {
        $damage = rand(0,20);
        $heroHP = $hero->getHp();
        $hero->setHp($heroHP-($damage));
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