<!-- ESTILOS -->
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background:#d8d8d8}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:middle;}
.tg .tg-baqi{text-align:center;vertical-align:middle;color:#8b0000;}
.tg .tg-lqy6{text-align:right;vertical-align:middle;}
.tg .tg-yw4l{vertical-align:middle;}
</style>



<!-- TABELA -->
<div class="forms">

	<fieldset>
		<h2>Meus Produtos<span></span></h2>
		<div class="forms-content">

			<table class="tg">
			  <tr>
			    <th class="tg-s6z2"></th>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('title', 'Produto');?></strong></th>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('price', 'Valor');?></strong></th>
			    <th class="tg-baqh"><strong><?php echo $this->Paginator->sort('active', 'Status');?></strong></th>
			    <th class="tg-baqi"><strong>Ação</strong></th>
			  </tr>
			  <?php foreach ($products as $product): ?>
			  <tr>
			  	<td class="tg-lqy6"><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '127px','alt'=>'Produto', 'url' => array('controller' => 'products', 'action' => 'view', $product['Product']['id'])]); ?></td>
			    <td class="tg-yw4l"><?php echo $product['Product']['title'] ?></td>
			    <td class="tg-lqy6"><?php echo $this->Number->currency($product['Product']['price'], 'EUR')?></td>
			    <td class="tg-baqh">
			    	<?php 
					if ($product['Product']['active'] == 1){
						echo '<font color="green">Ativo</font>';
					} else {
						echo '<font color="red">Inativo</font>';					
					}
					?> 	
			    </td>
			    <td class="tg-baqh"><?php echo $this->Html->link('Visualizar Proposta', ['controller' => 'proposals' , 'action' => 'product_proposals', $product['Product']['id']]); ?></td>
			    
			    
			  </tr>
			  <?php endforeach; ?>
			</table>
			<br>
			<div class='paging'>
				<?php echo $this->Paginator->prev('« Anterior', null, null, ['class' => 'desabilitado']);?>
				&nbsp;&nbsp;&nbsp;
				<?php echo $this->Paginator->numbers(); ?>
				&nbsp;&nbsp;&nbsp;
				<?php echo $this->Paginator->next(' Próxima »', null, null, ['class' => 'desabilitado']);?>
			</div>

		</div>
	</fieldset>

</div>






<!-- 	<h3>Propostas Enviadas</h3>

	<table cellpadding="0" cellspacing="0">
		<tr>			
			<th><?php echo $this->Paginator->sort('title', 'Produto');?></th>
			<th><?php echo $this->Paginator->sort('price', 'Valor');?></th>
			<th><?php echo $this->Paginator->sort('date', 'Data');?></th>
			<th><?php echo $this->Paginator->sort('user', 'Vendedor');?></th>
			<th>Status</th>
		</tr>

		<?php foreach ($proposals as $proposal): ?>
		<tr>			
			<td><?php echo $proposal['Product']['title'] ?></td>
			<td><?php echo $this->Number->currency($proposal['Proposal']['price'], 'EUR')?></td>			
			<td><?php echo $this->Time->format($proposal['Proposal']['date'], '%d/%m/%Y %H:%M')?></td>
			<td><?php echo $proposal['User']['name'] ?></td>
			<td class="actions">
				<?php 
					if ($proposal['Proposal']['state'] == 1){
						echo 'Pendente';
					} else if ($proposal['Proposal']['state'] == 2){
						echo 'Rejeitada';
					}
					?> 				
			</td>
		</tr>
		<?php endforeach; ?>
	</table> -->

