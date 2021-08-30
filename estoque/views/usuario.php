<h2 style="font-style: italic;">Usuarios Registrados</h2><hr style="background-color: #4F4F4F;"><br><br>

<div class="table-responsive">
<table class="table table-bordered table-hover table-condensed table-striped" style="background-color: #DCDCDC;">
	<thead class="thead-dark">
		<tr>
			<th class="text-center">Nome</th>
			<th class="text-center">Numer de Acesso</th>
			<th class="text-center">Ações</th>
		</tr>
		<?php foreach($list as $item): ?>
			<tr style="color: black;">
				<td class="text-center"><?php echo $item['name']; ?></td>
				<td class="text-center"><?php echo $item['user_number']; ?></td>
				<td class="text-center">
					<a href="<?php echo BASE_URL; ?>usuario/edit/<?php echo $item['id']; ?>"><button class="btn btn-outline-dark btn-sm" style="border-color: black; color: green;">Editar Usuario</button></a>
					<a href="<?php echo BASE_URL; ?>usuario/del/<?php echo $item['id']; ?>" onclick="return confirm('tem certeza que deseja excluir?')"><button class="btn btn-outline-dark btn-sm" style="border-color: #black; color: red;">Excluir</button></a>
				</td>
			</tr>
		</thead>
	<?php endforeach; ?>
</table>
</div>
