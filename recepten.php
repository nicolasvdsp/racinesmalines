<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");
    include_once(__DIR__ . "/classes/Recepie.php");

    $u = new User;
    session_start();
    $sessionId = $_SESSION['id'];
    $userdata = User::getUserDataFromId($sessionId);  
    // $userdata = User::getUserDataFromId(28);  

    $r = new Recepie;
    $allDinners = Recepie::getAllDinners();
    $allSnacks = Recepie::getAllSnacks();

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

    <div class="togglemenu" style="margin-top: 68px;">
        <a href="tips.php" class="togglemenu__left">Tutorials</a>
        <a href="recepten.php" class="togglemenu__right togglemenu__selected">Recepten</a>
    </div>

    <h2 class="black marginTop">Recepten</h2>
    <p>Enkele recepten die je kan maken met je groenten en fruit die momenteel in de moestuin zijn.</p>

    <div>
        <h3 class="black">Gerechten met je groenten</h3>
        <div class="verticalScroll">
            <?php foreach($allDinners as $dinner): ?>
            <a href="receptdetails.php?recepie=<?php echo $dinner['id']; ?>">
                <div class="cardview--recept inlineblock">
                    <div class="cardview--square" style="background-image: url(assets/<?php echo $dinner['image'];  ?>);"></div>      
                    <div class="cardview__info">
                        <h4 class="alignC"><?php echo $dinner['name']; ?></h4>
                        <div class="spaceBetweenElements">
                            <span class="secondaryBodyText"><?php echo $dinner['duration'] . ' min'; ?></span>
                            <span class="secondaryBodyText"> - </span>
                            <span class="secondaryBodyText"><?php echo $dinner['difficulty']; ?></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        
        <h3 class="black">Snacks met je groenten</h3>
        <div class="verticalScroll">
            <?php foreach($allSnacks as $snack): ?>
            <a href="receptdetails.php?recepie=<?php echo $snack['id']; ?>">    
            <div class="cardview--recept inlineblock">
                <div class="cardview--square" style="background-image: url(assets/<?php echo $snack['image'];  ?>);"></div>      
                <div class="cardview__info">
                    <h4 class="alignC"><?php echo $snack['name']; ?></h4>
                    <div class="spaceBetweenElements">
                        <span class="secondaryBodyText"><?php echo $snack['duration'] . ' min'; ?></span>
                        <span class="secondaryBodyText"> - </span>
                        <span class="secondaryBodyText"><?php echo $snack['difficulty']; ?></span>
                    </div>
                </div>
            </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>



    <nav class="navbar">
        <a href="index.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Home</a>
        <a href="tips.php" class="navbar__btn navbar__btn--selected"><div class="navbar__btn__icon navbar__btn--selected"></div>Tips</a>
        <a href="chat.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Chats</a>
        <a href="settings.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Instellingen</a>
    </nav>

</div>
</section>
<script>
    // let recepie = document.querySelector('.cardview--square');
    // let img = recepie.dataset.backgroundimage;
    // recepie.style.backgroundImage = `url('assets/${img}')`
    // // recepie.style.backgroundColor = 'red';


</script>
</body>
</html>