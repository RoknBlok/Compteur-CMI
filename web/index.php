<?php
function get_nombre_de_personne() {
    $db = new SQLite3("/home/thaha/Documents/Compteur CMI/db.sqlite");

    if (!$db) {
        die("Erreur de connexion à la base de données");
    }
    
    $result = $db->query("SELECT nombre_de_personne FROM compeurDB WHERE id = 1");

    if ($result) {
        $row = $result->fetchArray(SQLITE3_ASSOC); //on récupère le nb de personne dans un tableau associatif

        if ($row) {
            $db->close();

            return $row['nombre_de_personne'];
        }
    }
    $db->close();

    return "Erreur";
}

if(isset($_GET['submit'])) {
    $db = new SQLite3('/home/thaha/Documents/Compteur CMI/db.sqlite');
    
    if (!$db) {
        die("Erreur de connexion à la base de données");
    }
    switch($_GET['submit']) {
        case 'incrementer':
            $db->query("UPDATE compeurDB SET nombre_de_personne = nombre_de_personne + 1 WHERE id=1");
            break;
        case 'decrementer':
            $db->query("UPDATE compeurDB SET nombre_de_personne = nombre_de_personne - 1 WHERE id=1");
            break;
        case 'reset':
            $db->query("UPDATE compeurDB SET nombre_de_personne = 0 WHERE id=1");
            break;
        default:
            break;
    }
    $db->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Compeur CMI</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			function getNombreDePersonne() {
				$.ajax({
					url: 'getNumber.php',
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						$('#nombre_de_personne').html(data.nombre_de_personne);
					}
				});
			}
			setInterval(getNombreDePersonne, 5000);
		});
	</script>
</head>
<body>
	<h1>Nombre de personnes : </h1>
	<?php
        $max = 50;
    ?>
    <h2><span id="nombre_de_personne"><?php echo get_nombre_de_personne(); ?></span>  <?php echo '/ ' . $max ?></h2>
    <progress value="<?php echo get_nombre_de_personne(); ?>" max="<?php echo $max?>"></progress>
    <form action="index.php" method="get">
        <button class="button b-green" type="submit" name="submit" value="incrementer">Incrémenter le compteur</button>
        <br>
        <button class="button b-green" type="submit" name="submit" value="decrementer">Décrémenter le compteur</button>
        <br>
        <button class="button b-green" type="submit" name="submit" value="reset">Reset le compteur</button>
    </form>
</body>
</html>
