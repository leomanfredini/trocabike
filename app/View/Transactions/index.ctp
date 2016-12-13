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
		<h2>Gestão de Pagamentos<span></span></h2>
		<div class="forms-content">

			<table class="tg">
			  <tr>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('id', 'Pedido');?></strong></th>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('title', 'Produto');?></strong></th>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('price', 'Valor');?></strong></th>
			    <th class="tg-baqh"><strong><?php echo $this->Paginator->sort('active', 'Status');?></strong></th>
			    <th class="tg-baqi"><strong>Ação</strong></th>
			  </tr>
			  <?php foreach ($transactions as $transaction): ?>
			  <tr>
			  	<td class="tg-lqy6"><?php echo $transaction['Transaction']['id'] ?></td>
			    <td class="tg-yw4l"><?php echo $transaction['Product']['title'] ?></td>
			    <td class="tg-lqy6"><?php echo $this->Number->currency($transaction['Transaction']['final_price'], 'EUR')?></td>
			    <td class="tg-baqh">
			    	<?php 
					if ($transaction['Transaction']['state'] == 0){
						echo '<font color="red">Pagamento Pendente</font>';
					} else {
						echo '<font color="green">Pagamento Confirmado</font>';					
					}
					?> 	
			    </td>
			    <td class="tg-baqh">
			    	<?php 
					if ($transaction['Transaction']['state'] == 0){
						echo $this->Html->link('Confirmar Pagamento', ['controller' => 'transactions' , 'action' => 'payment_confirm', $transaction['Transaction']['id']], ['confirm' => 'Alterar o status deste pedido para PAGO?']);
					} else {
						echo $this->Html->link('Dados Bancários', ['controller' => 'users' , 'action' => 'view_user', $transaction['User']['id']]);
					}
					?>
			    </td>
			    
			    
			  </tr>
			  <?php endforeach; ?>
			</table>
			<br>
			<div class='paging' align="center">
				<?php echo $this->Paginator->prev('« Anterior', null, null, ['class' => 'desabilitado']);?>
				&nbsp;&nbsp;&nbsp;
				<?php echo $this->Paginator->numbers(); ?>
				&nbsp;&nbsp;&nbsp;
				<?php echo $this->Paginator->next(' Próxima »', null, null, ['class' => 'desabilitado']);?>
			</div>

		</div>
	</fieldset>

</div>
