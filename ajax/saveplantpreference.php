<?php 
    include_once(__DIR__ . "/../classes/User.php");
    include_once(__DIR__ . "/../classes/Plant.php");
    include_once(__DIR__ . "/../classes/Userplantpreference.php");

    session_start();
    $sessionId = $_SESSION['id'];
    $userdata = User::getUserDataFromId($sessionId);

    if(!empty($_POST)){
        $userplantpref = new Usersplantpreference();
        $userplantpref->setUsersId($_POST['userId']);
        $userplantpref->setPlantsId($_POST['plantId']);
        $userplantpref->setIsChecked($_POST['isChecked']);

        //save()
        if($userplantpref->getIsChecked() == 1){
            $userplantpref->checkPlantPref();
        } else{
            $userplantpref->uncheckPlantPref();
        }

        // success teruggeven
        $response = [
            'status' => 'success',
            'body' => $userplantpref->getPlantsId(),
            'message' => 'Plant pref added'
        ];
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }

