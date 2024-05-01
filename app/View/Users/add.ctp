
<div ng-app="messageBoard">

    <div ng-controller="mainController as mainCtrl" class="register-form container-fluid w-25 mt-5">
        <div class="alert alert-danger" role="alert" ng-show="isError">
            <p ng-repeat="error in errorMessagesArr">{{ error[0] }}</p>
        </div>

        <?php 
            echo $this->Form->create(null, 
                array('
                    class' => 'needs-validation',
                    'novalidate' => true,
                    'ng-submit' => 'mainCtrl.addUser($event)'
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
                    'ng-model' => 'mainCtrl.name'
                )
            );

            echo $this->Form->control('email',
                array(
                    'label' => 'Email',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Email',
                    'type' => 'email',
                    'required' => true,
                    'ng-model' => 'mainCtrl.email'
                )
            );

            echo $this->Form->control('password',
                array(
                    'label' => 'Password',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Password',
                    'type' => 'password',
                    'required' => true,
                    'ng-model' => 'mainCtrl.password'
                )
            );

            echo $this->Form->control('confirm_password',
                array(
                    'label' => 'Confirm-Password',
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Confirm Password',
                    'type' => 'password',
                    'required' => true,
                    'ng-model' => 'mainCtrl.confirm_password'
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

