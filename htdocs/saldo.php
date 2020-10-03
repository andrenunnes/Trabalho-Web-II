<?php
	
		$arquivopassado = $_COOKIE['txtPassado'];  //pegando informações do documento passado

		$linhas = file("$arquivopassado");
		echo "O seu saldo é de: ".$linhas[3];		// igualei uma variavel ao arquivo
	if (isset($_POST['novosaldo'])) {
			
		
		
		$novosaldo = $_POST['novosaldo'];

		$linhas[3] = "R$".$novosaldo;
			
		
		file_put_contents($arquivopassado, $linhas);  //reesincrevendo no arquivo

		header("Location: saldo.php");
	}	
?>

<br>

<!DOCTYPE html>
<html>
<head>
	<title>Saldo</title>
</head>
<body>
	<div>
		<form method="POST" action="saldo.php">
			Digite seu novo saldo:
			<input type="text" name="novosaldo">
			<input type="submit" name="Confirmar">
		</form>
	</div>
</body>
</html>		