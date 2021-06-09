<?php
    include_once(__DIR__ . "/Db.php");
    
    class Usersplantpreference{
        private $usersId;
        private $plantsId;
        private $isChecked;

        public function setUsersId($usersId) {
            $this->usersId = $usersId;
            return $this;
        }
        
        public function getUsersId() {
            return $this->usersId;
        }


        public function setPlantsId($plantsId) {
            $this->plantsId = $plantsId;
            return $this;
        }
        
        public function getPlantsId() {
            return $this->plantsId;
        }


        public function setIsChecked($isChecked) {
            $this->isChecked = $isChecked;
            return $this;
        }
        
        public function getIsChecked() {
            return $this->isChecked;
        }


        public function checkPlantPref(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("INSERT INTO user_plant_preferences (users_id, plants_id) VALUES (:usersId, :plantsId);");
            
            $usersId = $this->getUsersId();
            $plantsId = $this->getPlantsId();
            $statement->bindValue(":usersId", $usersId);
            $statement->bindValue(":plantsId", $plantsId);
            $statement->execute();
        }
        
        public function uncheckPlantPref(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("DELETE FROM user_plant_preferences WHERE users_id = :usersId AND plants_id = :plantsId");
            $usersId = $this->getUsersId();
            $plantsId = $this->getPlantsId();
            $statement->bindValue(":usersId", $usersId);
            $statement->bindValue(":plantsId", $plantsId);
            $statement->execute();
        }



        public static function isBoxChecked($usersId, $plantsId){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM user_plant_preferences WHERE plants_id = :plantsId AND users_id = :usersId");
            $statement->bindValue(":plantsId", $plantsId);
            $statement->bindValue(":usersId", $usersId);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)){
                return 1;
            } else{
                return 0;
            }
        }
    }
