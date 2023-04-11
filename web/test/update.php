<?php
$nombre = 0;
$nombreint = intval($nombre);
$db = new SQLite3('../db.sqlite');

if ($db->query("UPDATE compeurDB SET nombre_de_personne = " . $nombre . " WHERE id=1")) {
	echo 'le compteur est maintenant à ' . $nombre;
} else {
	echo 'Une erreur est survenue. Veuillez réessayer.';
}
?>
