<h2>Editar Usuário</h2><hr/><br>

<?php if(!empty($warning)): ?>
	<div class="warning"><?php echo $warning; ?></div>
<?php endif; ?>

<form method="POST" class="form">

	Nome do Usúario:<br/>
	<input type="text" name="name" style="background-color: #C0C0C0; border-color: black;" value="<?php echo $info['name']; ?>" required /><br/><br/>

	Senha do Usúario:<br/>
	<input type="password" name="pass" style="background-color: #C0C0C0; border-color: black;" required><br/><br/>

	<input type="submit" value="Salvar Usuário" class="btn btn-success">

</form>