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

    if(!empty($_POST)){
        echo $_POST['gardenpreference'];
        $u->setGardenpreference($_POST['gardenpreference'], $sessionId);
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
<section class="center  bg__light">
<div class="app">
    <div class="progressbar">
        <a href="studentcard.php" class="btn--back"></a>
        <div class="progress">
            <a href="#" class="bar bar--filled"></a>
            <a href="#" class="bar bar--filled"></a>
            <a href="#" class="bar bar--filled"></a>
        </div>
    </div>

    <h2>Voorkeur moestuin</h2>
    <p class="bodyText">Duid uw voorkeur aan. Indien uw voorkeur niet kan worden voldaan maar er wel plaats is in een andere moestuin krijgt u hiervan bericht vooraleer de aanvraag zal worden aanvaardt.</p>

    <form action="" method="POST">
    <div class="form__radio">
        <input type="radio" id="caputsteen" name="gardenpreference" value="1">
        <label for="caputsteen">Samentuin Caputsteenpark</label>
    </div>
    <div class="form__radio">
        <input type="radio" id="tivoli" name="gardenpreference" value="2">
        <label for="tivoli">Samentuin domein Tivoli</label>
    </div>
    <div class="form__radio">
        <input type="radio" id="nopreference" name="gardenpreference" value="1">
        <label for="nopreference">Geen voorkeur</label>
    </div>

        <input type="submit" class="btn btn--form btn--large btn--fixed" value="Aanvraag indienen">
    </form>
    
    <?php if(isset($error)): ?>
        <p class="feedback fail"><?php echo $error ?></p>
    <?php endif; ?>

</div>
</section>
<script src="javascript/addcard.js"></script>
</body>
</html>