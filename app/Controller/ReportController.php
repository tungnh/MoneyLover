<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

class ReportController extends AppController {
    public $uses = array('Transaction', 'User', 'Wallet', 'Category');
    
    function index(){
        $title = 'Báo cáo';
        $this->set(compact('title'));
    }
}

