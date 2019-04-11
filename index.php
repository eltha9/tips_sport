<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TipSport</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
</head>
<body>
<div class="container-sign-in">
    <div class="content-sign-in">
        <h1>TipSport</h1>
        <h2>La solution pour créer ton programme sportif !</h2>
        <div class="container-solution">
            <div class="section muscle">
                <img src="images/muscle.svg" alt="">
                <span>Des exercices séléctionnés pour ton objectif</span>
            </div>
            <div class="section planning">
                <img src="images/calendar.svg" alt="">
                <span>Un planning complet pour tes entraînements</span>
            </div>
            <div class="section geolocalisation">
                <img src="images/localisation.svg" alt="">
                <span>Tout les bons plans sportifs autour de toi</span>
            </div>
        </div>
        <h3>Connectez-vous !</h3>
        <a href="connection.html" class="button-sign-in js-button-sign-in">Connection</a>
        <div class="blue-mask-picture"></div>
    </div>
</div>

<div class="container-sign-up">
    <div class="content-sign-up">
        <h1>Créer un compte</h1>
        <form action="./view/create_account.php" method="post">   

            <div class="button-sign-up">
                <label for="pseudo">
                    <img src="images/user.svg" alt="">
                </label>
                <input type="text" name="name" id="pseudo" placeholder="nom">
            </div>

            <div class="button-sign-up">
                <label for="email">
                    <img src="images/mail.svg" alt="">
                </label>
                <input type="email" name="mail" id="email" placeholder="mail">
            </div>

            <div class="button-sign-up">
                <label for="password">
                    <img src="images/lock.svg" alt="">
                </label>
                <input type="password" name="psw" id="password" placeholder="mot de passe">
            </div>

            <div class="button-sign-up-submit">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>
</div>


    <script src="js/app.js"></script>
</body>
</html>