<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    $u = new User;
    if(!empty($_POST)){
        try {
            $u->setEmail($_POST['email']);
            $u->setPassword($_POST['password']);

            if($u->canLogin($_POST['password'])){
                $id = $u->getIdByEmail();
                $u->setId($id);
                $u->startSession('index');
            }
            
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }        

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
<section class="center  bg__light">
<div class="app">
    

    <h2 style="margin-top: 100px;">Index</h2>
   
    <div class="cardview" style="padding-bottom: 24px;">
        <h3 class="btnSpaceBefore">Navigeer naar de moestuin</h3>
        <a href="https://www.google.be" class="btn btn--green btn--margin maps">Navigeer met Maps</a>
    </div>
    <a class="cardview cardview--connect btn--max"><h3 class="white alignC">Maak kennis met leden uit je moestuin</h3></a>
    <div class="cardview">
        <h3 class="btnSpaceBefore">Open de poort van de moestuin</h3>
        <a href="#" class="btn btn--green btn--margin lock">Ontgrendel</a>
        <p class="info" style="margin-bottom: 0px;">Momenteel op slot</p>
    </div>
    <div class="cardview">
        <h3>Kies zaden die je gaat planten</h3>
        <p class="info" style="margin-bottom: 0px;">Als je deze informatie invult krijg je betere suggesties in de app</p>
    </div>

    <nav class="navbar">
        <a href="index.php" class="navbar__btn">Home</a>
        <a href="tips.php" class="navbar__btn">Tips</a>
        <a href="chat.php" class="navbar__btn">Chats</a>
        <a href="settings.php" class="navbar__btn">Instellingen</a>
    </nav>

</div>
</section>
</body>
</html>