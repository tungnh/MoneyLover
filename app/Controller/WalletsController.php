<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class WalletsController extends AppController {
    public $uses = array('Transaction', 'User', 'Wallet', 'Category');
    public $components = array ('Paginator');
    
    function index() {
        parent::checkExitsWallet();
        $this->Wallet->recursive = 0;
        $this->paginate = array(
            'conditions' => array (
                'Wallet.user_id' => $this->Auth->user('id')
            ),
            'limit' => Configure::read('LIMIT'),
            'order' => array(
                'Wallet.id' => 'desc',
            )
        );
        $this->Session->write(Configure::read('SESSION_FILTER'), '');
        $filter = '';
        $title = 'Quản lý ví';
        $this->set(compact('title'));
        $this->set('data', $this->Paginator->paginate('Wallet'));
        $this->set(compact('filter'));
    }
    
    function search(){
        parent::checkExitsWallet();
        $this->Wallet->recursive = 0;
        if($this->request->is('POST')){
            $this->Session->write(Configure::read('SESSION_FILTER'), $this->request->data['Search']['keyword']);
        }
        $filter = $this->Session->read(Configure::read('SESSION_FILTER'));
        $this->paginate = array(
            'conditions' => array (
                'Wallet.user_id' => $this->Auth->user('id'),
                'Wallet.name LIKE' => '%'.$filter.'%'
            ),
            'limit' => Configure::read('LIMIT'),
            'order' => array(
                'Wallet.id' => 'desc',
            )
        );
        $title = 'Danh mục';
        $this->set(compact('title'));
        $this->set(compact('filter'));
        $this->set('data', $this->Paginator->paginate('Wallet'));
        $this->render('index');
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
