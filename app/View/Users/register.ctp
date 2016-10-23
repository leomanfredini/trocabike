<div class="forms">

<?php echo $this->Form->create('User'); ?>

 <fieldset>
<h2>Cadastro de Novo Usuário<span></span></h2>
<div class="forms-content">


    <?php echo $this->Form->input('name', array(
      'label' => 'Nome',
      'class' => 'field',
      'placeholder' => 'Digite seu primeiro nome'      
    )); ?>

    <?php echo $this->Form->input('surname', array(
      'label' => 'Sobrenome',
      'class' => 'field',
      'placeholder' => 'Digite seu sobrenome'      
    )); ?>

    <?php echo $this->Form->input('email', array(
      'label' => 'Email',
      'class' => 'field',
      'placeholder' => 'Digite seu endereço de email',
      'type' => 'email'
    )); ?>

    <?php echo $this->Form->input('cpf', array(
      'label' => 'CPF',
      'class' => 'small-field',
      'placeholder' => 'Somente números, sem os pontos',
      'type' => 'number'
    )); ?>

    <?php echo $this->Form->input('genre', array(
      'label' => array(
        'text' => 'Selecione o Gênero'
      ),
      'empty' => '',
      'class' => 'small-field',
      'options' => array(
        1 => 'Masculino',
        2 => 'Feminino'
      ),
    )); ?>


    <?php echo $this->Form->input('phone', array(
      'label' => 'Telefone',
      'class' => 'small-field',
      'placeholder' => 'Somente números',
      'type' => 'number'
    )); ?>


    <?php echo $this->Form->input('username', array(
      'label' => 'Nome de Usuário',
      'class' => 'small-field',
      'placeholder' => 'Digite o login desejado',
      'type' => 'text'
    )); ?>

    <?php echo $this->Form->input('password', array(
      'placeholder' => 'Mínimo 6 caracteres',
      'class' => 'small-field',
      'type' => 'password'
    )); ?>


    <?php echo $this->Form->input('password_confirm', array(
      'label' => 'Confirmar Senha',
      'class' => 'small-field',
      'placeholder' => 'Repita sua senha',
      'type' => 'password'
    )); ?>

    <br><br>
    <?php echo $this->Form->submit('Registrar', array(
      'div' => 'form-group',
      'class' => 'btn btn-primary'
    )); ?>

    <?php echo $this->Form->end(); ?>
    </div>
  </fieldset>




</div>
