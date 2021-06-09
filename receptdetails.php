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

    $id = $_GET['recepie'];
    $r = new Recepie;
    $allDinners = Recepie::getAllDinners();
    $allSnacks = Recepie::getAllSnacks();
    $allRecepies = Recepie::getAllRecepies();
    $recepie = Recepie::getRecepieById($id);

    $ingredients = [
        '1 gele paprika',
        '1 gele courgette',
        '1 biertje',
        'tijm',
        '2 el citroensap',
        'ahornsiroop',
        'pepr en zout',
        '1 rode puntpaprika',
        '1 ronde courgette',
        '1 rode uit',
        'verse oregano',
        '4 el kappertjes',
        'dijonmosterd'
    ]



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
    
    <div class="header--photo header--gradient" style="background-image: linear-gradient(to bottom, rgba(243, 239, 235, 0.62), rgba(243, 239, 235, 0.00), rgba(243, 239, 235, 0.62), rgba(243, 239, 235)), url(assets/<?php echo $recepie['image'];  ?>);">
        <div class="progressbar" style="padding-left: 25px;">
            <a href="recepten.php" class="btn--back btn--back--round" style="left: 50px;"></a>
        </div>

    </div>


    <h1><?php echo $recepie['name']; ?></h1>
    <div class="spaceBetweenElements" style="width: 150px;">
        <span class="secondaryBodyText"><?php echo $recepie['duration'] . ' min'; ?></span>
        <span class="secondaryBodyText"> - </span>
        <span class="secondaryBodyText"><?php echo $recepie['difficulty']; ?></span>
    </div>

    <div class="cardview marginTop">
        <div class="spaceBetweenElements marginBottom--small">
            <h3 class="noMarginBottom">Ingrediënten</h3>
            <div class="spaceBetweenElements">
                <span class="secondaryBodyText noMarginTop btn--plusmin"><span>-</span><span>4</span><span>+</span></span>
                <span class="secondaryBodyText noMarginTop">pers</span>
            </div>
        </div>
            <?php foreach($ingredients as $ingredient): ?>
                <span class="twocolumns marginBottom--small"><?php echo $ingredient; ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="cardview--numbered--one">
        <p>Verwarm de oven voor op 200°C. Snij de gele paprika in dikke repen en de puntpaprika in grove stukken. Verwijder telkens de zaadlijst. Snij de rest van de groenten eveneens in grove stukken. Leg ze in een bakschaal. Besprenkel met olijfolie, peper en zout. Leg enkele takjes tijm erbovenop en zet 40 minuten in de oven.</p>
    </div>
    <div class="cardview--numbered--two">
        <p>Snij de biet in flinterdunne schijfjes. Hussel intussen het citroensap, de kappertjes, de ahornsiroop, de mosterd, 2 eetlepels olie en 1/2 koffielepel zout door elkaar tot vinaigrette.</p>
    </div>
    <div class="cardview--numbered--three">
        <p>Schik de biet op een groot bord. Giet de dressing over de geroosterde groenten van zodra ze uit de oven komen. Roer goed, kruid eventueel nog met peper en zout en stort het geheel over de plakjes snijbiet. Werk af met wat verse oregano.</p>
    </div>


    <nav class="navbar" style="padding: 50px;">
        <a href="index.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Home</a>
        <a href="tips.php" class="navbar__btn navbar__btn--selected"><div class="navbar__btn__icon navbar__btn--selected"></div>Tips</a>
        <a href="chat.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Chats</a>
        <a href="settings.php" class="navbar__btn"><div class="navbar__btn__icon"></div>Instellingen</a>
    </nav>

</div>
</section>
</body>
</html>