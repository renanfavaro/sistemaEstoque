<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Estoque Galeria Tricot</title>
		<link rel="shortcut icon" type="text/css" href="<?php echo BASE_URL; ?>assets/images/favicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/theme.min.css">

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	</head>
	<body style="background-color: #E4E4E4; color: #000000;">
		<?php if(isset($viewData['menu'])): ?>
		<div>
			<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
				<img src="assets/images/estoque.png" alt="" style="width:65px;">
				<nav class="navbar-header">
					<a class="navbar-brand">Controle Estoque</a>
				</nav>
				<ul class="navbar-nav">
				<?php foreach($viewData['menu'] as $url => $menutitle): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $url; ?>"><?php echo $menutitle; ?></a>
					</li>
				<?php endforeach; ?>
				</ul>
			</nav>
		</div><br/><br/>
		<?php endif; ?>
		<div class="container">
			<?php
			$this->loadViewInTemplate($viewName, $viewData);
			?>
		</div>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
