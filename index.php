<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    $u = new User;
    session_start();
    $sessionId = $_SESSION['id'];
    $userdata = User::getUserDataFromId($sessionId);  
    // $userdata = User::getUserDataFromId(28);  

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

    <div class="logo--header">
        <img src="assets/logo_racinesmalines.svg" alt="Logo Racines Malines">
        <a href="parkdetail.php">Lid <span class="underline"><?php echo $userdata->garden_name; ?></span></a>
    </div>

    <h3 class="black marginBottom" style="margin-bottom: 30px;">Welkom <?php echo $userdata->firstname; ?></h3 class="black">
   
    <div class="cardview" style="padding-bottom: 24px;">
        <h3 class="btnSpaceBefore">Navigeer naar de moestuin</h3>
        <a href="https://www.google.com/maps/dir/Mechelen/<?php echo $userdata->garden_street; ?>+<?php echo $userdata->garden_houseNumber; ?>,+<?php echo $userdata->garden_city; ?>" class="btn btn--green btn--margin maps" data-gardenname="<?php echo $userdata->garden_name; ?>" data-gardencity="<?php echo $userdata->garden_city; ?>" data-gardenstreet="<?php echo $userdata->garden_street; ?>" data-gardenhousenumber="<?php echo $userdata->garden_houseNumber; ?>">Navigeer met Maps</a>
    </div>
    <a class="cardview cardview--connect btn--max"><h3 class="white alignC">Maak kennis met leden uit je moestuin</h3></a>
    <div class="cardview">
        <h3 class="btnSpaceBefore">Open de poort van de moestuin</h3>
        <a href="#" class="btn btn--green btn--margin lock">Ontgrendel</a>
        <p class="info changeinfo" style="margin-bottom: 0px;">Momenteel op slot</p>
    </div>
    <div class="cardview redirect">
        <h3>Kies zaden die je gaat planten</h3>
        <p class="info" style="margin-bottom: 0px;">Als je deze informatie invult krijg je betere suggesties in de app</p>
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
    let lock = document.querySelector('.lock');
    let msg = document.querySelector('.changeinfo');

    lock.addEventListener('click', (e) => {
        e.preventDefault();
        console.log('open');
        lock.innerText = 'sluiten';
        lock.style.color = '#13171a';
        lock.style.backgroundColor = '#ffbf46';
        msg.innerHTML = `Sluit over 5 seconden`;

            let i = 5;
            

            var a = setInterval(() => {
                console.log(i);
                i--;
                msg.innerHTML = `Sluit over ${i} seconden`;
                
                if(i == 0){
                    clearInterval(a);

                    console.log('close');
                    lock.innerText = 'Ontgrendel';
                    lock.style.color = '#fff9fc';
                    lock.style.backgroundColor = '#1ca078';
                    msg.innerHTML = 'Momenteel op slot'
                }
            }, 1000)

    })


    let card = document.querySelector('.redirect');
    card.addEventListener('click', (e) => {
        location.replace("plantpreference.php")
        
    })
</script>
<script src="javascript/location.js"></script>
</body>
</html>