<?php 
class Message extends AppModel{
    public $name = 'Message';
    public $useTable = 'messages';

    public $validate = array(
        'sender_id' => array(
            'rule' => 'notBlank',
            'message' => 'Sender ID is required.'
        ),
        'receiver_id' => array(
            'rule' => 'notBlank',
            'message' => 'Reciever ID is required.'
        ),
        'message_content' => array(
            'rule' => 'notBlank',
            'message' => 'Message content is required.'
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'sender_id',
        )
    );
}