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
			<div class="box search">
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
			</div>
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
				<h3 class="ico ico1">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="col">
				<h3 class="ico ico2">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="col">
				<h3 class="ico ico3">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="col col-last">
				<h3 class="ico ico4">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Text Cols -->
		
	</div>
	<!-- End Side Full -->
	
	<!-- Footer -->
	<div id="footer">
		<p class="left">
			<a href="#">Home</a>
			<span>|</span>
			<a href="#">Suporte</a>
			<span>|</span>
			<a href="#">Sobre Nós</a>
			<span>|</span>
			<a href="#">Contato</a>
		</p>
		<p class="right">
			&copy; 2016 - <a href="http://www.google.com.br/">EL Sistemas</a>
		</p>
	</div>
	<!-- End Footer -->
	
</div>	
<!-- End Shell -->
	
	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
