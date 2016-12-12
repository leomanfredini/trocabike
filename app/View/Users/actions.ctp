<div class="forms">

<fieldset>
<h2>Minha Conta<span></span></h2>
    <div class="forms-contentactions">


<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-width:0px;border-style:solid;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 10px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 30px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
</style>
<table class="tg">
  <tr>
    <th class="tg-s6z2"><?php echo $this->html->image('man-riding-a-motorbike.png') ?></th>
    <th class="tg-s6z2"><?php echo $this->html->image('paper-bag.png') ?></th>
    <th class="tg-s6z2"><?php echo $this->html->image('pedido.png') ?></th>
    <th class="tg-s6z2"><?php echo $this->html->image('addition-sign.png') ?></th>
    <th class="tg-s6z2"><?php echo $this->html->image('proposals.png') ?></th>
<!--     <?php
        if (AuthComponent::user('role') == 'admin'){ ?>
            <th class="tg-s6z2"><?php //echo $this->html->image('root.png') ?></th>    
    <?php  } ?> -->
    
  </tr>
  <tr>
    <td class="tg-s6z2"><strong><?php echo $this->Html->link('Meus Dados', ['controller' => 'users', 'action' => 'view', AuthComponent::user('id')], ['class' => 'field']); ?></strong></td>
    <td class="tg-s6z2"><strong><?php echo $this->Html->link('Meus Produtos', ['controller' => 'products', 'action' => 'myproducts'], ['class' => 'field']); ?></strong></td>
    <td class="tg-s6z2"><strong><?php echo $this->Html->link('Minhas Compras', ['controller' => 'transactions', 'action' => 'mytransactions'], ['class' => 'field']); ?></strong></td>
    <td class="tg-s6z2"><strong><?php echo $this->Html->link('Adicionar Produto', ['controller' => 'products', 'action' => 'add'], ['class' => 'field']); ?></strong></td>
    <td class="tg-s6z2"><strong><?php echo $this->Html->link('Propostas Enviadas', ['controller' => 'proposals', 'action' => 'index'], ['class' => 'field']); ?></strong></td>
<!--     <?php
        if (AuthComponent::user('role') == 'admin'){ ?>
             <td class="tg-s6z2"><strong><?php echo $this->Html->link('Administração', ['controller' => 'products', 'action' => 'index'], ['class' => 'field']); ?></strong></td>
    <?php  } ?> -->
   
  </tr>
  <?php
        if (AuthComponent::user('role') == 'admin'){ ?>
  <tr>
    <td class="tg-s6z2">
      <?php echo $this->html->image('root.png') ?>
      <br>
      <strong><?php echo $this->Html->link('Gestão de Pagamentos', ['controller' => 'transactions', 'action' => 'index'], ['class' => 'field']); ?></strong></td>
  </tr>
  <?php  } ?>
</table>

    </div>
</fieldset>




</div>