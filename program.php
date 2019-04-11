
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Informations principales</title>
        <link type="text/css" rel="stylesheet" href="styles/reset.css">
        <link type="text/css" rel="stylesheet" href="styles/program.css">
    </head>
    
    <body>
        <div class="tipSport">
            <h1>TipSport</h1>
        </div>

        <form action="home.php" method='post'>
            <section class="first " >
                <div class="titles">
                    <h2 class="gothLight">1 / 3</h2>
                    <h3>Informations principales</h3>
                </div>

                <div class="birth">
                    <label class="gothMed" for="Date de naissance">Date de naissance</label>
                    <input class="gothLight" type="date" name="age" id="date" value="">
                </div>

                <div class="gender">
                    <label class="gothMed" for="genre">Sexe</label>
                    <div class="ladyMan">
                        <label >
                            Homme
                            <input class="gothLight" type="radio" name="sexe" id="gender" value="homme">
                        </label>
                        <label>
                            Femme
                            <input class="gothLight" type="radio" name="sexe" id="gender" value="femme">
                        </label>
                    </div>
                </div>

                <div class="height">
                    <label class="gothMed" for="height">Taille (cm)</label>
                    <input class="gothLight" type="number" name="taille" id="cm" value="">
                </div>

                <div class="weight">
                    <label class="gothMed" for="weight">Poids (kg)</label>
                    <input class="gothLight" type="number" name="poids" id="kg" value="">
                </div>
            

                <div class="problems">
                    <ul>
                        <li>
                            <input class="gothLight" type="checkbox" name="health[]" id="" value="asme">
                            <label class="gothLight" for="weight">Asthme</label>
                        </li>
                        <li>
                            <input class="gothLight" type="checkbox" name="health[]" id="" value="articulations">
                            <label class="gothLight" for="weight">Problèmes d'articulation</label>
                        </li>
                        <li>
                            <input class="gothLight" type="checkbox" name="health[]" id="" value="muscles">
                            <label class="gothLight" for="weight">Douleurs musculaires</label>
                        </li>
                    </ul>
                </div>
            
            

                <div class="next">
                    <button class="gothMed first-button">Suivant</button>
                </div>
            </section>

            <section class="second hidden" >
                <div class="titles">
                    <h2 class="gothLight">2 / 3</h2>
                    <h3>Vos objectifs</h3>
                </div>
        
                <div class="icons">
                    <p class="gothMed">Quel est votre objectif sportif ?</p>
        
                    <div class="iconsImg">
                    <input class="hidden-objectif" type="hidden" name="objectif" value="">
                        <div class="pdm object-button" >
                            
                            <img data-type="Prise de masse" src="images/undraw_healthy_habit_bh5w.svg" alt="">
                            <p class="gothLight">Prise de masse</p>
                        </div>
                        <div class="cardio object-button" >
                            <img data-type="Cardio" src="images/undraw_finish_line_katerina_limpitsouni_xy20.svg" alt=""> 
                            <p class="gothLight">Cardio</p>
                        </div>
                        <div class="pdp object-button" >
                            <img data-type="Renforcement" src="images/undraw_personal_trainer_ote3.svg" alt="">
                            <p class="gothLight">Perte de poids</p>
                        </div>
                    </div>
                </div>
        
                <div class="bodyPart" class="formCenter">
                    <p class="gothMed">Quelle partie du corps souhaitez vous cibler ?</p>
        
                    
                    <input class="gothLight mscl" type="checkbox" name="muscles[]" value="Bras">
                    <label class="gothLight" for="">bras</label>
                    
                    <input class="gothLight mscl" type="checkbox" name="muscles[]" value="Jambes">
                    <label class="gothLight" for="">jambes</label>
                    
                    <input class="gothLight mscl" type="checkbox" name="muscles[]" value="Abdos">
                    <label class="gothLight" for="">abdos</label>
                    
                    <input class="gothLight mscl" type="checkbox" name="muscles[]" value="Dos">
                    <label class="gothLight" for="">dos</label>
                    
                    <input class="gothLight mscl" type="checkbox" name="muscles[]" value="Pectoraux">
                    <label class="gothLight" for="">pectoraux</label>
                    
                    <input class="gothLight all" type="checkbox" name="muscles[]" value="All">
                    <label class="gothLight" for="">corps entier</label>
                        
                    
                </div>
        
                <div class="next">
                    <button class="gothMed second-button">Suivant</button>
                </div>
            </section>

            <section class="third hidden" >
                    <div class="titles">
                            <h2 class="gothLight">3 / 3</h2>
                            <h3>Votre planning</h3>
                        </div>
                
                        <div class="days" class="formCenter">
                            <p class="gothMed">Quel(s) jour(s) pouvez-vous vous entraîner ?</p>
                
                            <input class="gothLight" type="checkbox" name="day[]" value="lundi">
                            <label class="gothLight">Lundi</label>
                            
                            <input class="gothLight" type="checkbox" name="day[]" value="mardi">
                            <label class="gothLight">Mardi</label>
                            
                            <input class="gothLight" type="checkbox" name="day[]" value="mercredi">
                            <label class="gothLight">Mercredi</label>
                            
                            <input class="gothLight" type="checkbox" name="day[]" value="jeudi">
                            <label class="gothLight">Jeudi</label>
                            
                            <input class="gothLight" type="checkbox" name="day[]" value="vendredi">
                            <label class="gothLight">Vendredi</label>
                            
                            <input class="gothLight" type="checkbox" name="day[]" value="samedi">
                            <label class="gothLight">Samedi</label>                 
     
                            <input class="gothLight" type="checkbox" name="day[]" value="dimanche">
                            <label class="gothLight">Dimanche</label>  

                        </div>
                
                        <div class="time" class="formCenter">
                            <p class="gothMed">Combien de temps par jour pouvez-vous consacrer au sport ?</p>
            
                            <input class="gothLight" type="radio" name="time" value="30">
                            <label class="gothLight"> - de 30min </label>
                            
                            <input class="gothLight" type="radio" name="time" value="60">
                            <label class="gothLight">30min - 1h30</label>
                            
                            <input class="gothLight" type="radio" name="time" value="120">
                            <label class="gothLight">1h30 - 3h</label>                  
                        
                        </div>
            
                        <div class="next">
                            <button class="gothMed"><input type="submit" value="valider"></button>
                        </div>
            </section>
        </form> 
        <div class="container">
            <div class="progress">
                <div class="bar"></div>
            </div>
        </div>


        <script src="scripts/program.js"></script>
    </body>
</html>
