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
                    $user_id = $this->User->id;

                    $response = array(
                        'status' => 'success',
                        'message' => 'Data saved successfully',
                        'user' => $user_id
                    );

                    $this->UserProfile->create();

                    if(!$this->UserProfile->save(['user_id' => $user_id])){
                        $response = array(
                            'status' => 'error',
                            'message' => 'Error creating profile',
                        );
                    };

                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Error saving data',
                        'error' => 'Error in saving data'
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
        if(!$this->request->is('post')) {
            $this->response->statusCode(405);
            return $this->response->body(json_encode(array(
                'code' => 405,
                'message' => 'Method Not Allowed: The requested method is not allowed for this resource.'
            )));
        }

        $errors = [];

        $data = $this->request->data;
        $user_id = $this->Auth->user('UserProfile.id');

        // var_dump($user_id);
       
        $data['UserProfile']['id'] = $user_id;
        $this->UserProfile->set($data['UserProfile']);
        
        if(!$this->UserProfile->validates()){
            $response = array(
                'success' => true,
                'message' => 'Validation Error.',
                'errors' => $this->UserProfile->validationErrors 
            );
        }else{
            
            $response = array(
                'success' => false,
                'message' => 'Successfully saved.',
            );
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
