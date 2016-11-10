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
        'text' => 'Gênero'
      ),
      'empty' => '',
      'class' => 'field',
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

    <br>
    <hr>
    <br>
    <strong>Endereço de Cadastro</strong>
    <br><br>

    <?php echo $this->Form->input('address', array(
      'label' => 'Endereço',
      'class' => 'field',
      'placeholder' => 'Rua, Avenida, Travessa, etc'      
    )); ?>

    <?php echo $this->Form->input('number', array(
      'label' => 'Número',
      'class' => 'small-field',
      'type' => 'number'     
    )); ?>

    <?php echo $this->Form->input('complement', array(
      'label' => 'Complemento',
      'class' => 'small-field',
      'placeholder' => 'Apartamento, Loja'      
    )); ?>

    <?php echo $this->Form->input('district', array(
      'label' => 'Bairro',
      'class' => 'field'      
    )); ?>

    <?php echo $this->Form->input('city', array(
      'label' => 'Cidade',
      'class' => 'field'
    )); ?>

    <?php echo $this->Form->input('state', array(
      'label' => array(
        'text' => 'Estado'
      ),
      'empty' => '',
      'class' => 'field',
      'options' => array(
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espirito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MS' => 'Mato Grosso do Sul',
        'MT' => 'Mato Grosso',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
      ),
    )); ?>

    <?php echo $this->Form->input('cep', array(
      'label' => 'CEP',
      'class' => 'small-field',
      'type' => 'number'     
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
