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
        $json_data = array(
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Ăn uống', 60),
            array('Xăng xe', 30),
            array('Mua sắm', 10)
        );
        $title = 'Báo cáo';
        $this->set(compact('title'));
        $this->set('json_data', json_encode($json_data));
    }
}

