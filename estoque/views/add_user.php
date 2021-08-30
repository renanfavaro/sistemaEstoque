<h2 style="font-style: italic;">Adicionar Usuario</h2><hr style="background-color: #4F4F4F;"><br>

<?php if(!empty($warning)): ?>
	<div class="warning"><?php echo $warning; ?></div>
<?php endif; ?>

<form method="POST" class="form form-horizontal">

	Number:<br/>
	<input type="text" name="user_number" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	Senha:<br/>
	<input type="password" name="pass" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	Nome:<br/>
	<input type="text" name="name" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>


	<input type="submit" class="btn btn-success" value="Adicionar Usuario">

</form>