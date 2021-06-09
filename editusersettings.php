<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    session_start();
    if(!isset($_SESSION['id'])) {
        header('location: registerstudent.php');
    } else{
        $sessionId = $_SESSION['id'];
        $userdata = User::getUserDataFromId($sessionId);
    }
        

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instellingen wijzigen</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
<section class="center  bg__light">
<div class="app">
    <div class="progressbar">
        <a href="registerstudent.php" class="btn--back"></a>
        <div class="progress">
            <a href="#" class="bar bar--filled"></a>
            <a href="#" class="bar bar--filled"></a>
            <a href="#" class="bar"></a>
        </div>
    </div>

    <h2>Studentenkaart</h2>
    <p class="bodyText">Maak een foto van de voor en achterzijde van je studentenkaart zodat we deze kunnen verifiëren.</p>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="uploadzone">
            <h3>Voorkant</h3>
            <figure class="prevContainer">
                <img class="prev" src="assets/emptystate_foto.png" alt="">
            </figure>
            <input type="file" class="addStudentCard" id="addStudentCardFront" name="addStudentCardFront">
        </div>
        <div class="uploadzone">
            <h3>Achterkant</h3>
            <figure class="prevContainer">
                <img class="prev" src="assets/emptystate_foto.png" alt="">
            </figure>
            <input type="file" class="addStudentCard" id="addStudentCardBack" name="addStudentCardBack">
        </div>
        
        <input type="submit" class="btn btn--form" value="Volgende" name="submitStudentCard">
    </form>

    <?php if(isset($error)): ?>
        <p class="feedback fail"><?php echo $error ?></p>
    <?php endif; ?>

</div>
</section>
<script src="javascript/addcard.js"></script>
</body>
</html>