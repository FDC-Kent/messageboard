<?php 
class UsersController extends AppController {

    public $name = 'Users';

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function isAuthorized($user)
    {
        if(in_array($this->action, array('edit', 'delete'))){
            if($user['id'] != $this->request->params['pass'][0]){
                return false;
            }
        }
        return true;
    }
    public function login(){
        if($this->request->is('post')){

            if($this->Auth->login()){
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('last_login', date('Y-m-d H:i:s'));

                $this->Flash->success('Login successful.');
                $this->redirect($this->Auth->redirectUrl());
            }else{  
                $this->set('error', 'Invalid email or password. Please try again.');
            }
        }
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }

    public function index(){
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all'));
    }

    public function view($id = null){
        $this->User->id = $id;

        if(!$this->User->exists()){
            throw new NotFoundException('Invalid user');
        }
        if(!$id){
            $this->Flash->error('Invalid user');
            $this->redirect(array('action' => 'index'));
        }

        $this->set('user', $this->User->read());
    }

    public function add(){
        if($this->request->is('post')){
            if($this->User->save($this->request->data)){
                $this->Flash->success('The user has been saved.');
                $this->User->id = $this->Auth->user('id');
                // $this->redirect(array('action' => 'index'));
                $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->set('errors', $this->User->validationErrors);
            }
        }
    }

    public function edit($id = null){
        if(!$id){
            throw new NotFoundException((__('Invalid User')));
        }

        $user = $this->User->findById($id);

        if(!$user){
            throw new NotFoundException((__('Invalid User')));
        }

        if($this->request->is(array('post', 'put'))){
            $this->User->id = $id;
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('Your user has been updated.'));
                return $this->redirect(array('action' => 'index'));
            } 
            $this->Flash->error(__('Unable to update user'));
        }

        if(!$this->request->data){
            $this->request->data = $user;
        }
    }

    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }

        if($this->User->delete($id)){
            $this->Flash->success(
                __('The user with id: %s has been deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function successRegister(){

    }

}