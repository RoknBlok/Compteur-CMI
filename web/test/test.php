<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<style>
		body {
			background-color: navy;
		}
		input[type=text] {
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin-right: 10px;
			font-size: 16px;
		}
		input[type=submit] {
			background-color: white;
			color: navy;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
		}
		input[type=submit]:hover {
			background-color: navy;
			color: white;
		}
	</style>
</head>
<body>
	<h1>Interface de mise à jour SQLite</h1>
	<form action="update.php" id="form" method="post">
		<label for="nombre">Nombre de personnes :</label>
		<input type="number" id="nombre" name="nombre" placeholder="Entrez un nombre...">
		<input type="submit" value="Mettre à jour">
	</form>
	<div id="message"></div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="script.js"></script>
</body>
</html>
