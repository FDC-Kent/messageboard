<?php
class MessagesController extends AppController
{

    public $name = 'Messages';

    public $uses = array(
        'User'
    );

    public function index()
    {
    }

    public function newMessage()
    {
        $this->User->recursive = 0;
        $user = $this->User->find('all');
        $this->set('users', $user);
    }

    public function messageDetails()
    {
    }
}
