<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Diaristas</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="../assets/icons/fav.png" size="32x32">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<!-- Fontes -->
	<link rel="stylesheet" href="../fonts/fontes.css">

</head>
<body>

	<style>

	body {
		font-family: 'Google-Reg';
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100vh;
	}

	#logo, .loading {
		transition: 1.5s;
	} 

	.main {
		display: flex;
		width: 100%;
		height: 100vh;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		background: #673AB7;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #512DA8, #673AB7);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #512DA8, #673AB7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		color:  #fff;
	}
	
	.main img {
		width: 280px;
		height: 320px;
		margin-bottom: 20px;
	}

	#mensagem {
		margin-top: 20px;
		color: transparent;
		font-family: 'Google-Medium';
		transition: 5s;
		display: none;
		text-align: center;
		flex-direction: column;
	}

	.lds-ring {
		display: inline-block;
		position: relative;
		width: 64px;
		height: 64px;
	}
	.lds-ring div {
		box-sizing: border-box;
		display: block;
		position: absolute;
		width: 51px;
		height: 51px;
		margin: 6px;
		border: 6px solid #fff;
		border-radius: 50%;
		animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
		border-color: #fff transparent transparent transparent;
	}
	.lds-ring div:nth-child(1) {
		animation-delay: -0.45s;
	}
	.lds-ring div:nth-child(2) {
		animation-delay: -0.3s;
	}
	.lds-ring div:nth-child(3) {
		animation-delay: -0.15s;
	}
	@keyframes lds-ring {
		0% {
			transform: rotate(0deg);
		}
		100% {
			transform: rotate(360deg);
		}
	}
</style>

<div class="main">
	<img id="logo" src="../assets/icons/logo.png" alt="">
	<div class="loading">
		<img src="assets/icons/logo.png" alt="">
		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
	</div>
	<h1 id="mensagem">Cadastrado com sucesso! <br><br><br> <span style="font-size: 1.5rem">Realize o Login para continuar</span></h1>
</div>

<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

<script>
	
	$(document).ready(function(){


		function outLoading(){

			$('#logo').css('opacity','0') 
			$('.loading').css('opacity','0') 
		}

		function menssage() {
			$('#mensagem').css('display','flex')
		}


		function showInfo() {
			$('#mensagem').css('color','#fff')
			$('#logo').css('display','none') 
			$('.loading').css('display','none')  

		}

		function callPage() {
			window.location.href = '../login.php';
		}


		setTimeout(outLoading, 2500);
		setTimeout(menssage, 4800);
		setTimeout(showInfo, 5000);
		setTimeout(callPage, 8000);


	})


</script>


</body>
</html>