<?php
/* display message saved in session if any */
echo $this->Session->flash();
?>
 
<div class="images-form">

	<?php echo $this->Form->create('Image', array('type' => 'file')); ?>
	    <fieldset>
	        <legend><?php echo 'Add Image'; ?></legend>
	        <?php       
	        	echo $this->Form->input('image', array('type' => 'file'));
	    	?>
	    </fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>

</div>


<div class="image-display">
	<?php 

	//if is set imageName show uploaded picture

		if(isset($imageName)) {
			echo $this->Html->image('/img/products/'.$imageName, array('alt' => 'uploaded image'));
		}
	?>
</div>
