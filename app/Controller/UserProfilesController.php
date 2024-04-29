<?php
class UserProfilesController extends AppController {
    public $name = 'UserProfiles';

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function index(){
        $this->set('user', $this->Auth->user());
    }

    public function update(){
        $this->set('user', $this->Auth->user());
    }
}