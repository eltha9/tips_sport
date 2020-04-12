<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TipsSport - Dashboard</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,700&display=swap" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <section class="left-menu">
        <h1>TipsSport</h1>
        <div class="menu">
            <div class="menu__top">
                <a href="#my-stats">Mes statistiques</a>
                <a href="#my-exercices">Mes exercices</a>
                <a href="#my-planning">Planning</a>
                <a href="#carte">Carte</a>
            </div>
            <div class="menu__bottom">
                <a href="/dashboard/exercices">Tout les exercices </a>
                <a href="/disconnect">Déconnection</a>
            </div>
        </div>
    </section>
    <main>
        <?php require('../pages/components/dashboard.home.html');?>
    </main>
</body>
</html>