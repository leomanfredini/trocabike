<div class="box-content">
    <ul>
<!--         <li><a href="#">Category 1</a></li>
        <li><a href="#">Category 1</a></li>
        <li><a href="#">Category 1</a></li>
        <li><a href="#">Category 1</a></li>
        <li><a href="#">Category 1</a></li> -->

        <?php //$categories = $this->requestAction('/categories/index'); ?>

        <?php foreach ($categories as $category): ?>
            <ul>
                <li><?php echo $category['Category']['name']; ?></li>
            </ul>
        <?php endforeach; ?>    
        
    </ul>
</div>  