<?php

/**
 * 
 */
class CategorysController extends AppController {
    var $name = "Categorys";
    public $uses = array('Transaction', 'User', 'Wallet', 'Category');
    public $components = array ('Paginator');

    function index() {
        parent::checkExitsWallet();
        $this->Category->recursive = 0;
        $this->paginate = array(
            'conditions' => array (
                'Category.user_id' => $this->Auth->user('id')
            ),
            'limit' => Configure::read('LIMIT'),
            'order' => array(
                'Category.id' => 'desc',
            )
        );
        $this->Session->write(Configure::read('SESSION_FILTER'), '');
        $filter = '';
        $title = 'Danh mục';
        $this->set(compact('title'));
        $this->set('data', $this->Paginator->paginate('Category'));
        $this->set(compact('filter'));
    }
    
    function search(){
        parent::checkExitsWallet();
        $this->Category->recursive = 0;
        if($this->request->is('POST')){
            $this->Session->write(Configure::read('SESSION_FILTER'), $this->request->data['Search']['keyword']);
        }
        $filter = $this->Session->read(Configure::read('SESSION_FILTER'));
        $this->paginate = array(
            'conditions' => array (
                'Category.user_id' => $this->Auth->user('id'),
                'Category.name LIKE' => '%'.$filter.'%'
            ),
            'limit' => Configure::read('LIMIT'),
            'order' => array(
                'Category.id' => 'desc',
            )
        );
        $title = 'Danh mục';
        $this->set(compact('title'));
        $this->set(compact('filter'));
        $this->set('data', $this->Paginator->paginate('Category'));
        $this->render('index');
    }

    function add() {
        parent::checkExitsWallet();
        if ($this->request->is('POST')) {
            $categoryInfo = $this->request->data;
            $categoryInfo['Category']['user_id'] = $this->Auth->user('id');
            $categoryInfo['Category']['add_datetime'] = date('Y-m-d H:i:s');
            $categoryInfo['Category']['upd_datetime'] = date('Y-m-d H:i:s');
            $this->Category->create();
            if ($this->Category->save($categoryInfo)) {
                //$this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        $title = 'Thêm danh mục';
        $this->set(compact('title'));
    }

    function edit($id) {
        parent::checkExitsWallet();
        if ($this->request->is(array('post', 'put'))) {
            $category = $this->request->data;
            $category['Category']['upd_datetime'] = date('Y-m-d H:i:s');
            $this->Category->id = $id;
            $this->Category->save($category);
            return $this->redirect(array('action' => 'index'));
        }
        $data = $this->Category->findById($id);
        if (!$this->request->data && $data != NULL && $data['Category']['user_id'] == $this->Auth->user('id')) {
            $this->request->data = $data;
        }
        $title = 'Sửa danh mục';
        $this->set(compact('title'));
    }

    function delete($id) {
        parent::checkExitsWallet();
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Category->delete($id);
        return $this->redirect(array('action' => 'index'));
    }
}
