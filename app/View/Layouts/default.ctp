<?php
$cakeDescription = __d('cake_dev', 'TrocaBike');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
		//echo $this->Html->link('../style');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		//
		echo $this->Html->script('jquery-1.4.1.min.js');
		echo $this->Js->writeBuffer();
		echo $this->Html->script('jquery.jcarousel.pack.js');
		echo $this->Js->writeBuffer();
		echo $this->Html->script('jquery-func.js');
	?>
</head>
<body>

<!-- Shell -->	
<div class="shell">
	
	<!-- Header -->	
	<div id="header">
				

		<?php echo $this->element('menu_top'); ?>

	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;</div>
		
		<!-- Content -->
		<div id="content">			
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>			
		</div>
		<!-- End Content -->
		
		<!-- Sidebar -->
		<div id="sidebar">
			
			<!-- Search -->
<!-- 			<div class="box search">
				<h2>Busca <span></span></h2>
				<div class="box-content">
					<form action="" method="post">
						
						<label>Palavra-chave</label>
						<input type="text" class="field" />
						
						<label>Categoria</label>
						<select class="field">
							<option value="">-- Selecione a Categoria --</option>
						</select>					
						
						<input type="submit" class="search-submit" value="Search" />						
	
					</form>
				</div>
			</div> -->
			<!-- End Search -->
			
			<!-- Categories -->
			<div class="box categories">
				<h2>Categorias <span></span></h2>

				<?php echo $this->element('menu_categories'); ?>
				
			</div>
			<!-- End Categories -->
			
		</div>
		<!-- End Sidebar -->
		
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	
	<!-- Side Full -->
	<div class="side-full">
		
		
		
		<!-- Text Cols -->
		<div class="cols">
			<div class="cl">&nbsp;</div>
			<div class="col">
				<h3 class="ico ico1">Compre com Segurança</h3>
				<p>Compre seus produtos com a garantia de recebimento ou o seu dinheiro de volta.</p>
				<p class="more"></p>
			</div>
			<div class="col">
				<h3 class="ico ico2">Venda com Segurança</h3>
				<p>Anuncie seus produtos em nossa plataforma especializada, garantindo sua excelente visibilidade.</p>
				<p class="more"></p>
			</div>
			<div class="col">
				<h3 class="ico ico3">Suporte Imediato</h3>
				<p>Em caso de dúvidas, garantimos auxílio especializado.</p>
				<p class="more"></p>
			</div>
			<div class="col col-last">
				<h3 class="ico ico4">Sempre Disponível</h3>
				<p>Aberto 24 horas por dia, 7 dias por semana.</p>
				<p class="more"></p>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Text Cols -->
		
	</div>
	<!-- End Side Full -->
	
	<!-- Footer -->
	<div id="footer">
		<!-- <p class="left">
			<a href="#">Home</a>
			<span>|</span>
			<a href="#">Suporte</a>
			<span>|</span>
			<a href="#">Sobre Nós</a>
			<span>|</span>
			<a href="#">Contato</a>
		</p> -->
		<p class="right">
			&copy; 2016 - <a href="http://www.google.com.br/">EL Sistemas</a>
		</p>
	</div>
	<!-- End Footer -->
	
</div>	
<!-- End Shell -->
	<?php echo $this->fetch('scriptBottom'); ?>
	<?php echo $this->element('sql_dump'); ?>

</body>
</html>
