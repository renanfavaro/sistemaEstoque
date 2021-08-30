<?php
/*type_alert = vamos informar qual foi a situação ref. a tentativa de alteração de produto no BD
* 1 = Sucesso
* 2 = Erro, produto inexistente
* 3 = Erro, ação não permitida
* 4 = Erro, produto/código não encontrado/inexistente.
* 5 = Erro, infelizmente não foi possível realizar está ação ref. ao produto, por favor contate o administrador.
*/
if(!empty($_SESSION['type_alert'])) {
	if($_SESSION['type_alert'] == 1) {
		?>
			<div class="alert alert-success" role="alert">
				<h4 class="alert-heading">Sucesso, alteração concluída com sucesso!</h4>
			</div>
		<?php
	}

	if($_SESSION['type_alert'] == 2) {
		?>
			<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">Erro, produto inexistente!</h4>
			</div>
		<?php
	}

	if($_SESSION['type_alert'] == 3) {
		?>
			<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">Erro, ação não permitida!</h4>
			</div>
		<?php
	}

	if($_SESSION['type_alert'] == 4) {
		?>
			<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">Erro, produto/código não encontrado/inexistente!</h4>
			</div>
		<?php
	}

	if($_SESSION['type_alert'] == 5) {
		?>
			<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">Erro, infelizmente não foi possível realizar está ação ref. ao produto, por favor contate o administrador!</h4>
			</div>
		<?php
	}
	echo '<br> <br>';
	unset($_SESSION['type_alert']);
}
?>

<h2 style="font-style: italic;">Produtos Registrados</h2><hr style="background-color: #4F4F4F;"><br>

<fieldset>
	<label><h5>Procurar:</h5></label>
	<form method="GET">
		<input type="text" id="busca" name="busca" value="<?php echo (!empty($_GET['busca']))?$_GET['busca']:''; ?>" placeholder="Digite o código de barras ou nome do produto" style="width: 100%; height: 40px; font-size: 18px; background-color: #C0C0C0; border-color: #000000;">
	</form>
</fieldset>
<br/><br/>

<div class="container" style="display: inline-block; color: #4F4F4F;">
	<button class="btn btn-primary" data-toggle="modal" data-target="#janela">Entrada de Produtos</button>
	<div class="modal fade" id="janela">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="background-color: #000000; color: #FFFAF0;">
				<div class="modal-header">
					<h5 class="modal-title" style="font-style: italic;">Entrada de Produtos</h5>
					<button class="close" data-dismiss="modal" style="color: #DCDCDC"><span>&times;</span></button>
				</div>
				<div class="modal-body" style="background-color: rgba(150, 150, 150, 0.7);">
					<form method="POST" class="form form-horizontal" action="home/productEntry">
						<input type="hidden" name="type_action" value="1">
						Código do Produto:<br/>
						
						<select name="cod" required style="background-color: #C0C0C0; border-color: black;">
								<option value="">Selecione um Código</option>
							<?php foreach($list as $l): ?>
								<option value="<?php echo $l['cod']; ?>"><?php echo $l['cod']; ?> - <?php echo $l['name']; ?></option>
							<?php endforeach; ?>
						</select><br/><br/>

						Status da Operação:
						<select name="operacao" required style="background-color: #C0C0C0; border-color: black;">
								<option value="">Selecione uma Movimentação para Operação</option>
								<option value="Fornecedor">Fornecedor</option>
								<option value="Devoluçao Cliente">Devolução de Cliente</option>
								<option value="Devolução Loja">Devolução de Loja</option>
						</select><br/><br/>

						Quantidade:<br/>
						<input type="text" name="quantity" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

						<input type="submit" class="btn btn-success btn-sm" value="Concluir Entrada">

					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-secondary" data-toggle="modal" data-target="#janela2" style="font-style: italic;">Saída de Produtos</button>
	<div class="modal fade" id="janela2">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="background-color: #000000; color: #FFFAF0;">
				<div class="modal-header">
					<h5 class="modal-title" style="font-style: italic;">Saída de Produtos</h5>
					<button class="close" data-dismiss="modal" style="color: #DCDCDC"><span>&times;</span></button>
				</div>
				<div class="modal-body" style="background-color: rgba(150, 150, 150, 0.7)">
					<form method="POST" class="form form-horizontal" action="home/productEntry">
						<input type="hidden" name="type_action" value="2">
						Código do Produto:<br/>
						<select name="cod" required style="background-color: #C0C0C0; border-color: black;">
								<option value="">Selecione um Código</option>
							<?php foreach($list as $l): ?>
								<option value="<?php echo $l['cod']; ?>"><?php echo $l['cod']; ?> - <?php echo $l['name']; ?></option>
							<?php endforeach; ?>
						</select><br/><br/>

						Status da Operação:
						<select name="operacao" required style="background-color: #C0C0C0; border-color: black;">
								<option value="">Selecione uma Movimentação para Operação</option>
								<option value="Devolução Fornecedor">Devolução Fornecedor</option>
								<option value="Envio para Loja">Envio para Loja</option>
								<option value="Envio para Site">Envio para Site</option>
						</select><br/><br/>

						Quantidade:<br/>
						<input type="text" name="quantity" required style="background-color: #C0C0C0; border-color: black;"><br/><br/>

						<input type="submit" class="btn btn-success btn-sm" value="Concluir Sáida">

					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div><br/><br>
<div class="container">
<table class="table table-striped table-sm table-bordered" style="background-color: #DCDCDC;">
	<thead class="thead-dark">
		<tr>
			<th class="text-center">Código</th>
			<th class="text-center">Descrição</th>
			<th class="text-center">Preço Unit.</th>
			<th class="text-center">Quantidade</th>
			<th class="text-center">Ações</th>
		</tr>
		<?php foreach($list as $item): ?>
			<tr style="color: black">
				<td class="text-center"><?php echo $item['cod']; ?></td>
				<td class="text-center"><?php echo $item['name']; ?></td>
				<td class="text-center">R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
				<td class="text-center"><?php echo $item['quantity']; ?></td>
				<td class="text-center">
					<a href="<?php echo BASE_URL; ?>home/edit/<?php echo $item['id']; ?>"><button class="btn btn-outline-dark btn-sm" style="border-color: black; color: green;">Editar</button></a>
					<a href="<?php echo BASE_URL; ?>home/del/<?php echo $item['id']; ?>" onclick="return confirm('tem certeza que deseja excluir?')"><button class="btn btn-outline-dark btn-sm" style="border-color: #black; color: red;">Excluir</button></a>
				</td>
			</tr>
		</thead>
	<?php endforeach; ?>
</table>
	<nav aria-label="Navegação de página">
		<ul class="pagination pagination justify-content-center pagination-sm">
				<?php
					if($paginas > 1 && $paginaAtual <= $paginas) {
						for($i = $init_page; $i <= $end_page; $i++) {
							if($i < $end_page) {
								?><li class="page-item"><a class="page-link" style='background-color: #E4E4E4;' href="<?php echo BASE_URL; ?>?p=<?php echo $i; ?>"><?php echo 'Anterior'; ?></a></li><?php
							} 
							if($i == $paginaAtual) {
								?><li class="page-item"><a class="page-link" style='background-color: #E4E4E4;' href="<?php echo BASE_URL; ?>?p=<?php echo $i; ?>"><strong><?php echo $i; ?></strong></a></li><?php
							} else {
								?><li class="page-item"><a class="page-link" style='background-color: #E4E4E4;' href="<?php echo BASE_URL; ?>?p=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php
							}
							if($i > 1) {
								?><li class="page-item"><a class="page-link" style='background-color: #E4E4E4;' href="<?php echo BASE_URL; ?>?p=<?php echo $i; ?>"><?php echo 'Proximo'; ?></a></li><?php
							}
						}
					}
				?>
		</ul>
	</nav>
</div>

</body>

<script type="text/javascript">
	document.getElementById("busca").focus();
</script>