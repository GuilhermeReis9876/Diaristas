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

	<!-- Cadastro.css -->
	<link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

	<div class="nav">
		<img id='logo' src="assets/icons/logo.png" alt="Diaristas Logo">
		<div class="list">
			<a href="cadastro.php" class="item item-active">Cadastre-se</a>
			<a href="login.php" class="item">Login</a>
			<a href="#" class="item">Precisa de Ajuda?</a>
		</div>
	</div>
	<div class="princ">
		<h1>
			Faça parte do Diaristas
		</h1>
		<h2>
			Procura por diaristas ou deseja oferecer seus serviços?
			<br>
			Cadastre-se e busque já por diaristas e oportunidades de emprego
		</h2>
		<a href=".area-form" class="scroll-suave button">Cadastre-se</a>
	</div> 
	<div class="area-form">
		<h1>Primeiro, precisamos saber mais sobre você</h1>
		<form action="" method="post" id="cadastro">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" placeholder="Digite seu primeiro nome" name="nome" required>
				</div>
				<div class="form-group col-md-8">
					<label for="sobrenome">Sobrenome</label>
					<input type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome" name="sobrenome" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" required>
				</div>
				<div class="form-group col-md-6">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<label for="cpf">Cpf</label>
					<input type="text" class="form-control" id="cpf" placeholder="Digite seu cpf" name="cpf" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" placeholder="Digite seu Telefone" name="telefone" required>
				</div>
				<div class="form-group col-md-6">
					<label for="cep">Cep</label>
					<input type="text" class="form-control" id="cep" placeholder="Digite seu Cep" name="cep" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="rua">Rua</label>
					<input type="text" class="form-control" id="rua" placeholder="Digite seu rua" name="rua" required>
				</div>
				<div class="form-group col-md-6">
					<label for="bairro">Bairro</label>
					<input type="text" class="form-control" id="bairro" placeholder="Digite seu bairro" name="bairro" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="cidade">Cidade</label>
					<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite sua cidade" required>
				</div>
				<div class="form-group col-md-4">
					<label for="estado">Estado</label>
					<select id="estado" class="form-control" name="estado" required>
						<option selected>Selecione...</option>
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espirito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MT">Mato Grosso</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="numero">Número</label>
					<input type="text" class="form-control" id="numero" name="numero" required>
				</div>
			</div>

			<div class="botoes" style="width: 100%;display: flex; flex-direction: row;justify-content: flex-end;">

				<button style="width: 300px;height: 50px;margin-top: 60px" id="btnCancelar" class="btn btn-danger">Cancelar</button>
				<button style="width: 300px;height: 50px;margin-top: 60px;margin-left: 30px;" type="submit" class="btn btn-success" name="btn-cadastrar" id="btn-cadastrar">Cadastrar</button>

			</div>

			<?php 

			if (isset($_POST['btn-cadastrar'])) {
				require_once('class/ConexaoClass.php');

                $bd = new ConexaoClass("sql110.epizy.com", "epiz_23600335", "NWi8566aODKs6FM", "epiz_23600335_dbDiaristas");		

				$nome = ($_POST['nome']);
				$sobrenome = ($_POST['sobrenome']);
				$cpf = ($_POST['cpf']);
				$email = ($_POST['email']);
				$senha = ($_POST['senha']);
				$telefone = ($_POST['telefone']);
				$cep = ($_POST['cep']);
				$rua = ($_POST['rua']);
				$bairro = ($_POST['bairro']);
				$cidade = ($_POST['cidade']);
				$estado = ($_POST['estado']);
				$numero = ($_POST['numero']);

				$cadastro = $bd->exercutarComandoSQL("INSERT INTO Users (nomeUser,sobrenomeUser,cpfUser,emailUser,senhaUser,telefoneUser,cepUser,enderecoUser,bairroUser,cidadeUser,estadoUser,numeroUser) VALUES ('$nome','$sobrenome','$cpf','$email','$senha','$telefone','$cep','$rua','$bairro','$cidade','$estado','$numero');");

				if ($cadastro === true){
					echo "<script> window.location.href = 'cadastro/sucesso.php' </script>";
				}
				else {
                    echo "<script> alert('Ops, algo deu errado :( . Tente novamente mais tarde!') </script>"; 
				}
			};

			?>

		</form>
	</div>
	<div class="copy">
		<p> © Copyright 2019 Diaristas.com.br - All Rights Reserved </p>
	</div>

	<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.mask.min.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<script>

		$(document).ready(function(){

			$('#logo').click(function(){
				window.location.href = 'login.php';
			})

			var $doc = $('html, body');
			$('.scroll-suave').click(function() {
				$doc.animate({
					scrollTop: $( $.attr(this, 'href') ).offset().top
				}, 1500);
				return false;
			});

			$('.button').mouseenter(() => {
				$('.button').addClass('button-active')
			})

			$('.button').mouseleave(() => {
				$('.button').removeClass('button-active')
			})

			$('#btnCancelar').click((e) => {
				window.location.href = 'login.php';
				e.preventDefault()
			})


			$('#cep').mask('00000-000');
			$('#cpf').mask('000.000.000-00', {reverse: true});
			$('#telefone').mask('(00) 00000-0000')


			$("#cep").keyup(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("Aguarde...");
                        $("#bairro").val("Aguarde...");
                        $("#cidade").val("Aguarde...");
                        $("#estado").val("Aguarde...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        	if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });

		})

	</script>


</body>
</html>