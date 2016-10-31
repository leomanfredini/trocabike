<div class="forms">



<?php echo $this->Form->create('Product'); ?>

 <fieldset>
<h2>Meus Dados<span></span></h2>
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

    <strong>Genero: </strong>
    <?php  
      if ($user['User']['genre'] == '1'){
        echo "Masculino";
      } else {
        echo "Feminino";
      }
    ?>
    <br>
    <br>

    <strong>Telefone: </strong>
    <?php  echo $user['User']['phone']; ?>
    <br>
    <br>

    <strong>Nome de usuário: </strong>
    <?php  echo $user['User']['username']; ?>
    <br>
    <br>

    <strong>Senha: </strong>
    <?php  echo "******"; ?>
    <br>
    <br>
    <br>

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
    <br>
    <br>

    <?php
      echo $this->Html->link("Alterar Dados", array('controller' => 'Users','action'=> 'edit', $user['User']['id']), array( 'class' => 'input'))
    ?>

    <?php echo $this->Form->end(); ?>

    </div>
  </fieldset>




</div>