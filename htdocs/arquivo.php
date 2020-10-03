<?php  	

	if (isset($_POST['Enviar'])) {
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];


	$verdade = false;

		if (empty($nome) && empty($senha)) {
			echo "<script>alert('Algum campo não está preenchido')</script>"; // caso o usuario nao inserir nada nos campos

		}elseif (empty($nome)) {
			echo "<script>alert('Você naão digitou o nome.')</script>";

		}elseif (empty($senha)) {
			echo "<script>alert('Você não digitou a senha')</script>";
		}
			

		$verificar = scandir("./Arquivos texto/");

		$contador = count($verificar) - 2; //Diminuir os pontos que tem, no array da pasta. Achei dando var_dump

		$cont = 1;
	

		while ($cont <= $contador) {
			$texto = file("./Arquivos texto/".$cont.".txt");   //verificando se a senha e o usuario são corretos
			if ($nome == trim($texto[0])) {
				if ($senha == trim($texto[1])) {
					$verdade = true;
					
					$diaDeHoje = date('d');  //criei as variaveis data para poder diminuir com o as datas presentes no documento txt
					$mesDeHoje = date('m');
					$anoDeHoje = date('Y');

					$data = trim($texto[2]);
					$retorno = explode('/', $data);
					

					if ($anoDeHoje - $retorno[0] > 18) {        // aki verifica as idades
						
						setcookie('txtPassado',"./Arquivos texto/".$cont.".txt" , time()+240);
						header('Location: saldo.php');
						

					}elseif ($anoDeHoje - $retorno[0] == 18 && $mesDeHoje - $retorno[1] > 18) {
						
						setcookie('txtPassado',"./Arquivos texto/".$cont.".txt" , time()+240);
						header('Location: saldo.php');

					}elseif ($anoDeHoje - $retorno[0] == 18 && $mesDeHoje - $retorno[1] == 18 && $diaDeHoje - $reorno[2] >= 18 ) {
						
						setcookie('txtPassado',"./Arquivos texto/".$cont.".txt" , time()+240);
						header('Location: saldo.php');

					}else{
						echo "<script>alert('Você não tem idade pra isso muleke piranha')</script>";
						header("Location: https://www.toddynho.com.br");
					}			
				}
						
			}	
			
		$cont++;

		}	

		if (!$verdade) {
			echo "<script>alert('Errou ai Campeão!')</script>";
			//header("Location: https://www.toddynho.com.br");
		}

	}
			
?>



