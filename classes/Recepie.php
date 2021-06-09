<?php
    include_once(__DIR__ . "/Db.php");

    class Recepie{
        public static function getAllRecepies(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM recepies");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public static function getAllDinners(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM recepies WHERE type = 'dinner'");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public static function getAllSnacks(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM recepies WHERE type = 'snack'");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function getRecepieById($id){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM recepies WHERE id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


    }