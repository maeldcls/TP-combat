<?php
class Hero {
    private $id;
    private $name;
    private $hp;
    private $class;
    private $picture;
    private $icon;
    private $attackSpe;

  
    function __construct($name,) {
        $this->name = $name;
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
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */ 
    public function setClass($class)
    {
        $this->class = $class;

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
     * Get the value of attackSpe
     */ 
    public function getAttackSpe()
    {
        return $this->attackSpe;
    }

    /**
     * Set the value of attackSpe
     *
     * @return  self
     */ 
    public function setAttackSpe($attackSpe)
    {
        $this->attackSpe = $attackSpe;

        return $this;
    }

    public function hit(Monster $monster):int
    {
        $damage = rand(0,50);
        $monsterHP = $monster->getHp();
        $monster->setHp($monsterHP - $damage);
        if($monster->getHp()<0){
            $monster->setHp(0);
        }

        return $damage;
    }
}

?>