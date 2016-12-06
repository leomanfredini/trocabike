<?php echo $this->Flash->render('auth'); ?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:1px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:1px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
</style>

<div class="forms">

<?php echo $this->Form->create('User'); ?>

	<fieldset>
		<h2>Login<span></span></h2>

		<div class="forms-content">
			<table class="tg">
			  <tr>
			    <th class="tg-s6z2"><?php echo $this->Form->input('username', ['label' => 'Usuário', 'class' => 'small-field']); ?></th>
			  </tr>
			  <tr>
			    <td class="tg-s6z2"><?php echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'small-field']); ?></td>
			  </tr>
			  <tr>
			    <td class="tg-s6z2"><?php echo $this->Form->end('Acessar'); ?></td>
			  </tr>
			  <tr>
			    <td class="tg-s6z2">&nbsp;</td>
			  </tr>
			  <tr>
			    <td class="tg-s6z2">&nbsp;</td>
			  </tr>
			  <tr>
			    <td class="tg-s6z2"><strong><?php echo $this->Html->link('Cadastrar Novo Usuário', ['controller' => 'users', 'action' => 'register']); ?></strong></td>
			  </tr>
			    <tr>
			    <td class="tg-s6z2">&nbsp;</td>
			  </tr>
			</table>

		</div>
	</fieldset>
</div> 