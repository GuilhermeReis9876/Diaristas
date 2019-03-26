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
	<link rel="stylesheet" href="css/trabalhe.css">

</head>
<body>

    <?php
     session_start();
        $id = $_GET['id'];

        $_SESSION['idLog'] = $id;

        $idLog = $_SESSION['idLog'];

    ?>


    <h1 id="title"> Ops, você ainda não é uma Diarista! </h1>
    <img id="img-center" src="assets/diarista.png"/>
    <a id="btn-trabalhe" class="btn" href="">Faça parte do Diaristas</a>
    <?php
        echo '<script> btn = document.getElementById("btn-trabalhe"); btn.href = "cadastrar-diarista.php?id=',$idLog,'"</script>';
    ?>

	<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>



</body>
</html>