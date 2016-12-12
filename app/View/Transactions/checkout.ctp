<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
/*.tg  {border-collapse:separate;border-spacing:0;margin:0px auto;border: solid #ccc 1px; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px;}*/
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-0ord{text-align:center;width: 135px;}
.tg .tg-s6z2{text-align:center;border-style:solid;border-width:0px;}
.tg .tg-031e{text-align:center;width: 300px;}
.tg .tg-baqh{text-align:center;vertical-align:middle;}
.tg .tg-lqy6{text-align:center;vertical-align:top}
.tg .tg-yw4l{vertical-align:top;border-style:solid;border-width:0px;}
</style>




<!-- TABELA -->
<div class="forms">
<?php echo $this->Form->create('Checkout'); ?>
  <fieldset>
    <h2>Cálculo do Frete<span></span></h2>
    <br>
    <div class="forms-content">
      <table class="tg">
        <tr>
          <th class="tg-s6z2"><?php echo $this->Html->image(basename($product['Product']['filename']), ['width' => '227px','alt'=>'Produto']); ?></th>
          <th class="tg-031e"><strong><?php echo $product['Product']['title']; ?></strong></th>
          <th class="tg-0ord"><strong>
            <?php 
              if ($this->Session->read('proposal_id') != null){
                echo $this->Number->currency($proposal['Proposal']['price'], 'EUR');
              } else {
                echo $this->Number->currency($product['Product']['price'], 'EUR');
              }
            ?>       
          </strong></th>
        </tr>
        <tr>
          <td class="tg-yw4l"></td>
          <td class="tg-yw4l"></td>
          <td class="tg-yw4l">
            <?php 
              //echo $this->Form->create('Frete');
              echo $this->Form->input('cep', array(
                'label' => '',
                'class' => 'small-field',
                'placeholder' => 'CEP',
                'type' => 'number'
              ));
            ?>
            <?php 
            echo $this->Form->submit(' Calcular Frete ', array(
              'div' => 'form-group',
              'id' => 'cep',
              'class' => 'btn btn-primary'
            ));

            echo $this->Form->end(); 
            
            ?>
          </td>
        </tr>
        
        
      </table>
    <?php //echo $this->Form->end(); ?>
    </div>
  </fieldset>
</div>
