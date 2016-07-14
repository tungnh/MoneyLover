<?php

/**
 * 
 */
class Transaction extends AppModel {

    var $name = "Transaction";
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
        ),
        'Wallet' => array(
            'className' => 'Wallet',
        ),
    );
}
