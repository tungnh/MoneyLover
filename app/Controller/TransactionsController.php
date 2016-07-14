<?php

/**
 * 
 */
App::uses('AppController', 'Controller');

class TransactionsController extends AppController {
    public $uses = array('Transaction', 'User', 'Wallet', 'Category');

    function index() {
        parent::checkExitsWallet();
        $transactions = $this->Transaction->find(
                'all',
                array(
                    'conditions' => array(
                        'wallet_id' => $this->Session->read(Configure::read('SESSION_WALLET_SELECT'))['Wallet']['id'])
                    ,
                    'order' => array(
                        'Transaction.upd_datetime' => 'ASC')));
        $categorys = $this->Category->find(
                'all',
                array(
                    'conditions' => array(
                        'user_id' => array(0, $this->Auth->user('id'))),
                    'order' => array(
                        'Category.name' => 'ASC')));
        $title = 'Sổ giao dịch';
        $this->set(compact('title'));
        $this->set(compact('transactions'));
        $this->set('categorys', $categorys);
    }

    function add() {
        parent::checkExitsWallet();
        if ($this->request->is('POST')) {
            $info = $this->request->data;
            $info['Transaction']['add_datetime'] = date('Y-m-d H:i:s');
            $info['Transaction']['upd_datetime'] = date('Y-m-d H:i:s');
            $info['Transaction']['wallet_id'] = $this->Session->read(Configure::read('SESSION_WALLET_SELECT'))['Wallet']['id'];
            $this->Transaction->create();
            $this->Transaction->save($info);
            return $this->redirect(array('action' => 'index'));
        }
        $title = 'Thêm giao dịch';
        $this->set(compact('title'));
        $this->set('categorys', NULL);
    }
    
    function edit($id){
        parent::checkExitsWallet();
        if ($this->request->is(array('post', 'put'))) {
            $this->Transaction->id = $id;
            $this->Transaction->save($this->request->data);
            return $this->redirect(array('controller' => 'transactions', 'action' => 'index'));
        }
        $data = $this->Transaction->findById($id);
        if (!$this->request->data) {
            $this->request->data = $data;
        }
        $title = 'Sửa giao dịch';
        $this->set(compact('title'));
        $this->set('categorys', NULL);
    }
    
    function delete($id){
        parent::checkExitsWallet();
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        $this->Transaction->delete($id);
        return $this->redirect(array('controller' => 'transactions', 'action' => 'index'));
    }
    
    function getcategorybytype($type){
        parent::checkExitsWallet();
        $this->layout = NULL;
        if($type != 3){
            $sql = array(
                'conditions' => array(
                    'type' => $type,
                    'user_id' => $this->Auth->user('id')));
            $data = $this->Category->find('all', $sql);
        } else {
            $data = $this->Category->find('all');
        }
        $this->set('data', $data);
    }
    
    function tranfermoney(){
        parent::checkExitsWallet();
        if($this->request->is('POST')){
            $tranfer = $this->request->data;
            $selectWallet = $this->Session->read(Configure::read('SESSION_WALLET_SELECT'));
            if($selectWallet != NULL){
                //Create Transaction From
                $transaction_from['Transaction']['wallet_id'] = $selectWallet['Wallet']['id'];
                $transaction_from['Transaction']['category_id'] = 1;
                $transaction_from['Transaction']['amount'] = $tranfer['Transaction']['amount'];
                $transaction_from['Transaction']['description'] = $tranfer['Transaction']['description'];
                $transaction_from['Transaction']['add_datetime'] = date('Y-m-d H:i:s');
                $transaction_from['Transaction']['upd_datetime'] = date('Y-m-d H:i:s');
                $this->Transaction->create();
                $this->Transaction->save($transaction_from);
                
                //Create Transaction From
                $transaction_to['Transaction']['wallet_id'] = $tranfer['Transaction']['to_wallet'];
                $transaction_to['Transaction']['category_id'] = 2;
                $transaction_to['Transaction']['amount'] = $tranfer['Transaction']['amount'];
                $transaction_to['Transaction']['description'] = $tranfer['Transaction']['description'];
                $transaction_to['Transaction']['add_datetime'] = date('Y-m-d H:i:s');
                $transaction_to['Transaction']['upd_datetime'] = date('Y-m-d H:i:s');
                $this->Transaction->create();
                $this->Transaction->save($transaction_to);
                return $this->redirect(array('controller' => 'transactions', 'action' => 'index'));
            }
        }
    }
}
