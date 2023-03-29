$(document).ready(function() {
	$('#form').submit(function(event) {
		event.preventDefault();

		var nombre = $('#nombre').val();

		$.ajax({
			url: 'update.php',
			type: 'POST',
			data: {nombre: nombre},
			success: function(response) {
				$('#message').html('<p>' + response + '</p>');
			},
			error: function() {
				$('#message').html('<p>Une erreur est survenue. Veuillez réessayer.</p>');
			}
		});
	});
});
