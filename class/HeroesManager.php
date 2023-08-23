<?php
class HeroesManager{
    private PDO $db;
    function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */ 
    public function setDb($db):self
    {
        $this->db = $db;

        return $this;
    }

    

    public function add(Hero $hero,$class): string 
    {
        $hero->setClass($class);
        $req = $this->getDb()->prepare("INSERT INTO heroes(name,health_point) VALUES(:name,:health_point)");
        if($req->execute(array(
            'name'=>$hero->getName(),
            'health_point'=>$this->generateHP($hero),
        )));
       
        $id = $this->db->lastInsertId();
        $hero->setId($id);

        $this->generateClass($hero);
        return $id;
    }

    public function generateClass(Hero $hero):void
    {
        if($hero->getClass() == "warrior"){
            $spe = "coup de pommeau";
        } else if($hero->getClass() == "mage"){
            $spe = "boule de feu";
        }else if($hero->getClass() == "archer"){
            $spe="pluie de flèches";
        }
        $req = $this->getDb()->prepare("INSERT INTO ".$hero->getClass()."(idHeroes,attack_spe) VALUES(:idHeroes,:attack_spe)");

        if($req->execute(array(
            'idHeroes'=>$hero->getId(),
            'attack_spe'=>$spe
        )));
    }

    public function generateHP(Hero $hero):int
    {
        if($hero->getClass() == "warrior"){
            $hp = 200;
        } else if($hero->getClass() == "mage"){
            $hp = 100;
        }else if($hero->getClass() == "archer"){
            $hp=150;
        }
        return $hp;
    }

    

    public function findAllAlive(): array|false
    {
        $statement = $this->getDb()->prepare("SELECT * FROM heroes WHERE health_point>0");
        $statement->execute();
        $heroes = $statement->fetchAll();

        foreach($heroes as $hero){
            $h[] = $hero;
        }

        return $heroes;
    }

    public function find($id):Hero
    {
        $statement = $this->getDb()->prepare("SELECT * FROM heroes WHERE id=$id");
        $statement->execute();
        $hero = $statement->fetch();

        $newHero = new Hero($hero['name']);
        $newHero->setId($hero['id']);
        $newHero->setHp($hero['health_point']);

        return $newHero;
    }

    public function update(Hero $hero):void
    {
        $req = $this->getDb()->prepare("UPDATE heroes SET health_point = :health_point WHERE id = :id");
        if($req->execute(array(
            'health_point'=>$hero->getHp(),
            'id'=>$hero->getId()
        )));
    }
}
?>