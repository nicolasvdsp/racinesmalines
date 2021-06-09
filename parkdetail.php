<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");
    include_once(__DIR__ . "/classes/Plant.php");
    include_once(__DIR__ . "/classes/Usersplantspreference.php");

    session_start();
    $sessionId = $_SESSION['id'];
    $userdata = User::getUserDataFromId($sessionId);  
    // $userdata = User::getUserDataFromId(28);  

    $p = new Plant;
    $allPlants = $p->getAllPlants();

    $u = new User;

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

<span style="color:white"><?php echo 'Name: ' . $userdata->firstname . '  -  ID: ' . $sessionId; ?></span>

<body class="bg__dark">
<section class="center  bg__light">
<div class="app">

    

    <div class="progressbar">
        <a href="index.php" class="btn--back"></a>
    </div>

    <h2 class="black"><?php echo $userdata->garden_name ?></h2>
    
   <div class="cardview bg--caputsteen"></div>
   <div class="cardview bg--caputsteen--map redirect">
       <h3><?php echo $userdata->garden_street . ' ' . $userdata->garden_houseNumber . ',<br>' . 2800 . $userdata->garden_city; ?></h3>
   </div>

    <nav class="navbar">
        <a href="index.php" class="navbar__btn navbar__btn--selected"><div class="navbar__btn__icon navbar__btn--selected"></div>Home</a>
        <a href="tips.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Tips</a>
        <a href="chat.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Chats</a>
        <a href="usersettings.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Instellingen</a>
    </nav>

</div>
</section>
<script>
    let card = document.querySelector('.redirect');
    card.addEventListener('click', (e) => {
        location.replace("https://www.google.com/maps/place/<?php echo $userdata->garden_street; ?>+<?php echo $userdata->garden_houseNumber; ?>,+<?php echo $userdata->garden_city; ?>");
        
    })
</script>
</body>
</html>