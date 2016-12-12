<!-- Products -->
<div class="products">
	<div class="cl">&nbsp;</div>
	<?php foreach ($products as $product): ?>
	<ul>
	    <li>
	    	<a href="#"><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '227px','alt'=>'Produto', 'url' => array('controller' => 'products', 'action' => 'view', $product['Product']['id'])]); ?></a>
	    	<div class="product-info">
	    		<h3></h3>
	    		<div class="product-desc">
					<h4></h4>
	    			<p><?php echo $this->Html->link($product['Product']['title'], ['controller' => 'products' , 'action' => 'view', $product['Product']['id']]); ?></p>
	    			<strong class="price"><?php echo $this->Number->currency($product['Product']['price'], 'EUR') ?></strong>
	    			<!-- <p><?php echo $this->Locale->date($product['Product']['modified']) ?></p> -->
	    			<!-- <a href="#" class="button-product-purchase">COMPRAR</a> -->
	    			<?php echo $this->Html->link('COMPRAR', ['controller' => 'products', 'action' => 'purchase', $product['Product']['id']], ['class' => 'button-product-purchase']); ?>
	    			<!-- <a href="#" class="button-product-proposal">ENVIAR PROPOSTA</a> -->
	    			<?php echo $this->Html->link('ENVIAR PROPOSTA', ['controller' => 'proposals', 'action' => 'send', $product['Product']['id']], ['class' => 'button-product-proposal']); ?>
	    		</div>
	    	</div>
    	</li>    	
	</ul>
	<?php endforeach; ?>
	<div class="cl">&nbsp;</div>
</div>
<!-- End Products -->
<div class='paging' align="center">
	<?php echo $this->Paginator->prev('« Anterior', null, null, ['class' => 'desabilitado']);?>
	&nbsp;&nbsp;&nbsp;
	<?php echo $this->Paginator->numbers(); ?>
	&nbsp;&nbsp;&nbsp;
	<?php echo $this->Paginator->next(' Próxima »', null, null, ['class' => 'desabilitado']);?>
</div>


<!-- <?php echo $this->Html->link($product['Product']['title'], ['controller' => 'products' , 'action' => 'view', $product['Product']['id']]); ?> -->
