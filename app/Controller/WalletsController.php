<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class WalletsController extends AppController {
    public $uses = array('Transaction', 'User', 'Wallet', 'Category');
    
    function index() {
        parent::checkExitsWallet();
        $data = $this->Wallet->find(
                'all',
                array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))));
        $title = 'Quản lý ví';
        $this->set(compact('title'));
        $this->set("data", $data);
    }
    
    function add(){
        if($this->request->is('POST')){
            $wallet = $this->request->data;
            $wallet['Wallet']['user_id'] = $this->Auth->user('id');
            $wallet['Wallet']['add_datetime'] = date('Y-m-d H:i:s');
            $wallet['Wallet']['upd_datetime'] = date('Y-m-d H:i:s');
            $this->Wallet->create();
            if($this->Wallet->save($wallet)){
                return $this->redirect(array('action' => 'index'));
            }
        }
        $title = 'Thêm ví';
        $message = NULL;
        if(sizeof($this->Wallet->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'))))) == 0){
            $message = 'Bạn cần tạo mới ví để sử dụng.';
        }
        $this->set(compact('message'));
        $this->set(compact('title'));
    }
    
    function edit($id){
        parent::checkExitsWallet();
        if ($this->request->is(array('post', 'put'))) {
            $wallet = $this->request->data;
            $wallet['Wallet']['upd_datetime'] = date('Y-m-d H:i:s');
            $this->Wallet->id = $id;
            if($this->Wallet->save($wallet)){
                return $this->redirect(array('action' => 'index'));
            }
        }
        $data = $this->Wallet->findById($id);
        if (!$this->request->data && $data != NULL && $data['Wallet']['user_id'] == $this->Auth->user('id')) {
            $this->request->data = $data;
        }
        $title = 'Sửa ví';
        $this->set(compact('title'));
    }
    
    function delete($id){
        parent::checkExitsWallet();
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        $this->Wallet->delete($id);
        return $this->redirect(array('action' => 'index'));
    }
    
    function selectwallet($id){
        parent::checkExitsWallet();
        if($this->request->is('post')){
            $walletSelect = $this->Wallet->findById($id);
            $this->Session->write(Configure::read('SESSION_WALLET_SELECT'), $walletSelect);
            return $this->redirect(array('controller' => 'transactions', 'action' => 'index'));
        }
    }
    
    function changeinitialtotal(){
        parent::checkExitsWallet();
        if($this->request->is('POST')){
            $selectWallet = $this->Session->read(Configure::read('SESSION_WALLET_SELECT'));
            if($selectWallet != NULL){
                $wallet_current = $this->Wallet->findById($selectWallet['Wallet']['id']);
                $wallet_current['Wallet']['initial_total'] = $this->request->data['Wallet']['initial_total'];
                $wallet_current['Wallet']['upd_datetime'] = date('Y-m-d H:i:s');
                $this->Wallet->id = $selectWallet['Wallet']['id'];
                if($this->Wallet->save($wallet_current)){
                    return $this->redirect(array('controller' => 'transactions', 'action' => 'index'));
                }
            }
        }
    }
}
