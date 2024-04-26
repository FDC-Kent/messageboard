
<div ng-app="messageBoard">

    <div ng-controller="registerController as registerCtrl" class="register-form container-fluid w-25 mt-5">
        <div class="alert alert-danger" role="alert" ng-show="errorMessagesArr">
            <p ng-repeat="error in errorMessagesArr">{{ error[0] }}</p>
        </div>

        <?php 
            echo $this->Form->create(null, 
                array('
                    class' => 'needs-validation',
                    'novalidate' => true,
                    'ng-submit' => 'registerCtrl.addUser($event)'
                )
            );
        ?>
        <fieldset>
            <legend>Register</legend>
        <?php

            echo $this->Form->control('name',
                array(
                    'label' => 'Name',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Name',
                    'required' => true,
                    'ng-model' => 'registerCtrl.name'
                )
            );

            echo $this->Form->control('email',
                array(
                    'label' => 'Email',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Email',
                    'type' => 'email',
                    'required' => true,
                    'ng-model' => 'registerCtrl.email'
                )
            );

            echo $this->Form->control('password',
                array(
                    'label' => 'Password',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Password',
                    'type' => 'password',
                    'required' => true,
                    'ng-model' => 'registerCtrl.password'
                )
            );

            echo $this->Form->control('confirm_password',
                array(
                    'label' => 'Confirm-Password',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Confirm Password',
                    'type' => 'password',
                    'required' => true,
                    'ng-model' => 'registerCtrl.confirm_password'
                )
            );
            
            echo $this->Form->control('Submit',
            array(
                'class' => 'btn btn-primary',
                'type' => 'submit',
            )
        );

        ?>
        </fieldset>
    </div>
</div>

