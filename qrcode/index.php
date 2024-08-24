<?php
	include 'qrcode.php';

	if(isset($_POST['qr'])) {

		$text = $_POST['qr'];
		//$name = md5(time()) . ".png";
		//$file = 'files/qrcode.png';

		$options =array(
			'w' => 500,
			'h' => 500
		);
		$generator = new QRCode($text,$options);
		$generator->output_image();

	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>QR Code Generator</title>
	</head>	

	<body>
		<form action="" method="POST">
			<header>QR Code Generator</header>
			<br>
			<input type="text" name="qr" placeholder="Insira o Link">
			<br>
			<br>
			<button type="submit">Generate!</button>
		</form>
	</body>
</html>