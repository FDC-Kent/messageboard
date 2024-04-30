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

                    if (!$this->UserProfile->save(['user_id' => $userId])) {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Error creating profile',
                        );
                    } else {
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

    public function updateProfile()
    {
        if (!$this->request->is(array('post', 'put'))) {
            $this->response->statusCode(405);
            return $this->response->body(json_encode(array(
                'code' => 405,
                'message' => 'Method Not Allowed: The requested method is not allowed for this resource.'
            )));
        }
        $errors = [];

        $data = $this->request->data;

        $profileId = $this->Auth->user('UserProfile.id');
        $userId = $this->Auth->user('id');

        $file = $data['UserProfile']['file'];

        if (!empty($file)) {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

            list($name, $domain) = explode('@', $this->Auth->user('email'));

            $uploadPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
            $filename = time() . '_' . $name . '.' . $extension;
            $data['UserProfile']['img_url'] = $filename;
        }

        $data['UserProfile']['id'] = $profileId;
        $data['UserProfile']['user_id'] = $this->Auth->user('id');

        $data['User']['email'] = $data['UserProfile']['email'];
        $data['User']['name'] = $data['UserProfile']['name'];
        $data['User']['id'] = $userId;

        $this->User->set($data);

        $newEmail = $data['User']['email'];
        $currentUserEmail = $this->Auth->user('email');

        $this->UserProfile->set($data['UserProfile']);



        if (!$this->UserProfile->validates()) {
            $errors[] =  $this->UserProfile->validationErrors;
        } else {
            if ($newEmail !== $currentUserEmail && $this->User->hasAny(array('User.email' => $newEmail))) {
                $errors[] =  'Email is already taken.';
            } else {
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

                if ($this->UserProfile->save($data)) {
                    if ($this->User->save($data)) {

                        if (!empty($file)) {
                            move_uploaded_file($file['tmp_name'], $uploadPath . $filename);
                        }
                        $userData = $this->User->findById($userId);
                        $profileData = $this->UserProfile->findById($profileId);

                        $newAuthData = array_merge($userData['User'], $profileData);
                        $this->Auth->login($newAuthData);
                    } else {
                        $errors[] =  'Unable to upload image';
                    }
                } else {
                    $errors[] =  'Error saving user profile.';
                }
            }
        }

        if (!empty($errors)) {
            $this->response->statusCode(201);
            return $this->response->body(json_encode(array(
                'code' => 201,
                'errors' => $errors
            )));
        } else {
            $this->response->statusCode(200);
            return $this->response->body(json_encode(array(
                'code' => 200,
                'message' => 'User Profile Updated Successfully'
            )));
        }
    }

    public function changePassword()
    {
        if ($this->request->is('post')) {

            $user = $this->User->findById($this->Auth->user('id'));

            $password = $user['User']['password'];
            $oldPassword = $this->request->data['User']['old_password'];
            $newPassword = $this->request->data['User']['password'];
            $confirmPassword = $this->request->data['User']['confirm_password'];

            if (!$this->User->checkPassword($password, $oldPassword)) {
                echo json_encode(['success' => false, 'message' => 'Old password is not correct.']);
                return;
            }

            $validate = array(
                'old_password' => array(
                    'Not Empty' => array(
                        'rule' => 'notBlank',
                        'message' => 'Old password is required.',
                        'required' => true
                    )
                ),
                'password' => array(
                    'Not Empty' => array(
                        'rule' => 'notBlank',
                        'message' => 'New password is required.',
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
                )
            );
            
            $this->request->data['User']['id'] = $user['User']['id'];
            $this->User->validate = $validate;
            $this->User->set($this->request->data);

            if(!$this->User->validates()){
                echo json_encode(['success' => false, 'errors' => $this->User->validationErrors]);
                return;
            }
             else {
                if ($password === AuthComponent::password($newPassword)) {
                    echo json_encode(['success' => false, 'message' => 'New password must not the same with old password.']);
                    return;
                } else if ($confirmPassword !== $newPassword) {
                    echo json_encode(['success' => false, 'message' => 'New passwor and old password does not match.']);
                    return;
                } else {
                    if ($this->User->save($this->request->data)) {
                        echo json_encode(['success' => true, 'message' => 'Password changed successfully.']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to change password.']);
                    }
                }
            }
        }
    }

    // GET API

    public function getProfiles()
    {
    }
}
