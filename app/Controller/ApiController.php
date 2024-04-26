<?php
class ApiController extends AppController
{
    public $uses = array(
        'User'
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
                    $response = array(
                        'status' => 'success',
                        'message' => 'Data saved successfully',
                        'user' => $this->User->id
                    );
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
}
