<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title> Php Partie 09 </title>
        
    </head>
    <body>
        <h1>Php - Part 09</h1>
        <?php
        include('menu.php');
        ?>

        <?php
            // Ex 01
            // Afficher la date courante en respectant 
            // la forme jj/mm/aaaa (ex : 16/05/2016)
            $dateEx01 = date('d/m/Y');
            echo "Ex 01 : " . $dateEx01 . '<br/>';

            // Ex 02
            // Afficher la date courante en respectant 
            // la forme jj-mm-aa (ex : 16-05-16)
            $dateEx02 = date('d-m-Y');
            echo "Ex 02 : " . $dateEx02 . '<br/>';

            // Ex 03
            // Afficher la date courante avec le jour de la semaine et
            // le mois en toutes lettres (ex : mardi 2 août 2016)
            // Bonus : Le faire en français.
            echo '<p> Ex 03 </p>';
            setlocale(LC_TIME, 'fr_FR.utf8'); // pour server LAMP
            // setlocale(LC_TIME, 'fr_FR.utf8','fra');
            // setlocale(LC_TIME, 'fra_fra'); // pour server WAMP
            // setlocale(LC_TIME, "fr_FR", "French");
            // setlocale(LC_TIME, "fr_FR", 'fr_FR.ISO8859-1');
            echo strftime('%A %d %B %G');

            // Ex 04
            // Afficher le timestamp du jour.
            echo '<p> Ex 04 </p>';
            echo time() . '<br/>';
            // Afficher le timestamp du mardi 2 août 2016 à 15h00.
            $datetime = new DateTime('2016-08-02 15:00');
            echo $datetime->getTimestamp();

            // Ex 05
            // Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.
            echo '<p> Ex 05 </p>';
            $date1 = date('d-m-Y');
            echo 'date du jour : ' . $date1 . '<br/>';
            $date2 = date('16-05-2016');
            // $date2 = new DateTime('16-05-2016 00:00'); // comment faire en objet ???
            echo 'date ultérieure : ' . $date2 . '<br/>';
            // On transforme les 2 dates en timestamp
            $date1 = strtotime($date1);
            $date2 = strtotime($date2);
            
            // On récupère la différence de timestamp entre les 2 précédents
            $nbJoursTimestamp = $date2 - $date1;
            
            // ** Pour convertir le timestamp (exprimé en secondes) en jours **
            // On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
            $nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24
            echo "Nombre de jours : ".$nbJours;

            // Ex 06
            // Afficher le nombre de jour dans le mois de février de l'année 2016.
            echo '<p> Ex 06 </p>';
            $date1 = date('01-03-2016');
            echo 'date du jour : ' . $date1 . '<br/>';
            $date2 = date('01-02-2016');
            echo 'date ultérieure : ' . $date2 . '<br/>';
            // On transforme les 2 dates en timestamp
            $date1 = strtotime($date1);
            $date2 = strtotime($date2);
            // On récupère la différence de timestamp entre les 2 précédents
            $nbJoursTimestamp = $date2 - $date1;
            // ** Pour convertir le timestamp (exprimé en secondes) en jours **
            // On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
            $nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24
            echo "Nombre de jours : ".$nbJours;

            // SOLUTION DE STEPHANE : 
            $number = cal_days_in_month(CAL_GREGORIAN, 2, 2016); // 31
            echo "There were {$number} days in February 2016";

            // Ex 07
            // Afficher la date du jour + 20 jours.
            echo '<p> Ex 07 </p>';
            $today = date('d-m-Y');
            $today = strtotime($today);
            $jourPlus20 = $today + 1728000; // 1728000 = 20*86400
            echo 'Date du jour plus 20 jours = ' . date('d-m-Y', $jourPlus20) . '<br/>';
            // Autre solution plus rapide :
            echo 'Date du jour plus 20 jours avec +20days = ' . date('d-m-Y', strtotime('+20 days'));

            // Ex 08
            // Afficher la date du jour - 22 jours
            echo '<p> Ex 08 </p>';
            echo 'Date du jour moins 20 jours avec -20days = ' . date('d-m-Y', strtotime('-20 days'));

        ?>
        <br/>
        <br/>
            <!-- jQuery -->
            <script
                src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
                crossorigin="anonymous">
            </script>
            <!-- Materialize JS -->
            <script 
                src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
            </script>
            <!-- Script pour dropdownList Materialize -->
            <script>
                $(document).ready(function(){
                $('select').formSelect();
                });
            </script>
    </body>
</html>