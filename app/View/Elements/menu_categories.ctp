<div class="box-content">
    <?php
        $categories = $this->requestAction('categories/index');
    ?>
    <ul>
    <?php foreach ($categories as $category): ?>
        <li><?php echo $this->Html->link($category['Category']['name'], ['controller' => 'products' , 'action' => 'filter', $category['Category']['id']]); ?></li>
    <?php endforeach; ?>
    </ul>
</div>  
