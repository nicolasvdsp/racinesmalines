<?php 
    include_once(__DIR__ . "/Db.php");
    
    class Plant{
        
        public function getAllPlants() {
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM plants");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);      
            return $result; 
        }
    }