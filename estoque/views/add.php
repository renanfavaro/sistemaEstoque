<h2 style="font-style: italic;">Adicionar Produto</h2><hr style="background-color: #4F4F4F;"><br>

<?php if(!empty($warning)): ?>
	<div class="warning"><?php echo $warning; ?></div>
<?php endif; ?>

<form method="POST" class="form form-horizontal">

	Código de Barras:<br/>
	<input type="text" name="cod" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	Nome do Produto:<br/>
	<input type="text" name="name" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	Preço do Produto:<br/>
	<input type="text" name="price" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	Quantidade:<br/>
	<input type="text" name="quantity" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	Qtd. Minima:<br/>
	<input type="text" name="min_quantity" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

	<input type="submit" class="btn btn-success" value="Adicionar Produto">

</form><br>