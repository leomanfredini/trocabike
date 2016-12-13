<div class="forms">

<?php echo $this->Form->create('User'); ?>

 <fieldset>
<h2>Dados do Usuário<span></span></h2>
<div class="forms-content">


    <?php echo $this->Form->input('name', array(
      'label' => 'Nome',
      'class' => 'field'   
    )); ?>

    <?php echo $this->Form->input('surname', array(
      'label' => 'Sobrenome',
      'class' => 'field'
    )); ?>

    <?php echo $this->Form->input('email', array(
      'label' => 'Email',
      'class' => 'field',
      'type' => 'email'
    )); ?>

    <?php echo $this->Form->input('cpf', array(
      'label' => 'CPF',
      'class' => 'small-field',
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
      'type' => 'number'
    )); ?>


    <?php echo $this->Form->input('username', array(
      'label' => 'Nome de Usuário (Não pode ser alterado)',
      'class' => 'small-field',      
      'type' => 'text',
      'readonly' => 'readonly'
    )); ?>

    <?php echo $this->Form->input('password_update', array(      
      'label' => 'Senha',
      'class' => 'small-field',
      'type' => 'password',
      'required' => 0
    )); ?>


    <?php echo $this->Form->input('password_confirm_update', array(
      'label' => 'Confirmar Senha',
      'class' => 'small-field',     
      'type' => 'password',
      'required' => 0
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
    <br>
    <hr>
    <br>
    <strong>Dados Bancários</strong>
    <br><br>
    <?php echo $this->Form->input('bank', array(
      'label' => 'Nome do Banco',
      'class' => 'field'
    )); ?>

     <?php echo $this->Form->input('agency', array(
      'label' => 'Agência',
      'class' => 'small-field',
      'type' => 'number'     
    )); ?>

     <?php echo $this->Form->input('account', array(
      'label' => 'Conta',
      'class' => 'small-field',
      'type' => 'number'     
    )); ?>
    

    <br><br>
    <?php echo $this->Form->submit('Alterar Dados', array(
      'div' => 'form-group',
      'class' => 'btn btn-primary'
    )); ?>

    <?php echo $this->Form->end(); ?>
    </div>
  </fieldset>




</div>
