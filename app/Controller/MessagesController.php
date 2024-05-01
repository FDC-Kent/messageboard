<?php
class MessagesController extends AppController
{

    public $name = 'Messages';

    public $uses = array(
        'User',
        'Message'
    );

    public function list()
    {
        $userId = $this->Auth->user('id');

        $messages = $this->Message->find('all', [
            'conditions' => ['sender_id' => $userId]
        ]);
    }
    public function index()
    {
        $userId = $this->Auth->user('id');

        $messages = $this->Message->find('all', [
            'conditions' => ['sender_id' => $userId]
        ]);

        // $this->set('messages', $messages);
    }

    public function newMessage()
    {
        $this->User->recursive = 0;
        $user = $this->User->find('all');
        $this->set('users', $user);
    }

    public function messageDetails($id)
    {   
        $message = $this->Message->findById($id);
        var_dump($message);
        $this->set('user', $message);
    }
}
