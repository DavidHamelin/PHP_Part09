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
        <h1>Php - Part 09 - TP</h1>

        <?php
        include('menu.php');
        ?>

        <form id="methodPostIndex" method="post" action="tpCalendrier.php">
            <!-- Test avec attribut HTML  -->
            <div class="row">
                <div class="col s2">
                    <fieldset>
                        <legend>Input de type date </legend>
                        <input type="date"/>
                    </fieldset>
                </div>
                <div class="col s3 offset-s1">
                    <label for="month">Choix du Mois</label>
                    <select name="month" id="month" required >
                        <?php
                        $month = [
                            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                            'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
                        ];

                        foreach($month as $element)
                        {
                            ?>
                            <option value="<?= $element ?>" <?= isset($_POST['month']) && $_POST['month'] == $element ? 'selected' : '' ?>><?= $element ?></option>
                            <?php
                            // echo '<option value="' . $element .'">' . $element . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="col s3">
                    <label for="year">Choix de l'Année</label>
                    <select name="year" id="year" required >
                        <?php
                        foreach(range(date('Y', strtotime('-10 years')), date('Y', strtotime('+10 years'))) as $year)
                        {
                            ?>
                            <option value="<?= $year ?>" <?= isset($_POST['year']) && $_POST['year'] == $year ? 'selected' : '' ?>><?= $year ?></option>
                            <?php
                           /*  echo '<option value="' . $year . '">' . $year . '</option>'; */
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn">Valider</button>
        </form>
        <!-- Calendrier -->
        <?php
            
            if((isset($_POST['month'])) && (isset($_POST['year'])))
            {
                // Vérification de $_POST
                // print_r($_POST);

                $indexOfMonth = (array_search($_POST['month'], $month)+1);
                echo 'index du mois : ' . $indexOfMonth . '<br/>';
                // génération du tableau
                $number = cal_days_in_month(CAL_GREGORIAN, $indexOfMonth, $_POST['year']);
                echo 'nombre de jours : ' . $number . '<br/>';
                echo 'date utilisée : ' . $_POST['month'] . ' ' . $_POST['year'] . '<br/>';
        ?>
        <table class="container">
        <tr>
            <?php
            $daysWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche' ];
            foreach($daysWeek as $week)
            {
                echo '<th>' . $week . '</th>';
            }
            ?>
            
        </tr>
        <tr>
        <?php
                // nombre de jour d'un mois
                $firstDay = '01-'.$indexOfMonth .'-' . $_POST['year'];
                $firstDay = strtotime($firstDay);
                $testDay = date('N',$firstDay);
                $j=1;




                
                for($i = 1; $i < $number + 1 + ($testDay-1); $i++)
                {
                    // $i.$indexOfMonth.$_POST['year']
                    // $incrDate = date($i.'-'.$indexOfMonth.'-'.$_POST['year']);
                    // echo $incrDate . '<br/>';
                    // $incrDate = strtotime($incrDate);
                    // $jour = date('N', $incrDate); // début du mois
                    // if($i === 1 && $jour === 1 ) //// ARRETE ICI LE 19/07/2019
                    // {
                    //     echo '</td> <td>';
                    // }
                    
                    if ($i >= $testDay){
                        echo '<td>' . $j . '</td>';
                        $j++;
                    } else {
                        echo '<td></td>';
                    }

                    if($i % 7 === 0)
                    {
                        echo '</tr> <br/> <tr>';
                    }
                }
                
        ?> 
        </tr>
        </table> 
        <?php
            }

        include('menu.php');
        ?>
        

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