<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Diaristas</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="assets/icons/fav.png" size="32x32">

	<!-- Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Fontes -->
	<link rel="stylesheet" href="fonts/fontes.css">

	<!-- Login.css -->
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<div class="loading">
		<img src="assets/icons/logo.png" alt="">
		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
	</div>
	
	<div class="left">
		<img src="assets/icons/logo.png" alt="Diaristas">
	</div>

	<div class="rigth">
		<video id="video" autoplay loop class="bg_video">
			<source src="assets/video/Workaholic.mp4">
			</video>

			<div class="nav">
				<a href="login.php" class="item item-active">Login</a>
				<a href="cadastro.php" class="item">Cadastre-se</a>
				<a href="#" class="item">Precisa de Ajuda?</a>
			</div>


			<div class="bloco">
				<h1>
					Diaristas
				</h1>
				<h2>A sua melhor plataforma para procurar por diaristas</h2>
				<form action="" method="post" id="login">
					<input name="email" type="email" id="email" placeholder="Digite seu email" spellcheck="false" required>
					<input name="senha" type="password" id="senha" placeholder="Digite sua senha" spellcheck="false" required>
					<button id="btnLogar" name="btnLogar" type="submit">Logar</button>

					<p>Não possui uma conta ainda? <span id="span-conta">Crie sua conta agora</span></p>
				</form>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Erro de Validação!</strong> Email ou senha incorretos.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span style="text-decoration: none; outline: none;" aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>

		<?php 

		if (isset($_POST['btnLogar'])) {
			require_once('class/ConexaoClass.php');
            session_start();

			$email = ($_POST['email']);
			$senha = ($_POST['senha']);

			$bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");
			$dados = $bd->selecionarDados("SELECT * FROM Users WHERE emailUser = '$email' AND senhaUser = '$senha';");

			if ($dados === "ERRO"){
				echo "<script>alerta = document.querySelector('.alert');alerta.style.display = 'block'</script>"; 
			}
			else {


				$_SESSION['idLog'] = $dados[0]["idUser"];
                $idLog = $_SESSION['idLog'];

				echo '<script> window.location.href = "home.php?id=', urlencode($idLog),'" </script>';
			}
		}


		?>


		<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.mask.min.js"></script>

		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function () {
				$('.loading').css('display','none')
			});
		</script>

		<script>

			$(document).ready(function(){

				video = document.getElementById('video')
				video.pause();
				video.play();


				$('.bloco').addClass('bloco-active')
				

				$('#span-conta').click(function(){
					window.location.href = 'cadastro.php';
				})

			})
		</script>

	</body>
	</html>