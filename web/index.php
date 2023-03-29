<?php
include('final/getNumberByID.php');

if(isset($_GET['submit'])) {
    $db = new SQLite3('db.sqlite');
    
    if (!$db) {
        die("Erreur de connexion à la base de données");
    }
    switch($_GET['submit']) {
        case 'incrementer':
            $db->query("UPDATE compeurDB SET nombre_de_personne = nombre_de_personne + 1 WHERE id=1");
            header('Location: index.php');
            break;
        case 'decrementer':
            $db->query("UPDATE compeurDB SET nombre_de_personne = nombre_de_personne - 1 WHERE id=1");
            header('Location: index.php');            
            break;
        case 'reset':
            $db->query("UPDATE compeurDB SET nombre_de_personne = 0 WHERE id=1");
            header('Location: index.php');
            break;
        default:
            header('Location: index.php');
            break;
    }
    $db->close();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
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
        $id = 1;
    ?>
    <h2><span id="nombre_de_personne"><?php echo get_nombre_de_personne($id); ?></span>  <?php echo '/ ' . $max ?></h2>
    <progress value="<?php echo get_nombre_de_personne($id); ?>" max="<?php echo $max?>"></progress>
    <form action="index.php" method="get">
        <button class="button b-green" type="submit" name="submit" value="incrementer">Incrémenter le compteur</button>
        <br>
        <button class="button b-green" type="submit" name="submit" value="decrementer">Décrémenter le compteur</button>
        <br>
        <button class="button b-green" type="submit" name="submit" value="reset">Reset le compteur</button>
    </form>
</body>
</html>
