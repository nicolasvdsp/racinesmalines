<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");

$u = new User;


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
    <section class="center bg__pattern1">
        <div class="app">
            <div class="intro">
                <h3 class="white">Welkom bij Racines Malines.</h3>
                <p class="bodyText white" style="margin-bottom: 50px;">Een platform dat je helpt met het zaaien en oogsten van je eigen bio groenten en -fruit.  Ga samen met kotstudenten en Mechelaars aan de slag, bouw een community op en geniet van alle groene lekkernijen.</p>
            </div>
            <a href="registerstudent.php" class="btn btn--yellow">Schrijf je in</a>
            <a href="login.php" style="margin-left:10px" class="white--60 underline">Login</a>
        </div>
    </section>
</body>
</html>