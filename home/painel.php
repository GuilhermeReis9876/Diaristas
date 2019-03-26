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

	<!-- Painel.css -->
	<link rel="stylesheet" href="css/painel.css">
</head>
<body>

    <?php 
        session_start();

        // Incluindo arquivo de conexão
        require_once('../class/ConexaoClass.php');

        $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");		

        $id = $_GET['id'];

        $_SESSION['idDiarista'] = $id;

        $idDiarista = $_SESSION['idDiarista'];

        $dadosPessoais = $bd->selecionarDados("SELECT * FROM Diaristas WHERE idDiarista = $idDiarista");

        $notaDiarista = $dadosPessoais[0]['notaDiarista'];
        $descDiarista = $dadosPessoais[0]['descDiarista'];
        $trabalhosRealizados = $dadosPessoais[0]['trabalhosRealizados'];
        $likes = $dadosPessoais[0]['likes'];
        $deslikes = $dadosPessoais[0]['deslikes'];

        $dadosDiarista = $bd->selecionarDados("SELECT * FROM Users WHERE idUser = $idDiarista");

        $nome = $dadosDiarista[0]['nomeUser'];
        $sobrenome = $dadosDiarista[0]['sobrenomeUser'];
        $email = $dadosDiarista[0]['emailUser'];
        $telefone = $dadosDiarista[0]['telefoneUser'];
        $imagem = $dadosDiarista[0]['fotoUser'];
    ?>

    <div class="info-user">
        <h1 class="title">Seus dados Pessoais</h1>
        <div class="info-imagem">
                <img id="imagem" src="">
        </div>
        <div class="info-pessoais">
            <div class="info-nome">
                <h1 id="nome"></h1>
                <h1 id="email"></h1>
            </div>
            <div class="info-telefone">
                <h1 id="telefone"></h1>
            </div>
            <div class="info-desc">
                <h1>Descrição: </h1>
                <p id="descDiarista"></p>
            </div>
        </div>
       
       <?php
            echo "<script>var img = document.getElementById('imagem'); img.src = '../$imagem';</script>";
            echo "<script>var nome = document.getElementById('nome'); nome.innerHTML = '$nome $sobrenome';</script>";
            echo "<script>var email = document.getElementById('email'); email.innerHTML = '$email';</script>";
            echo "<script>var telefone = document.getElementById('telefone'); telefone.innerHTML = '$telefone';</script>";
            echo "<script>var descDiarista = document.getElementById('descDiarista'); descDiarista.innerHTML = '$descDiarista';</script>";
       ?>
    </div>

    <div class="info-user">
        <h1 class="title">Suas Avaliações</h1>
        <div class="avaliacao">
            <div class="item">
                <h1 class="item-title">
                    Nota
                </h1>
                <h2 id="notaDiarista"></h2>
            </div>
            <div class="item">
                <h1 class="item-title">
                    Contratos
                </h1>
                <h2 id="trabalhosRealizados"></h2>
            </div>
            <div class="item">
                <h1 class="item-title">
                    Likes
                </h1>
                <h2 id="likes"></h2>
            </div>
            <div class="item">
                <h1 class="item-title">
                    Deslikes
                </h1>
                <h2 id="deslikes"></h2>
            </div>
        </div>
       
       <?php
            echo "<script>var notaDiarista = document.getElementById('notaDiarista'); notaDiarista.innerHTML = '$notaDiarista';</script>";
            echo "<script>var trabalhosRealizados = document.getElementById('trabalhosRealizados'); trabalhosRealizados.innerHTML = '$trabalhosRealizados';</script>";
            echo "<script>var likes = document.getElementById('likes'); likes.innerHTML = '$likes';</script>";
            echo "<script>var deslikes = document.getElementById('deslikes'); deslikes.innerHTML = '$deslikes';</script>";
       ?>
    </div>

	<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../jquery/additional-methods.min.js"></script>
	<script type="text/javascript" src="../jquery/localization/messages_pt_BR.min.js"></script>
	<script type="text/javascript" src="../jquery/jquery.mask.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	<script>

		$(document).ready(function(){


        })
    </script>

</body>
</html>