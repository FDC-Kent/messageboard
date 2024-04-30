<?php
class ApiController extends AppController
{
    public $uses = array(
        'User',
        'UserProfile'
    );

    public function beforeFilter()
    {
        parent::beforeFilter();

        $this->autoRender = false;
        $this->response->type('application/json');
        $this->Auth->allow(
            'index',
            'register'
        );
    }

    public function index()
    {
        $this->response->statusCode(200);
        return $this->response->body(json_encode(array(
            'code' => 200,
            'message' => 'Message Board Api'
        )));
    }

    public function register()
    {
        $jsonData = $this->request->input('json_decode', true);
        
        if ($this->request->is('post')) {
            $this->User->create();
            $this->User->set($jsonData);

            if ($this->User->validates()) {
                if ($this->User->save($this->request->data)) {
                    $userId = $this->User->id;

                    $validate = array();
                    $this->UserProfile->validate = $validate;

                    $this->UserProfile->create();
                 
                    if(!$this->UserProfile->save(['user_id' => $userId])){
                        $response = array(
                            'status' => 'error',
                            'message' => 'Error creating profile',
                        );
                    }else{
                        $response = array(
                            'status' => 'success',
                            'message' => 'Data saved successfully',
                            'user' => $userId
                        );
                        $userData = $this->User->findById($userId);
                        $profileData = $this->UserProfile->findByUserId($userId);

                        $newAuthData = array_merge($userData['User'], $profileData);
                        $this->Auth->login($newAuthData);
                    }
                    

                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Error saving data',
                        'errors' => 'Error in saving data'
                    );
                }
            } else {
                $response = array(
                    'status' => 'errors',
                    'message' => 'Validation errors',
                    'errors' => $this->User->validationErrors
                );
            }
        } else {
            $this->response->statusCode(405);
            return $this->response->body(json_encode(array(
                'code' => '405',
                'message' => 'Method Not Allowed: The requested method is not allowed for this resource.'
            )));
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
        
        // Set the content type header to application/json
        header('Content-Type: application/json');
    }

    public function updateProfile(){
        if(!$this->request->is(array('post', 'put'))) {
            $this->response->statusCode(405);
            return $this->response->body(json_encode(array(
                'code' => 405,
                'message' => 'Method Not Allowed: The requested method is not allowed for this resource.'
            )));
        }

        $data = $this->request->data;

        $profileId = $this->Auth->user('UserProfile.id');
        $userId = $this->Auth->user('id');

        $data['UserProfile']['id'] = $profileId;
        $data['UserProfile']['user_id'] = $this->Auth->user('id');
        
        $this->UserProfile->set($data['UserProfile']);
        
        if(!$this->UserProfile->validates()){
            $response = array(
                'success' => false,
                'message' => 'Validation Error.',
                'errors' => $this->UserProfile->validationErrors 
            );
        }else{

            $validate = array(
                'name' => array(
                    'The name must be between 5 and 20 characters.' => array(
                        'rule' => array('between', 5, 20),
                        'message' => 'The name must be between 5 and 20 characters.',
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
                )
            );

            $this->User->validate = $validate;

            if($this->UserProfile->save($data)){

                $data['User']['email'] = $data['UserProfile']['email'];
                $data['User']['name'] = $data['UserProfile']['name'];
                $data['User']['id'] = $userId;
              
                if($this->User->save($data)){
                    $response = array(
                        'success' => true,
                        'message' => 'Successfully saved.',
                    );

                    $userData = $this->User->findById($userId);
                    $profileData = $this->UserProfile->findById($profileId);

                    $newAuthData = array_merge($userData['User'], $profileData);
                    $this->Auth->login($newAuthData);
                    
                }else{
                    $response = array(
                        'success' => false,
                        'message' => 'Name or email cannot be save.',
                    );
                }
                
            }else{
                $response = array(
                    'success' => false,
                    'message' => 'Error saving user profile.',
                );
            }
          
        }

        // Return JSON response
        echo json_encode($response);

    }
    

    // Upload Image
    public function uploadImage(){
        if($this->request->is('post')){
            $data = $this->request->data;
            $img = $data['UserProfile']['img'];

            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);

            list($name, $domain) = explode('@', $this->Auth->user('email'));

            $uploadPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
            $filename = time() . '_' . $name .'.'. $extension;

            if(move_uploaded_file($img['tmp_name'], $uploadPath . $filename)){
                $data['UserProfile']['image'] = $filename;
                $this->Flash->success('Image uploaded successfully');
            }else{
                $this->Flash->success('Error Uploading Image');
            }
        }
    }
    // End Upload Image

    // GET API

    public function getProfiles(){

    }

}
