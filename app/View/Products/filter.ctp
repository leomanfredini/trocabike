<!-- Products -->
<div class="products">
	<div class="cl">&nbsp;</div>
	<?php foreach ($products as $product): ?>
	<ul>
	    <li>
	    	<a href="#"><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '227px','alt'=>'Produto']); ?></a>
	    	<div class="product-info">
	    		<h3></h3>
	    		<div class="product-desc">
					<h4></h4>
	    			<p><?php echo $product['Product']['title'] ?></p>
	    			<strong class="price"><?php echo $this->Number->currency($product['Product']['price'], 'EUR') ?></strong>
	    			<!-- <p><?php echo $this->Locale->date($product['Product']['modified']) ?></p> -->
	    			<a href="#" class="button-product-purchase">COMPRAR</a>
	    			<a href="#" class="button-product-proposal">EFETUAR LANCE</a>
	    		</div>
	    	</div>
    	</li>    	
	</ul>
	<?php endforeach; ?>
	<div class="cl">&nbsp;</div>
</div>
<!-- End Products -->



