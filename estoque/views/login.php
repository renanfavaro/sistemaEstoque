<!DOCTYPE html>
<html>
<head>
	<center><title>Login Galera Tricot</title><center>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/signin.css">
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<form method="POST" class="form-signin">
		
			<h2 class="form-signin-heading text-center"><i>Estoque <strong>Galeria Tricot</strong></i></h2><br/>
			
			<input type="text" class="form-control" name="number" placeholder="  Digite o Número do Usuário"><br>

			<input type="password" class="form-control" name="password" placeholder="  Digite a Senha">

			<input type="submit" value="Entrar" class="btn btn-small btn-success btn-block">
		</form>
	</div><br><br><br><br>
	<img src="assets/images/logo.png" alt="" style="width:150px;"><br/><?php echo 'Copyright @2021';?>

	<div class="container2">
		<img src="assets/images/logo2.png" alt="" style="width:200px;">
	</div>
	<div class="container3">
		<img src="assets/images/logo2.png" alt="" style="width:200px;">
	</div>

	<?php if(!empty($msg)): ?>
		<h2><?php echo $msg; ?></h2><br>
	<?php endif; ?>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
