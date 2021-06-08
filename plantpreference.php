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
        <a href="settings.php" class="btn--back"></a>
    </div>

    <h2 class="black">Plant voorkeuren</h2>
    <p class="pTitle">Kies de groenten en fruit waar je hulp mee wilt</p>
    
    <div class="checkboxes">        
        <?php foreach($allPlants as $plant): ?>
            <div class="form__input--twocolumns">
                <?php if(Usersplantpreference::isBoxChecked($sessionId, $plant->id) === 1): ?>    
                    <input type="checkbox" class="prefCheckbox" id="<?php echo strtolower($plant->name); ?>" name="<?php echo strtolower($plant->name); ?>" value="<?php echo $plant->name; ?>" data-userid="<?php echo $sessionId; ?>" data-plantid="<?php echo $plant->id; ?>" data-ischecked="<?php echo Usersplantpreference::isBoxChecked($sessionId, $plant->id); ?>" checked>
                <?php else: ?>
                    <input type="checkbox" class="prefCheckbox" id="<?php echo strtolower($plant->name); ?>" name="<?php echo strtolower($plant->name); ?>" value="<?php echo $plant->name; ?>" data-userid="<?php echo $sessionId; ?>" data-plantid="<?php echo $plant->id; ?>" data-ischecked="<?php echo Usersplantpreference::isBoxChecked($sessionId, $plant->id); ?>">
                <?php endif; ?>
                <label for="<?php echo strtolower($plant->name) ?>"><?php echo $plant->name; ?></label>
            </div>    
        <?php endforeach; ?>
    </div>
    
    <p class="pTitle">We raden aan</p>
    <div class="cardview">
        <h3>Courgettes</h3>
        <p>Momenteel is het het seizoen van de courgetten, als je ze nu plant zijn ze binnen 3 maanden klaar voor de oogst.</p>
        <h3>Wortels</h3>
        <p>Momenteel is het het seizoen van de wortels, als je ze nu plant zijn ze binnen 2 maanden klaar voor de oogst.</p>

    </div>

    <nav class="navbar">
        <a href="index.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Home</a>
        <a href="tips.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Tips</a>
        <a href="chat.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Chats</a>
        <a href="settings.php" class="navbar__btn navbar__btn--selected"><div class="navbar__btn__icon navbar__btn--selected"></div>Instellingen</a>
    </nav>

</div>
</section>
<script src="ajax/saveplantpreference.js"></script>
</body>
</html>