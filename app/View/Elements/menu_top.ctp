<!-- <h1 id="logo"><a href="#">sshoparound</a></h1> -->
<h1 id="logo"><?php echo $this->Html->link('', ['controller' => 'products', 'action' => 'index']); ?></h1>   
<!-- Cart -->
<div id="cart">
    <?php 
        if ($this->Session->check('User_id')) { ?>
            <a href="#" class="cart-link">Olá <?php echo $this->Session->read('User_name'); ?></a>
            <div class="cl">&nbsp;</div>
            <span><strong><?php echo $this->Html->link('Minha Conta', ['controller' => 'users', 'action' => 'actions'], ['class' => 'field']); ?></strong></span>
            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <span><strong><?php echo $this->Html->link('Sair', ['controller' => 'users', 'action' => 'logout'], ['class' => 'field']); ?></strong></span>
    <?php } else { ?>
            <span>Bem vindo visitante</span>
            <div class="cl">&nbsp;</div>
            <span>Efetue <strong><?php echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login'], ['class' => 'field']); ?></strong> ou <strong><?php echo $this->Html->link('Registre-se', ['controller' => 'users', 'action' => 'register'], ['class' => 'field']); ?></strong></span>            
    <?php }  ?>
</div>
<!-- End Cart -->

<!-- Navigation -->
<div id="navigation">
    <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#">Suporte</a></li>      
        <li><a href="#">Sobre Nós</a></li>
        <li><a href="#">Contato</a></li>
    </ul>
</div>
<!-- End Navigation -->