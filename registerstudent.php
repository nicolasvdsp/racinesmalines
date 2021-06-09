<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    $u = new User;
    if(!empty($_POST)){
        try {
            $u->setFirstname($_POST['firstname']);
            $u->setLastname($_POST['lastname']);
            $u->setEmail($_POST['email']);
            $u->setPassword($_POST['password']);
            $u->setSchool($_POST['school']);
            $u->setStudentNumber($_POST['studentnumber']);
            // $u->setStudentCardFront($_POST['studentcardfront']);
            // $u->setStudentCardBack($_POST['studentcardback']);
            $u->registerStudent();
            $id = $u->getIdByEmail();
            $u->setId($id);
            $user = User::getUserDataFromId($id);
            // var_dump($user);
            $u->startSession();
            
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
    <title>Registreer als student</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
<section class="center  bg__light">
<div class="app">
    <div class="progressbar">
        <a href="intro.php" class="btn--back"></a>
        <div class="progress">
            <a href="#" class="bar bar--filled"></a>
            <a href="#" class="bar"></a>
            <a href="#" class="bar"></a>
        </div>
    </div>

    <h2>Aanvraag indienen</h2>
    <p class="bodyText">Dien een aanvraag in. Eenmaal deze geaccepteerd is krijg je toegang tot de beveiligde moestuin.</p>

    <div>
        <div class="togglemenu">
            <a href="#" class="togglemenu__left togglemenu__selected">Student</a>
            <a href="#" class="togglemenu__right">Niet-student</a>
        </div>
        <p class="info">Geen lidgeld, engagement van ongeveer 1 keer per week in schoolperiodes</p>
        
    </div>

    <form action="" method="POST">
        <div class="form__input">
            <label for="firstname">Voornaam</label>
            <input type="text" id="firstname" name="firstname" placeholder="John">
        </div>
        <div class="form__input">
            <label for="lastname">Achternaam</label>
            <input type="text" id="lastname" name="lastname" placeholder="Dhoe">
        </div>
        <div class="form__input">
            <label for="school">Onderwijsinstelling</label>
            <select name="school" id="school">
                <option value="Thomas More Mechelen">Thomas More Mechelen</option>
                <option value="busleydenatheneum">Busleyden Atheneum</option>
            </select>
        </div>
        <div class="form__input">
            <label for="studentnumber">Studentennummer</label>
            <input type="text" id="studentnumber" name="studentnumber" placeholder="r0759873">
        </div>
        <div class="form__input">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="jane@gmail.com">
        </div>
        <div class="form__input">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" placeholder="• • • • • • • •">
        </div>

        <input type="submit" class="btn btn--form" value="Volgende">


    </form>






    <?php if(isset($error)): ?>
        <p class="feedback fail"><?php echo $error ?></p>
    <?php endif; ?>

</div>
</section>
</body>
</html>