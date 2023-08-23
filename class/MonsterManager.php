<?php

    class MonsterManager{

        private PDO $db;
        function __construct(PDO $db) {
            $this->db = $db;
        }
        
        public function selectMonster():Monster
        {
            $statement = $this->getDb()->prepare("SELECT * FROM monsters");
            $statement->execute();
            $monster = $statement->fetchAll();

            $index = rand(0,count($monster)-1);
            $newMonster = new Monster($monster[$index]['name'],$monster[$index]['health_point']);
            return $newMonster;
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
    }
?>