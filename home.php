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

	<!-- Home.css -->
	<link rel="stylesheet" href="css/home.css">
</head>
<body>

    <?php 
            session_start();

			// Incluindo arquivo de conexão
			require_once('class/ConexaoClass.php');

            $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");		

            $id = $_GET['id'];

            $_SESSION['idLog'] = $id;

			$idLog = $_SESSION['idLog'];

            $nomeLog = $bd->selecionarDados("SELECT nomeUser FROM Users WHERE idUser = $idLog");
            $nomeLog = $nomeLog[0]['nomeUser'];
    ?>


	
	<div class="nav-top">
		<div class="logo">
			<img src="assets/icons/logo-2.png" alt="">
		</div>
		<div class="search">
			<div class="input">
				<input type="text" id="search-input" placeholder="Busque por nomes, bairros, regiões ou cidades...">
				<i class="fas fa-search"></i>
			</div>
		</div>
		<div class="perfil">
			<img id="profile-image" src="" alt="">
			<?php 
			

            $_SESSION['nomeLog'] = $nomeLog;

			// Selecionando fotos
			$foto = $bd->selecionarDados("SELECT fotoUser FROM Users WHERE idUser = $idLog");
			$fotoFinal = $foto[0]['fotoUser'];
			echo "<script>var img = document.getElementById('profile-image'); img.src = '$fotoFinal';</script>"

			?>
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
				</a>

				<div id="drop-profile" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="#">Meu perfil</a>
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Alterar Foto</a>
					
					<a class="dropdown-item" id="drop-sair" name="drop-sair" href="login.php">Sair</a>
				</div>
			</div>
			
		</div>
	</div>

	<div class="dash">

		<div class="nav-lateral">

			
			<h1 id="nome-perfil"></h1>
			<?php
            

			$nomeLog = $_SESSION['nomeLog'];
			echo "<script>document.getElementById('nome-perfil').innerHTML = 'Bem vindo, $nomeLog';</script>";
			?>
			<div class="list">
				<div id="item-diaristas" class="item item-active">
					<div class="icon">
						<img src="assets/icons/diaristas-icon.png" alt="">
					</div>
					<div class="text-item">
						Diaristas
					</div>
				</div>
				<div id="item-trabalhos" class="item">
					<div class="icon">
						<img src="assets/icons/trabalhos-icon.png" alt="">
					</div>
					<div class="text-item">
						Trabalhos
					</div>
				</div>
			
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="post" id="form-image-perfil" name="form-profile-image" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="file" name="foto">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary" name="btn-alterar" id="btn-alterar">Alterar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php 
		if (isset($_POST['btn-alterar'])) {

			if (!isset($_FILES['foto']))
			{
				echo "Selecione uma imagem";
				exit;
			}

			$extensao = strtolower(substr($_FILES['foto']['name'], -4));
			$novo_nome = $idLog . $extensao;
			$diretorio = "assets/fotosPerfil/";

			move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);

			$nome_arquivo = $diretorio.$novo_nome;

			require_once('class/ConexaoClass.php');
            $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");
			$bd->exercutarComandoSQL("UPDATE Users SET fotoUser = '$nome_arquivo' WHERE idUser = $idLog ");


			// Selecionando fotos
			$foto = $bd->selecionarDados("SELECT fotoUser FROM Users WHERE idUser = $idLog");
			$fotoFinal = $foto[0]['fotoUser'];
			echo "<script>var img = document.getElementById('profile-image'); img.src = '$fotoFinal';</script>";
		}


		?>

        <div class="main">

            <iframe id="iframe-main" src="home/lista-diaristas.php" frameborder="0"></iframe>
            
        </div>

        <div class="trabalhos">
           
            <iframe id="iframe" src="" frameborder="0"></iframe>
             <?php
                require_once('class/ConexaoClass.php');
                
                $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");	
                $dadosVerifica = $bd->selecionarDados("SELECT * FROM Diaristas WHERE idDiarista = '$idLog'");


                if($dadosVerifica == "ERRO") {
                    echo '<script> iframe = document.getElementById("iframe"); iframe.src="home/trabalhe-conosco.php?id=', urlencode($idLog),'" </script>';
                }
                else {
                    echo '<script> iframe = document.getElementById("iframe"); iframe.src="home/painel.php?id=', urlencode($idLog),'" </script>';
                }
            
            ?>
        </div>

	</div>

   



	<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="jquery/additional-methods.min.js"></script>
	<script type="text/javascript" src="jquery/localization/messages_pt_BR.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.mask.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<script>

		$(document).ready(function(){

            $('.item').click(function(){
                $('.item').removeClass('item-active')
                id = $(this).attr("id")

                $('#'+id).addClass('item-active')

                if(id == 'item-diaristas') {
                    $('.main').css('display', 'flex')
                    $('.trabalhos').css('display', 'none')
                }
                else {
                    $('.main').css('display', 'none')
                    $('.trabalhos').css('display', 'flex')
                }
            })


			$('#drop-sair').click(function(){

				<?php 

				if (isset($_POST['drop-sair'])) {
					session_start();
					$_SESSION['idLog'] = "";
					$_SESSION['nomeLog'] = "";

				}

				?>
			})

          
		})
	</script>

</body>
</html>