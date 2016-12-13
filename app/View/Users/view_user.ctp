<div class="forms">



<?php echo $this->Form->create('User'); ?>

 <fieldset>
<h2>Dados do Usuário<span></span></h2>
<div class="forms-content">

    <strong>Nome: </strong>    
    <?php  echo $user['User']['name'] . '&nbsp;&nbsp;' . $user['User']['surname']; ?>
    <br>
    <br>

    <strong>Email: </strong>
    <?php  echo $user['User']['email']; ?>
    <br>
    <br>

    <strong>CPF: </strong>
    <?php  echo $user['User']['cpf']; ?>
    <br>
    <br>

    <strong>Telefone: </strong>
    <?php  echo $user['User']['phone']; ?>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <strong>Endereço de Entrega</strong>
    <br><br>

    
    <strong>Endereço: </strong>
    <?php  echo $user['User']['address']; ?>
    <br>
    <br>

    <strong>Número: </strong>
    <?php  echo $user['User']['number']; ?>
    <br>
    <br>

    <strong>Complemento: </strong>
    <?php  echo $user['User']['complement']; ?>
    <br>
    <br>

    <strong>Bairro: </strong>
    <?php  echo $user['User']['district']; ?>
    <br>
    <br>

    <strong>Cidade: </strong>
    <?php  echo $user['User']['city']; ?>
    <br>
    <br>

    <strong>Estado: </strong>
    <?php  echo $user['User']['state']; ?>
    <br>
    <br>

    <strong>CEP: </strong>
    <?php  echo $user['User']['cep']; ?>
    <?php  echo $user['User']['cep']; ?>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <strong>Dados Bancários</strong>
    <br><br>

     <strong>Banco: </strong>
    <?php  echo $user['User']['bank']; ?>
    <br>
    <br>

     <strong>Agência: </strong>
    <?php  echo $user['User']['agency']; ?>
    <br>
    <br>

     <strong>Conta: </strong>
    <?php  echo $user['User']['account']; ?>
    <br>
    <br>

    <?php echo $this->Form->end(); ?>

    </div>
  </fieldset>




</div>