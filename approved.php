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

    if(!$userdata->approved){
        header('location: request.php');
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
<section class="center bg__green bg__pattern3">
<div class="app">
    
    <h1 class="white" style="margin-top: 505px;">De aanvraag werd aanvaard!</h1>
    <p class="bodyText white">U heeft nu toegang tot de moestuin in het <span class="yellow bold"><?php echo $userdata->garden_preference; ?>, Mechelen</span></p>
    <a href="intro.php" class="btn btn--white">Let's start</a>
    

</div>
</section>
<script src="javascript/addcard.js"></script>
</body>
</html>