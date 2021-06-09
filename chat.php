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
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
<section class="center  bg__light">
<div class="app">
    <h1 class="marginTop">Chat</h1>
    <p>Deze mensen verwelkomen je graag in de moestuin. Stuur ze gerust een berichtje.</p>

    <a href="#"><div class="headerUser flexStart borderBottom">
        <img class="headerUser__img" src="assets/profilepictures/yasmine.png" alt="Profiel foto">
        <div class="headerUser__cta">
            <h3 class="noMarginBottom">Yasmine van Cutsem</h3>
            <span class="secondaryBodyText">Verantwoordelijke moestuin Caputsteen</span>
        </div>
    </div></a>

    <a href="#"><div class="headerUser flexStart">
        <img class="headerUser__img" src="assets/profilepictures/jean.png" alt="Profiel foto">
        <div class="headerUser__cta">
            <h3 class="noMarginBottom">Jean Vanhoebeecke</h3>
            <span class="secondaryBodyText">Medewerker moestuin Caputsteen</span>
        </div>
    </div></a>

    <p class="borderBottom marginTopBig">Recente chats</p>

    <div class="cardview">
        <h3 class="alignC">Nog geen recente chats</h3>
        <p class="alignC">Vind mensen om mee te chatten uit je moestuin-community</p>
        <input type="text" placeholder="zoek personen">
    </div>

    <nav class="navbar navbar--fixed">
        <a href="index.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Home</a>
        <a href="tips.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Tips</a>
        <a href="chat.php" class="navbar__btn navbar__btn--selected"><div class="navbar__btn__icon navbar__btn--selected"></div>Chats</a>
        <a href="usersettings.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Instellingen</a>
    </nav>
</div>
</section>
<script src="javascript/addcard.js"></script>
</body>
</html>