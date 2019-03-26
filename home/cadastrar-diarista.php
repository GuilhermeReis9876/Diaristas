<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Diaristas</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="../assets/icons/fav.png" size="32x32">
    
	<!-- Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<!-- Fontes -->
	<link rel="stylesheet" href="../fonts/fontes.css">

    <!-- Fontes -->
	<link rel="stylesheet" href="css/cadastrar.css">

</head>
<body>

    <?php
     session_start();
        $id = $_GET['id'];

        $_SESSION['idLog'] = $id;

        $idLog = $_SESSION['idLog'];
    ?>


    <div class="main">
        <h1 class="title">
            Para fazer parte do Diaristas, preencha o campo abaixo:
        </h1>
        <form id="cadastrar-diarista" name="cadastrar-diarista" method="POST">
        	 <div class="form-group">
                <label for="descDiarista">Crie uma descrição sobre você e seus serviços:</label>
                <textarea class="form-control" id="descDiarista" name="descDiarista" rows="3"></textarea>
            </div>
			<div class="botoes" style="width: 100%;display: flex; flex-direction: row;justify-content: flex-end;">

				<button style="width: 300px;height: 50px;margin-top: 60px;margin-left: 30px;" type="submit" class="btn btn-success" name="btn-cadastrar" id="btn-cadastrar">Cadastrar</button>

			</div>

            <?php

                if(isset($_POST['btn-cadastrar'])) {
                    require_once('../class/ConexaoClass.php');

                    $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");		

                    $descDiarista = ($_POST['descDiarista']);
                    
                    $cadastro = $bd->exercutarComandoSQL("INSERT INTO Diaristas (idDiarista, descDiarista) VALUES ('$idLog','$descDiarista');");

                    if ($cadastro === true){
                        echo '<script> window.location.href = "../home.php?id=',$idLog,'" </script>';
                    }
                    else {
                        echo "<script> alert('Ops, algo deu errado :( . Tente novamente mais tarde!') </script>"; 
                    }
                };
                
            
            ?>
        </form>
    </div>



	<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

    <script>

        $(document).ready(function(){
        
        })

    </script>


</body>
</html>