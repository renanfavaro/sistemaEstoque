<h2>Editar Produto</h2><hr/><br>

<?php if(!empty($warning)): ?>
	<div class="warning"><?php echo $warning; ?></div>
<?php endif; ?>

<form method="POST" class="form">

	Código de Barras:<br/>
	<input type="text" name="cod" style="background-color: #C0C0C0; border-color: black;" value="<?php echo $info['cod']; ?>" required /><br/><br/>

	Nome do Produto:<br/>
	<input type="text" name="name" style="background-color: #C0C0C0; border-color: black;" value="<?php echo $info['name']; ?>" required><br/><br/>

	Preço do Produto:<br/>
	<input type="text" name="price" style="background-color: #C0C0C0; border-color: black;" value="<?php echo number_format($info['price'], 2, ',', '.'); ?>" required><br/><br/>

	Quantidade:<br/>
	<input type="text" name="quantity" style="background-color: #C0C0C0; border-color: black;" value="<?php echo $info['quantity']; ?>" required><br/><br/>

	Qtd. Minima:<br/>
	<input type="text" name="min_quantity" style="background-color: #C0C0C0; border-color: black;" value="<?php echo $info['min_quantity']; ?>" required><br/><br/>

	<input type="submit" value="Salvar Produto" class="btn btn-success">

</form><br>