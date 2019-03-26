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

	<!-- Home.css -->
	<link rel="stylesheet" href="css/lista.css">
</head>
<body>

    <?php 
        session_start();

        // Incluindo arquivo de conexão
        require_once('../class/ConexaoClass.php');

        $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");		

        $id = $_GET['id'];

        $_SESSION['idLog'] = $id;

        $idLog = $_SESSION['idLog'];

        $nomeLog = $bd->selecionarDados("SELECT nomeUser FROM Users WHERE idUser = $idLog");
        $nomeLog = $nomeLog[0]['nomeUser'];
    ?>

    <div class="main">
        <div class="order-bar">
            <h1>Lista de Diaristas</h1>

            <div class="order-bar-options">
                <div id="order-nota" class="order-option order-option-active">Maiores Notas</div>
                <div id="order-serv" class="order-option">Mais serviços</div>
                <div id="order-like"  class="order-option">Mais Likes</div>
            </div>

        </div>

        <?php

        
            $listaNota = $bd->selecionarDados("SELECT * FROM Diaristas ORDER BY notaDiarista desc LIMIT 20");
        
            if ($listaNota == "ERRO") {
                echo "<h5 id='text-erro-reserva'> Nenhuma viagem disponível <br> no momento  : ( </h5>";
            }
            else {
                $max = sizeof($listaNota);
                for ($i = 0; $i < $max; $i++) {

                    $idDiarista = $listaNota[$i]['idDiarista'];
                    $notaDiarista = $listaNota[$i]['notaDiarista'];
                    $trabalhosRealizados = $listaNota[$i]['trabalhosRealizados'];
                    $likes = $listaNota[$i]['likes'];
                    $deslikes = $listaNota[$i]['deslikes'];

                    $dadosDiarista = $bd->selecionarDados("SELECT * FROM Users WHERE idUser = $idDiarista");

                    $nome = $dadosDiarista[0]['nomeUser'];
                    $sobrenome = $dadosDiarista[0]['sobrenomeUser'];
                    $email = $dadosDiarista[0]['emailUser'];
                    $telefone = $dadosDiarista[0]['telefoneUser'];
                    $imagem = $dadosDiarista[0]['fotoUser'];

                    echo "<div class='card-diarista'>";
                        echo "<div class='bloco-img'>";
                            echo '<img class="card-foto" id="card-foto-'.$idDiarista.'" src=""/>';
                            echo "<script>var img = document.getElementById('card-foto-".$idDiarista."'); img.src = '../$imagem';</script>";
                        echo "</div>";
                        echo "<div class='bloco1'>";
                            echo "<div class='area-nome'>"; 
                                echo "<h1 class='card-nome'>$nome</h1>"; 
                                echo "<h1 class='card-nome'>$sobrenome</h1>"; 
                            echo "</div>";
                            echo "<h2 class='card-email'>$email</h2>";
                            echo "<div class='area-info'>";
                                echo "<div class='quadro-info'>";
                                    echo "<i style='color: #28a745' class='fas fa-thumbs-up'></i>";
                                    echo "<p class='info'>$likes</p>";

                                    echo "<i style='color: #dc3545' class='fas fa-thumbs-down'></i>";
                                    echo "<p class='info'>$deslikes</p>";

                                    echo "<i style='color: #795548' class='fas fa-broom'></i>";
                                    echo "<p class='info'>$trabalhosRealizados</p>";

                                    echo "<i style='color: #ffc107' class='fas fa-star'></i>";
                                    echo "<p class='info'>$notaDiarista</p>";

                                echo "</div>";
                                echo "<button data-toggle='modal' data-target='#modalPerfil' class='btn btn-perfil' id=".$idDiarista.">Ver Perfil</button>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                }
            }
            ?>
        </div>
    </div>
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

            function removerOrderBar() {
                $('.order-option-active').addClass('order-option');
                $('.order-option-active').removeClass('order-option-active');
            }

            $('.order-option').click(function(){
                removerOrderBar();
                id = $(this).attr("id")
                $('#'+id).addClass('order-option-active')
            })

            $('.btn-perfil').click(function(){
                idDiarista = $(this).attr("id")
                window.location.href="perfil.php?id="+idDiarista
            })

        })
    </script>

</body>
</html>