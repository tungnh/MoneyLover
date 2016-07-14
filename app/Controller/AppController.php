<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = array(
        'Flash',
        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users', 
                'action' => 'index'
                ),
            'logoutRedirect' => array(
                'controller' => 'users', 
                'action' => 'login'
                ),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
                ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'fields' => array(
                        'username' => 'email')
                    )
                ),
            'authError' => 'You can\' access that page',
            'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('*');
        $wallets = $this->Wallet->find(
                'all',
                array(
                    'conditions' => array(
                        'user_id' => $this->Auth->user('id'))));
        if($this->Session->read(Configure::read('SESSION_WALLET_SELECT')) == NULL){
            if($wallets != NULL && sizeof($wallets) > 0){
                $this->Session->write(Configure::read('SESSION_WALLET_SELECT'), $wallets[0]);
            }
            else{
                $this->Session->write(Configure::read('SESSION_WALLET_SELECT'), NULL);
            }
        } else{
            if($wallets != NULL && sizeof($wallets) > 0){
                $wallet_tmp = $this->Wallet->findById($this->Session->read(Configure::read('SESSION_WALLET_SELECT'))['Wallet']['id']);
                if($wallet_tmp != NULL && $wallet_tmp['Wallet']['user_id'] == $this->Auth->user('id')){
                    $this->Session->write(Configure::read('SESSION_WALLET_SELECT'), $wallet_tmp);
                } else{
                    $this->Session->write(Configure::read('SESSION_WALLET_SELECT'), NULL);
                }
            }
            else {
                $this->Session->write(Configure::read('SESSION_WALLET_SELECT'), NULL);
            }
        }
        /*if($selectWallet == NULL){
            if($wallets != NULL){
                $selectWallet = $wallets[0];
            }
            else{
                $selectWallet = NULL;
            }
        } else{
            $selectWallet = $this->Wallet->findById($selectWallet['Wallet']['id']);
            if($selectWallet['Wallet']['user_id'] != $this->Auth->user('id')){
                $selectWallet = NULL;
            }
        }*/
        $selectWallet = $this->Session->read(Configure::read('SESSION_WALLET_SELECT'));
        $transactionbyusers = $this->Transaction->find('all');
        $user = $this->User->findById($this->Auth->user('id'));
        $this->set(compact('transactionbyusers'));
        $this->set('wallets', $wallets);
        $this->set('selectWallet', $selectWallet);
        $this->set('user', $user);
    }

    public function isAuthorized() {
        return true;
    }
    
    public function checkExitsWallet(){
        if(sizeof($this->Wallet->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'))))) == 0){
            return $this->redirect(array('controller' => 'wallets', 'action' => 'add'));
        }
    }
}
