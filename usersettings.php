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


    <h2 class="black marginTop">Instellingen</h2>

    <div class="headerUser flexStart">
        <img class="headerUser__img" src="assets/profilepictures/<?php echo $userdata->profilepicture; ?>" alt="Profiel foto">
        <div class="headerUser__cta">
            <h3 class="marginBottomSmall"><?php echo $userdata->firstname . ' ' . $userdata->lastname; ?></h3>
            <a class="underline" href="editusersettings.php">Wijzig accountgegevens</a>
        </div>
    </div>

    <ul class="settings marginTop">
        <li><a href="#">Verander van moestuin</a></li>
        <li><a href="#">Meldingen</a></li>
        <li><a href="plantpreference.php">Voorkeuren</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <nav class="navbar navbar--fixed">
        <a href="index.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Home</a>
        <a href="tips.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Tips</a>
        <a href="chat.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Chats</a>
        <a href="usersettings.php" class="navbar__btn  navbar__btn--selected"><div class="navbar__btn__icon  navbar__btn--selected"></div>Instellingen</a>
    </nav>

</div>
</section>
</body>
</html>