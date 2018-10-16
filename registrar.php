<?php
require_once "classes/conexao.php";
$obj = new conectar();
$conexao = $obj->conexao();

$sql = "SELECT * from usuarios where email='admin'";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if(mysqli_num_rows($result) > 0){
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar Usuário</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
	

</head>
<body class="cover" style="background-image: url(./assets/img/loginFont.jpg);">
	<form id="frmRegistro" action="#" method="" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Cadastrar Usuário</p>
						
							<label>Nome</label>
							<input type="text" class="form-control input-sm" name="nome" id="nome">
							<label>Usuário</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="email" id="email">
							<label>Senha</label>
							<input type="password" class="form-control input-sm" name="senha" id="senha">
							<p></p>
							<span class="btn btn-primary" id="registro">Registrar</span>
							<a href="index.php" class="btn btn-default">Voltar</a>
						</form>
						
						<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
					
</body>
</html>




<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vazios=validarFormVazio('frmRegistro');

			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmRegistro').serialize();
			
			$.ajax({
				type:"POST",
				data:dados,
				url:"procedimentos/login/registrarUsuario.php",
				success:function(r){
					//alert(r);

					if(r==1){
						alert("Inserido com Sucesso!!");
					}else{
						alert("Erro ao Inserir");
					}
				}
			});
		});
	});
</script>
