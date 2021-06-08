<?php 

    class User {
        private $id;
        private $firstname;
        private $lastname;
        private $email;
        private $password;

        private $school;
        private $studentNumber;
        private $studentCardFront;
        private $studentCardBack;

        private $gardenPreference;

        public function setId($id) {
            $this->id = $id;
            return $this;
        }
        
        public function getId() {
            return $this->id;
        }


        public function setFirstname($firstname) {
            if(!empty($firstname)) {
                $this->firstname = $firstname;
                return $this;
            } else {
                throw new Exception("firstname can't be empty");
            }
        }
        
        public function getFirstname() {
            return $this->firstname;
        }


        public function setLastname($lastname) {
            if(!empty($lastname)) {
                $this->lastname = $lastname;
                return $this;
            } else {
                throw new Exception("lastname can't be empty");
            }
        }
        
        public function getLastname() {
            return $this->lastname;
        }


        public function setEmail($email) {
            if(!empty($email)) {
                $this->email = $email;
                return $this;
            } else {
                throw new Exception("email can't be empty;");
            }
        }
        
        public function getEmail() {
            return $this->email;
        }


        public function setPassword($pw) {
            $password = $this->bcrypt($pw);
            $this->password = $password;
            return $this;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setSchool($school) {
            if(!empty($school)) {
                $this->school = $school;
                return $this;
            } else {
                throw new Exception("school can't be empty");
            }
        }
        
        public function getSchool() {
            return $this->school;
        }


        public function setStudentNumber($studentNumber) {
            if(!empty($studentNumber)) {
                $this->studentNumber = $studentNumber;
                return $this;
            } else {
                throw new Exception("studentNumber can't be empty");
            }
        }
        
        public function getStudentNumber() {
            return $this->studentNumber;
        }


        public function setStudentCardFront($studentCardFront) {
            if(!empty($studentCardFront)) {
                $this->studentCardFront = $studentCardFront;
                return $this;
            } else {
                throw new Exception("studentCardFront can't be empty");
            }
        }
        
        public function getStudentCardFront() {
            return $this->studentCardFront;
        }


        public function setStudentCardBack($studentCardBack) {
            if(!empty($studentCardBack)) {
                $this->studentCardBack = $studentCardBack;
                return $this;
            } else {
                throw new Exception("studentCardBack can't be empty");
            }
        }
        
        public function getStudentCardBack() {
            return $this->studentCardBack;
        }

        public function setGardenpreference($gardenPreference, $id) {
            $this->gardenPreference = $gardenPreference;
            $conn = Db::getConnection();
            $statement = $conn->prepare("UPDATE users SET gardens_id = :gardenPreference WHERE id = :id");
            $statement->bindValue(":gardenPreference", $gardenPreference);
            $statement->bindValue(":id", $id);
            $statement->execute();
        }
        
        public function getGardenpreference() {
            return $this->gardenpreference;
        }


        public function bcrypt($pw){
            $option = [
                'cost' => 12,
            ];
            $hashedPassword = password_hash($pw, PASSWORD_DEFAULT, $option);
            return $hashedPassword;            
        }



        public function register(){
            $firstname = $this->getFirstname();
            $lastname = $this->getLastname();
            $email = $this->getemail();
            $password = $this->getpassword();

            
            $conn = Db::getConnection();
            
            $statement = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $statement->bindValue(":firstname", $firstname);
            $statement->bindValue(":lastname", $lastname);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":password", $password);
            $statement->execute();            
        }

        public function registerStudent(){
            $firstname = $this->getFirstname();
            $lastname = $this->getLastname();
            $email = $this->getemail();
            $password = $this->getpassword();
            $school = $this->getSchool();
            $studentNumber = $this->getStudentNumber();
            // $studentCardFront = $this->getStudentCardFront();
            // $studentCardBack = $this->getStudentCardBack();

            
            $conn = Db::getConnection();
            
            $statement = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, school, student_number) VALUES (:firstname, :lastname, :email, :password, :school, :studentNumber)");
            $statement->bindValue(":firstname", $firstname);
            $statement->bindValue(":lastname", $lastname);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":password", $password);
            $statement->bindValue(":school", $school);
            $statement->bindValue(":studentNumber", $studentNumber);
            
            $result = $statement->execute();
            // var_dump($result);
        }

        public function canLogin($password){
            $email = $this->getEmail();

            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $statement->bindValue(":email", $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                return false;
            }

            $pw_hash = $result['password'];
            if(password_verify($password, $pw_hash)){
                return true;
            } else{
                return false;
            }
        }

        public function getIdByEmail(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT id FROM users WHERE email = :email");
            $email = $this->getEmail();

            $statement->bindValue(":email", $email);
            $statement->execute();
            $result = $statement->fetch();
            return $result['id'];
        }

        public static function getUserDataFromId($id){
            $conn = Db::getConnection();
            //$statement = $conn->prepare("SELECT * FROM users WHERE id = :id");
            $statement = $conn->prepare("SELECT * FROM users INNER JOIN gardens ON users.gardens_id = gardens.id WHERE users.id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function startSession($dest = 'studentcard'){
            session_start();
            $id = $this->getId();
            $_SESSION['id'] = $id;
            header('location: ' . $dest . '.php');
        }

        public function addCardInfo($id){
            $conn = Db::getConnection();
            $statement = $conn->prepare("UPDATE users SET student_card_front = :studentCardFront, student_card_back = :studentCardBack WHERE id = :id");
            $studentCardFront = $this->getStudentCardFront();
            $studentCardBack = $this->getStudentCardBack();
            $statement->bindValue(":studentCardFront", $studentCardFront);
            $statement->bindValue(":studentCardBack", $studentCardBack);
            $statement->bindValue(":id", $id);
            $result = $statement->execute();
            // var_dump($result);
        }

        public function saveCards($fileName1, $fileTmpName1, $fileSize1, $fileName2, $fileTmpName2, $fileSize2){
            $fileTarget1 = 'uploads/studentcards/' . basename($fileName1);
            $fileExtention1 = strtolower(pathinfo($fileTarget1,PATHINFO_EXTENSION));
            
            $fileTarget2 = 'uploads/studentcards/' . basename($fileName2);
            $fileExtention2 = strtolower(pathinfo($fileTarget2,PATHINFO_EXTENSION));

            $check1 = getimagesize($fileTmpName1);
            //Checks if file is an image
            if($check1 !== false) {
                $uploadOk1 = 1;
            } else {
                $errorImage1 = 'Uw geupload bestand is geen afbeelding.';
                $uploadOk1 = 0;
            }
            $check2 = getimagesize($fileTmpName2);
            //Checks if file is an image
            if($check2 !== false) {
                $uploadOk2 = 1;
            } else {
                $errorImage2 = 'Uw geupload bestand is geen afbeelding.';
                $uploadOk2 = 0;
            }

            //Checks if file already exists
            if(file_exists($fileTarget1)) {
                $uploadOk1 = 1;
            }
            //Checks if file already exists
            if(file_exists($fileTarget2)) {
                $uploadOk2 = 1;
            }

            //Checks the file-size
            if($fileSize1 > 2097152) {
                $errorSize1 = 'Je afbeelding is te groot, probeer een kleiner formaat.';
                $uploadOk1 = 0;
            }
            //Checks the file-size
            if($fileSize2 > 2097152) {
                $errorSize2 = 'Je afbeelding is te groot, probeer een kleiner formaat.';
                $uploadOk2 = 0;
            }

            //Allows only JPG, JPEG, PNG and GIF format
            if($fileExtention1 != 'jpg' && $fileExtention1 != 'jpeg' && $fileExtention1 != 'png' && $fileExtention1 != 'gif' && !empty($fileName1)) {
                $errorExtention1 = 'Dit bestandstype wordt niet ondersteund. Probeer een jpg, png of gif.';
                $uploadOk1 = 0;
            }
            //Allows only JPG, JPEG, PNG and GIF format
            if($fileExtention2 != 'jpg' && $fileExtention2 != 'jpeg' && $fileExtention2 != 'png' && $fileExtention2 != 'gif' && !empty($fileName2)) {
                $errorExtention2 = 'Dit bestandstype wordt niet ondersteund. Probeer een jpg, png of gif.';
                $uploadOk2 = 0;
            }

            //Uploads file if no errors occured
            if(($uploadOk1 === 1) && ($uploadOk2 === 1)) {
                if((move_uploaded_file($fileTmpName1, $fileTarget1)) && (move_uploaded_file($fileTmpName2, $fileTarget2))) {
                    return true;
                }
            }
        }

    }