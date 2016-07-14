<?php

/**
 * 
 */
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $users = array('User');
    public $name = 'User';
    
    public $validate = array(
        'email' => array(
            'compare' => array(
                'rule' => array('isUniqueEmail'),
                'message' => 'Email đã tồn tại'
            )
        ),
        'current_password' => array(
            'compare' => array(
                'rule' => array('checkCurrentPassword'),
                'message' => 'Mật khẩu hiện tại không đúng.'
            )
        )
    );

    public function isUniqueEmail() {
        $mail = $this->data[$this->alias]['email'];
        $resulfts = $this->find('first', array(
            'conditions' => array(
                'User.email' => $mail
            )
        ));
        if (!empty($resulfts)) {
            $check = FALSE;
        } else {
            $check = TRUE;
        }
        return $check;
    }
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        
    }
    
    public function checkCurrentPassword(){
        $user = $this->findById(AuthComponent::user('id'));
        $passwordHasher = new BlowfishPasswordHasher();
        $passwordHasher->hash($this->data[$this->alias]['current_password']);
        return $passwordHasher ->check($this->data[$this->alias]['current_password'], $user['User']['password']);
    }
}