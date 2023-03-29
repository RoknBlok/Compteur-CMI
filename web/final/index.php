<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="css-circular-prog-bar.css" media="all" rel="stylesheet" />
    <title>Acceuil</title>
</head>
<body>
    <h2>ACCEUIL</h2>
    <br>
    <?php
        include('getNumberByID.php');

        $nombreID = getNumberOfID();
        echo $nombreID;
        for ($i=0; $i < 1; $i++) {
            echo '<div class="progress-circle p'.get_p_nb_de_personne($id).'"><span>'.get_p_nb_de_personne($i).'%</span><div class="left-half-clipper"><div class="first50-bar"></div><div class="value-bar"></div></div></div>';
        }
    ?>
</div>
</div>
</body>
</html>