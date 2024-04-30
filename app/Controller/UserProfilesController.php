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

        $userProfile = $this->UserProfile->findByUserId($this->Auth->user('id'));
        $userProfile['UserProfile']['email'] = $this->Auth->user('email');
        $userProfile['UserProfile']['name'] = $this->Auth->user('name');
       
        $this->request->data = $userProfile;

        $this->set('user', $userProfile);
    }
}