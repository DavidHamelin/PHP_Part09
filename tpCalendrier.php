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
        <title> TP Php Partie 09 </title>
        
    </head>
    <body>
        <h1>Php - TP Part 09</h1>

        <form id="methodPostIndex" method="post" action="tpCalendrier.php">
        <div class="row">
            <div class="col s2 offset-s3">
                <label for="month">Choix Mois</label>
                <select name="month" id="month" required >
                    <option value="" disabled selected>Civilité</option>
                    <option value="Mois">
                    <?php
                    // créer tableau puis foreach 
                    ?>
                    </option>
                </select>
            </div>
        </div>
        </form>
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