<div class="box-content">
    <?php
        $categories = $this->requestAction('categories/index');
    ?>
    <ul>
    <?php foreach ($categories as $category): ?>
        <li><a><?php echo $category['Category']['name']; ?></a></li>
    <?php endforeach; ?>
    </ul>
</div>  