<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Informations principales</title>
        <link type="text/css" rel="stylesheet" href="styles/reset.css">
        <link type="text/css" rel="stylesheet" href="styles/style.css">
    </head>
    
    <body>
        <div class="tipSport">
            <h1>TipSport</h1>
        </div>
        <div class="titles">
            <h2 class="gothLight">1 / 3</h2>
            <h3>Informations principales</h3>
        </div>

        <form action="#" method='post'>
            
            <div class="birth">
                <label class="gothMed" for="Date de naissance">Date de naissance</label>
                <input class="gothLight" type="date" name="" id="date" value="birth"></input>
            </div>

            <div class="gender">
                <label class="gothMed" for="genre">Sexe</label>
                <div class="ladyMan">
                    <input class="gothLight" type="button" name="" id="gender" value="homme"></input>
                    <input class="gothLight" type="button" name="" id="gender" value="femme"></input>
                </div>
            </div>

            <div class="height">
                <label class="gothMed" for="height">Taille (cm)</label>
                <input class="gothLight" type="number" name="cm" id="cm" value="cm"></input>
            </div>

            <div class="weight">
                <label class="gothMed" for="weight">Poids (kg)</label>
                <input class="gothLight" type="number" name="kg" id="kg" value="kg"></input>
            </div>
        </form>

            <div class="problems">
                <ul>
                    <li>
                        <input class="gothLight" type="checkbox" name="" id="" value=""></input>
                        <label class="gothLight" for="weight">Asthme</label>
                    </li>
                    <li>
                        <input class="gothLight" type="checkbox" name="" id="" value=""></input>
                        <label class="gothLight" for="weight">Problèmes d'articulation</label>
                    </li>
                    <li>
                        <input class="gothLight" type="checkbox" name="" id="" value=""></input>
                        <label class="gothLight" for="weight">Douleurs musculaires</label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="next">
            <a href=""><button class="gothMed">Suivant</button></a>
        </div>

        <div class="container">
            <div class="progress">
                <div class="bar"></div>
            </div>
        </div>


        <script src="scripts/app.js"></script>
    </body>
</html>