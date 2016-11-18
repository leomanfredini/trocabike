<!-- ESTILOS -->
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background:#d8d8d8 }
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-baqi{text-align:center;vertical-align:top;color:#8b0000;}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>



<!-- TABELA -->
<div class="forms">

	<fieldset>
		<h2>Propostas Enviadas<span></span></h2>
		<div class="forms-content">
			<div align="center">
				<h1>Produto: <font color="green"><?php echo $proposals[0]['Product']['title']; ?></font></h1>
			</div>
		
		<br>

			<table class="tg">
			  <tr>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('date', 'Data');?></strong></th>
			    <th class="tg-s6z2"><strong><?php echo $this->Paginator->sort('price', 'Valor');?></strong></th>			    
			    <th class="tg-baqh"><strong><?php echo $this->Paginator->sort('buyer_id', 'Comprador');?></strong></th>
			    <th class="tg-baqi"><strong><?php echo $this->Paginator->sort('state', 'Status');?></strong></th>
			    <th class="tg-baqi"><strong>Ações</strong></th>
			  </tr>
			  <?php foreach ($proposals as $proposal): ?>
			  <tr>			    
			    <td class="tg-baqh"><?php echo $this->Time->format($proposal['Proposal']['date'], '%d/%m/%Y')?></td>
			    <td class="tg-lqy6"><?php echo $this->Number->currency($proposal['Proposal']['price'], 'EUR')?></td>
			    <td class="tg-yw4l"><?php echo $proposal['Buyer']['name'] ?></td>
			    <td class="tg-baqh">
			    	<?php 
					if ($proposal['Proposal']['state'] == 1){
						echo '<font color=#996600>Pendente</font>';
					} else if ($proposal['Proposal']['state'] == 0){
						echo '<font color="red">Rejeitada</font>';
					} else {
						echo '<font color="green">Aceita</font>';
					}
					?> 	
			    </td>
			     <td class="tg-baqh">
			    	<?php 
					if ($proposal['Proposal']['state'] == 1){
						echo $this->Html->link('Aceitar', ['action' => 'accept', $proposal['Proposal']['id']], ['confirm' => 'Aceitar esta proposta de compra?']) . ' | ';
						echo $this->Html->link('Rejeitar', ['action' => 'reject', $proposal['Proposal']['id']], ['confirm' => 'Tem certeza que deseja rejeitar esta proposta de compra?']);			
					} else {
						echo '<font color="green"></font>';
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