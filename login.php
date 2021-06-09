<?php 
    ini_set('display_errors', true);
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    $u = new User;
    if(!empty($_POST)){
        try {
            $u->setEmail($_POST['email']);
            $u->setPassword($_POST['password']);

            if($u->canLogin($_POST['password'])){
                $id = $u->getIdByEmail();
                $u->setId($id);
                $u->startSession('index');
            }
            
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
    <title>Aanmelden</title>
    <link rel="stylesheet" type="text/css" href="style/reset.css">
    <link rel="stylesheet" type="text/css" href="style/paragraphstyles.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="bg__dark">
<section class="center  bg__light">
<div class="app">
    

    <h2 style="margin-top: 100px;">Aanmelden</h2>
   
    <form action="" method="POST">
        
        <div class="form__input">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="jane@gmail.com">
        </div>
        <div class="form__input">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" placeholder="• • • • • • • •">
        </div>

        <input type="submit" class="btn btn--form" value="Aanmelden">
    </form>

    <?php if(isset($error)): ?>
        <p class="feedback fail"><?php echo $error ?></p>
    <?php endif; ?>

</div>
</section>
</body>
</html>