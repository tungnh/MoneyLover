<?php

/**
 * 
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    var $name = "Users";
    public $uses = array('Wallet', 'User', 'Category', 'Transaction',);
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup', 'active', 'forgotpassword');
    }

    function index() {
        $data = $this->User->find("all");
        $this->set("data", $data);
    }
    
    function edit(){
        $data = $this->User->findById($this->Auth->user('id'));
        if($this->request->is('POST')){
            $user = $this->request->data;
            //Upload image
            if (!empty($this->request->data['User']['avatar']['name'])) {
                $file = $this->request->data['User']['avatar'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                    
                if (in_array($ext, $arr_ext)) {
                    $folder_url = WWW_ROOT.Configure::read('FOLDER_IMG_USER_UPLOAD');
                    if(!is_dir($folder_url)){
			mkdir($folder_url);
                    }
                    $file_name = date('YmdHis').$file['name'];
                    //Upload
                    move_uploaded_file($file['tmp_name'], $folder_url.$file_name);
                    //Delete file old
                    $current_file = new File($folder_url.$data['User']['avatar']);
                    if ($current_file->exists()){
                        $current_file->delete();
                    }
                    $user['User']['avatar'] = $file_name;
                }
            } else {
                $user['User']['avatar'] = $data['User']['avatar'];
            }
            $user['User']['upd_datetime'] = date('Y-m-d H:i:s');
            $this->User->id = $this->Auth->user('id');
            if($this->User->save($user)){
                return $this->redirect(array('action' => 'profile'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $data;
        }
        $title = 'Chỉnh sửa thông tin cá nhân';
        $this->set(compact('title'));
    }
    
    function changepassword(){
        if($this->request->is('POST')){
            $user = $this->request->data;
            $user['User']['upd_datetime'] = date('Y-m-d H:i:s');
            $this->User->id = $this->Auth->user('id');
            if($this->User->save($user)){
                return $this->redirect(array('action' => 'logout'));
            }
        }
        $title = 'Đổi mật khẩu';
        $this->set(compact('title'));
    }

    function add() {
    }
    
    function profile(){
        $data = $this->User->findById($this->Auth->user('id'));
        $title = 'Thông tin tài khoản';
        $this->set(compact('title'));
        $this->set('data', $data);
    }
    
    function signup(){
        $this->layout = NULL;
        if($this->request->is('POST')){
            $info = $this->request->data;
            $info['User']['add_datetime'] = date('Y-m-d H:i:s');
            $info['User']['upd_datetime'] = date('Y-m-d H:i:s');
            $info['User']['active_flg'] = 0;
            $this->User->create();
            if($this->User->save($info)){
                //Send mail
                $link = array('controller' => 'users', 'action' => 'active', $this->User->id);
                $mail = new CakeEmail('smtp');
                $mail->to($info['User']['email'])
                        ->subject('Money Lover: Thông tin kích hoạt tài khoản')
                        ->template('active')
                        ->emailFormat('html')
                        ->viewVars(array('name' => $info['User']['first_name']." ".$info['User']['last_name'], 'link' => $link))
                        ->send('My message');
                return $this->redirect(array('action' => 'login'));
            } else {
                //Error
            }
        }
        $title = 'Đăng ký tài khoản';
        $this->set(compact('title'));
    }
    
    function active($id){
        $this->layout = NULL;
        $this->User->id = $id;
        if($this->User->exists()){
            $this->User->id = $id;
            $this->User->saveField('active_flg', Configure::read('User.is_active'));
        } else{
            return $this->redirect(array('action' => 'login'));
        }
        $title = 'Đăng nhập';
        $this->set(compact('title'));
    }

    function login() {
        $this->layout = NULL;
        if ($this->request->is("POST")) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            } else {
                //$this->redirect($this->Auth->redirectUrl());
            }
        }
    }
    
    function forgotpassword(){
        
    }

    function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
