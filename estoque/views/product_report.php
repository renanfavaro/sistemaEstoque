<h2 style="font-style: italic;">Relatório de Entrada/Saída Produtos</h2><hr style="background-color: #4F4F4F;"><br/>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

<div>
	<h4>Pesquisa Avançada:</h4><br>
	<form method="GET" class="form-inline">
		<div class="form-group form-inline">
			<label for="entrada">Status Entrada:</label>
			<select id="entrada" name="filtros[entrada]" class="form-control">
				<option></option>
				<option value="fornecedor">Fornecedor</option>
				<option value="devolucao cliente">Devolução Cliente</option>
				<option value="devolucao loja">Devolução Loja</option>
			</select>
		</div>

		<div class="form-group form-inline">
			<label for="saida">Status Saída: </label>
			<select id="saida" name="filtros[saida]" class="form-control">
				<option></option>
				<option value="Devolução Fornecedor" <?php echo ($filtros['saida']=='Devolução Fornecedor')?'selected="selected"':''; ?>>Devolução Fornecedor</option>
				<option value="Envio Loja" <?php echo ($filtros['saida']=='Envio Loja')?'selected="selected"':''; ?>>Envio para Loja</option>
				<option value="Envio Site" <?php echo ($filtros['saida']=='Envio Site')?'selected="selected"':''; ?>>Envio para Site</option>
			</select>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-sm btn-info" value="Buscar ">
		</div>
	</form>
</div><br>

<button class="btn btn-primary btn-sm" onclick="clicou()">Imprimir Relatório</button><br><br>
<table border="1" width="100%" table class="table table-bordered; table-striped" style="background-color: #DCDCDC;">
	<thead class="thead-dark">
		<tr style="color: black">
		    <th>Data</th>
		    <th>Número do usuário</th>
		    <th>Código do Produto</th>
			<th>Ação</th>
			<th>Qtd.</th>
			<th>Status</th>
		</tr>
	<?php foreach($list as $item): ?>
		<tr style="color: black">
			<td><?php echo date('d/m/Y H:i:s', strtotime($item['date_report'])); ?></td>
			<td><?php echo $item['user_number']; ?></td>
			<td><?php echo $item['cod_products']; ?></td>
			<td><?php echo ($item['type_action'] == 1 ? 'Entrada' : 'Saída'); ?></td>
      		<td><?php echo $item['quantity']; ?></td>
      		<td><?php echo $item['operacao']; ?></td>
		</tr>
	</thead>
	<?php endforeach; ?>
</table>