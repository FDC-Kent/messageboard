<?php
class UserProfile extends AppModel
{
    public $name = 'UserProfile';

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        )
    );

    public $validate = array(
        'name' => array(
            'Not Empty' => array(
                'rule' => 'notBlank',
                'message' => 'Name is required.',
                'required' => true
            ),
            'The name must be between 5 and 20 characters.' => array(
                'rule' => array('between', 5, 20),
                'message' => 'The name must be between 5 and 20 characters.'
            )
        ),
        'gender' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Gender is required',
                'allowEmpty' => false
            ),
            'valid' => array(
                'rule' => array('inList', array('Male', 'Female', 'Other')),
                'message' => 'Invalid gender'
            )
        ),
        'birth_date' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Birthdate is required',
                'allowEmpty' => false
            ),
            'valid' => array(
                'rule' => 'date',
                'message' => 'Invalid date format'
            )
        ),
        'img_url' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Image is required',
                'allowEmpty' => false
            ),
            'validExtension' => array(
                'rule' => array('extension', array('jpg', 'jpeg', 'gif', 'png')),
                'message' => 'Accept only photo extensions .jpg, .gif, .png',
            )
        ),
        'hubby' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Hubby is required',
                'allowEmpty' => false
            )
        )
    );
}
