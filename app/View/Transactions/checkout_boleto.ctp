<div class="forms">



<?php echo $this->Form->create('Transaction'); ?>

 <fieldset>
<h2><span></span></h2>
<div class="forms-content">

<!--     <strong>Dados do Produto</strong>
    <br><br>
    <?php echo $product['Product']['title']; ?>
    <?php echo $product['Product']['price']; ?>
 -->

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-width:0px;border-style:solid;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-yw4l{vertical-align:bottom;text-align:center}
.tg .tg-uiv9{vertical-align:bottom;text-align:center}
</style>
<table class="tg">
  <tr>
    <th class="tg-baqh" colspan="3"><h1>Sua compra foi efetuada com sucesso.</h1></th>
  </tr>
  <tr>
    <td class="tg-s6z2"><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '227px','alt'=>'Produto']); ?></td>   
  </tr>
  <tr>
    <td class="tg-yw4l"><strong class="price"><?php echo $product['Product']['title']; ?></strong></td>    
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-s6z2"><strong>Número do Pedido</strong><br><strong class="price"><?php echo $this->Session->read('trans_id'); ?></strong></td>    
  </tr>
  <tr>
    <td class="tg-s6z2"><strong>Valor Total da Compra</strong><br><strong class="price"><?php echo $this->Number->currency($this->Session->read('price') + $this->Session->read('frete'), 'EUR') ?></strong></td>
    
  </tr>
  <tr>
    <td class="tg-s6z2"><br><br>
      <?php 
        echo $this->Form->submit('  Visualizar Boleto ', [
          'div' => 'form-group',
          'class' => 'btn btn-primary']
        ); 
      ?>     
    </td>
    
  </tr>
</table>
<?php
    //$tid = $this->Session->read('boleto_id');
    //echo $tid;
    ?>

    <br><br>

    <?php echo $this->Form->end(); ?>
    
    </div>
  </fieldset>

</div>
