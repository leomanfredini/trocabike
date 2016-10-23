<div class="forms">


<fieldset>
<h2>Cadastro de Produto<span></span></h2>
<div class="forms-content">

	<?php 
	echo $this->Form->create('Product', array('type' => 'file'));
	
	echo $this->Form->input('title', [
		'label' => 'Título', 
		'placeholder' => 'Digite o título do seu produto',
		'class' => 'field'
	]);
	
	echo $this->Form->input('long_description', [
		'label' => 'Descrição Detalhada', 
		'class' => 'field',
		'placeholder' => 'Digite a descrição do produto'
	]);

	echo $this->Form->input('category_id', [
		'label' => 'Categoria', 
		'class' => 'field',
		'empty' => '- Escolha a Categoria -'
	]);


	
	echo $this->Form->input('price', [
		'label' => 'Valor', 
		'placeholder' => 'Valor do produto', 
		'class' => 'small-field',
		'type' => 'number'
	]);
	
	echo $this->Form->input('state', [
		'label' => ['text' => 'Estado de Uso'],
		'options' => [
			1 => 'Novo',
			2 => 'Usado'
		],
		'class' => 'field'
	]);

	echo $this->Form->input('weight', [
		'label' => 'Peso', 
		'placeholder' => 'Peso em Gramas', 
		'class' => 'small-field',
		'type' => 'number'
	]);

	echo $this->Form->input('width', [
		'label' => 'Largura', 
		'placeholder' => 'Largura em Centímetros', 
		'class' => 'small-field',
		'type' => 'number'
	]);

	echo $this->Form->input('height', [
		'label' => 'Altura', 
		'placeholder' => 'Altura em Centímetros', 
		'class' => 'small-field',
		'type' => 'number'
	]);

	
	echo $this->Form->input('filename', [
		'label' => 'Imagem do Produto', 		
		'type' => 'file'
	]);

	echo $this->Form->input('user_id', [
		'type'=>'hidden', 
		'value' => $this->Session->read('User_id')
	]);



	?>

	<br><br>
	<?php echo $this->Form->end('Cadastrar'); ?>

	</fieldset>
	</div>

</div>


<div class="image-display">
<!-- 	<?php 

		// if(isset($imageName)) {
		// 	echo $this->Html->image('/img/products/'.$imageName, array('alt' => 'uploaded image'));
		// }
	?> -->
</div>
