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

    public function add(Hero $hero): string 
    {
        $req = $this->getDb()->prepare("INSERT INTO heroes(name) VALUES(:name)");
        if($req->execute(array(
            'name'=>$hero->getName()
        )));

        $id = $this->db->lastInsertId();
        $hero->setId($id);
        return $id;
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