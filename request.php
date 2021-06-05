<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    session_start();
    if(!isset($_SESSION['id'])) {
        header('location: registerstudent.php');
    } else{
        $u = new User;
        $sessionId = $_SESSION['id'];
        $userdata = User::getUserDataFromId($sessionId);
    }

    if($userdata->approved){
        header('location: approved.php');
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreer als student</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
<section class="center bg__pattern2">
<div class="app">
    
    <h2 class="yellow" style="margin-top: 85px;">Uw aanvraag is verstuurd en zal zo snel mogelijk worden bekeken.</h2>
    <p class="bodyText white">Ging er iets mis of wenst u Racines Malines te contacteren?</p>
    <p class="mail">info@racinesmalines.be</p>
    <p class="phone">0473 862 486</p>
    
    

</div>
</section>
<script src="javascript/addcard.js"></script>
</body>
</html>