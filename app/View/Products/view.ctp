<div class="forms">



<?php echo $this->Form->create('Product'); ?>

 <fieldset>
<h2><span></span></h2>
<div class="forms-content">



<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-width:0px;border-style:solid;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-uiv9{text-align:center;vertical-align:bottom;}
</style>
<table class="tg">
  <tr>
    <th class="tg-baqh" colspan="3"><h1><?php echo $product['Product']['title']; ?></h1></th>
  </tr>
  <tr>
    <td class="tg-s6z2" rowspan="3"><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '227px','alt'=>'Produto']); ?></td>
    <td class="tg-yw4l">&nbsp;&nbsp;</td>
    <td class="tg-uiv9"><strong>Especificações</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" rowspan="3"><?php echo $product['Product']['long_description']; ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-s6z2"><strong class="price"><?php echo $this->Number->currency($product['Product']['price'], 'EUR') ?></strong></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-s6z2" rowspan="2"><?php echo $this->Html->link('COMPRAR', ['controller' => 'products', 'action' => 'purchase', $product['Product']['id']], ['class' => 'button-product-purchase']); ?><?php echo $this->Html->link('ENVIAR PROPOSTA', ['controller' => 'proposals', 'action' => 'send', $product['Product']['id']], ['class' => 'button-product-proposal']); ?></td>
    <td class="tg-yw4l"></td>
    <td class="tg-031e"><strong>Estado de Uso: </strong>
        <?php 
            if ($product['Product']['state'] == 1) {
                echo "Novo";
            } else {
                echo "Usado";        
            }
        ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-031e"><strong>Peso: </strong><?php echo $product['Product']['weight']; ?> gramas</td>
  </tr>
  <tr>
    <td class="tg-s6z2" rowspan="2"><?php //echo $this->Html->link('ENVIAR PROPOSTA', ['controller' => 'proposals', 'action' => 'send', $product['Product']['id']], ['class' => 'button-product-proposal']); ?></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"><strong>Altura: </strong><?php echo $product['Product']['width']; ?> cm</td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"><strong>Largura: </strong><?php echo $product['Product']['height']; ?> cm</td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"><strong>Comprimento: </strong><?php echo $product['Product']['length']; ?> cm</td>
  </tr>
  
</table>



    <?php echo $this->Form->end(); ?>

    </div>
  </fieldset>

</div>