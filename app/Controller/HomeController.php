<?php

/**
 * 
 */
class HomeController extends AppController {
    public $uses = array('Transaction', 'User', 'Wallet', 'Category');
    
    function index() {
        
    }
}
