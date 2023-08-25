<?php

    class MonsterManager{

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
        public function setDb($db)
        {
                $this->db = $db;

                return $this;
        }

        public function selectMonster():Monster
        {
            $statement = $this->getDb()->prepare("SELECT * FROM monsters");
            $statement->execute();
            $monster = $statement->fetchAll();

            $index = rand(0,count($monster)-1);
            $newMonster = new Monster($monster[$index]['name']);
            $newMonster->setPicture($monster[$index]['picture']);
            $newMonster->setIcon($monster[$index]['icon']);
            $newMonster->setHp($monster[$index]['health_point']);
            $newMonster->setId($index);
          
            return $newMonster;
        }
        /*
        public function update(Monster $monster):void
    {
        $req = $this->getDb()->prepare("UPDATE monsters SET health_point = :health_point WHERE id = :id");
        if($req->execute(array(
            'health_point'=>$monster->getHp(),
            'id'=>$monster->getId()
        )));
    }*/

       
    }
?>