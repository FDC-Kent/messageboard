<?php
class User extends AppModel
{
    public $name = 'User';
    public $displayField = 'name';
    
    public $useTable = 'users';

    public $hasMany = array(
        'Message' => array(
            'className' => 'Message',
            'foreignKey' => 'sender_id'
        ),
        'UserProfile' => array(
            'className' => 'UserProfile',
            'foreignKey' => 'user_id'
        ),
        'Sender' => array(
            'className' => 'Message',
            'foreignKey' => 'sender_id'
        ),
        'Receiver' => array(
            'className' => 'Message',
            'foreignKey' => 'receiver_id'
        )
    );

    public $hasOne = array(
        'UserProfile' => array(
            'className' => 'UserProfile',
            'foreignKey' => 'user_id'
        )
    );

    public $validate = array(
        'name' => array(
            'The name must be between 5 and 20 characters.' => array(
                'rule' => array('between', 5, 20),
                'message' => 'The name must be between 5 and 20 characters.'
            ),
            'Not Empty' => array(
                'rule' => 'notBlank',
                'message' => 'Name is required.',
                'required' => true
            )
        ),
        'email' => array(
            'Valid Email' => array(
                'rule' => 'email',
                'message' => 'Please enter a valid email address'
            ),
            'That email has already been taken' => array(
                'rule' => 'isUnique',
                'message' => 'That email has already been taken.'
            ),
        ),
        'password' => array(
            'Not Empty' => array(
                'rule' => 'notBlank',
                'message' => 'Password is required.',
                'required' => true
            ),
            'Match password' => array(
                'rule' => 'matchPasswords',
                'message' => 'Your passwords do not match',
            )
        ),
        'confirm_password' => array(
            'Not Empty' => array(
                'rule' => 'notBlank',
                'message' => 'Confirm Password is required.',
                'required' => true
            )
        ),

    );

    public function beforeSave($options = array())
    {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
    }

    public function matchPasswords($data)
    {
        if ($data['password'] == $this->data['User']['confirm_password']) {
            return true;
        }

        return false;
    }

    public function checkPassword($password, $oldPassword){
        return $password === AuthComponent::password($oldPassword);
    }
}
