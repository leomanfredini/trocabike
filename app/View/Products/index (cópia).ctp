<div class="view">

<?php echo $this->Session->flash(); ?>

<table style="width:100px;" cellpadding="0" cellspacing="0">
		<tr>
			<th>Imagem</th>
			<th>Descrição</th>
			<th>Estado de Uso</th>
			<th><?php echo $this->Paginator->sort('valor', 'Valor');?></th>
			<th><?php echo $this->Paginator->sort('altura', 'Altura');?></th>
			<th>Ações</th>
		</tr>

		<?php foreach ($products as $product): ?>
		<tr>
			<td><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '200px','alt'=>'Produto']); ?></td>
			<td><?php echo $product['Product']['title'] ?></td>
			<td><?php echo $product['Product']['state'] ?></td>
			<td><?php echo $product['Product']['price'] ?></td>
			<td><?php echo $product['Product']['width'] ?></td>
			<td class="actions">
				<?php  ?> 				
			</td>
		</tr>
		<?php endforeach; ?>
	</table>

</div>

<div class="actions">

	<ul>
		<li><h3><?php echo $this->Session->read('User_name'); ?></h3></li>
		<li><?php echo $this->Html->link('Registrar', ['controller' => 'users', 'action' => 'register']); ?></li>
		<li><?php echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']); ?></li>
		<li><?php echo $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></li>
	</ul>
          
</div>