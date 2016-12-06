<?php

class Transaction extends AppModel {

    public $belongsTo = [
        'User' => [
            'className' => 'User',
            'foreignKey' => 'user_id'            
        ],
        'Product' => [
            'className' => 'Product',
            'foreignKey' => 'product_id'            
        ],
        'Buyer' => [
            'className' => 'User',
            'foreignKey' => 'buyer_id'            
        ],
        
    ];

}