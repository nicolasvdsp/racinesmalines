<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");
    include_once(__DIR__ . "/classes/Recepie.php");

    $u = new User;
    session_start();
    $sessionId = $_SESSION['id'];
    $userdata = User::getUserDataFromId($sessionId);

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
<section class="center bg__white">
<div class="app">


  


    <nav class="navbar" style="padding: 50px;">
        <a href="index.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Home</a>
        <a href="tips.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Tips</a>
        <a href="chat.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Chats</a>
        <a href="usersettings.php" class="navbar__btn  navbar__btn--selected"><div class="navbar__btn__icon  navbar__btn--selected"></div>Instellingen</a>
    </nav>

</div>
</section>
</body>
</html>