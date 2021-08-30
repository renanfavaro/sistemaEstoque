<h2>Relatório de Reposição Produtos</h2><hr/><br/>

<table border="1" width="500" table class="table table-bordered; table-striped" style="background-color: #DCDCDC;">
	<tr style="color: black">
		<th>Nome do Produto</th>
		<th>Qtd.</th>
		<th>Qtd. Min.</th>
		<th>Diferença</th>
	</tr>
	<?php foreach($list as $item): ?>
		<tr style="color: black">
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['quantity']; ?></td>
			<td><?php echo $item['min_quantity'] ?></td>
			<td><?php echo floatval($item['min_quantity']) - floatval($item['quantity']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
