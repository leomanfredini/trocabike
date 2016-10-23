	<?php echo $this->Flash->render('auth'); ?>
	<?php //echo $this->Session->flash('auth'); ?>
<div class="forms">

<fieldset>
	<h2>Login<span></span></h2>
	<div class="forms-content">

<?php echo $this->Form->create('User'); ?>
	
				
		
		<?php echo $this->Form->input('username', ['label' => 'Usuario', 'class' => 'small-field']); ?>
		<?php echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'small-field']); ?>
				
	
	<?php echo $this->Form->end('Acessar'); ?>
	<?php //echo $this->Form->end(['label' => 'Acessar', 'div' => ['class' => 'search-submit']]); ?>	

</fieldset>
</div> 
