<div class="container">
    <h3 class="my-5">Change Password</h3>
    <div class="alert alert-danger d-none" id="response-msg"></div>
    <div class="col-md-3 mt-5 offset-md-0">
        <?php
        echo $this->form->create(
            'User',
            array(
                'class' => 'needs-validation',
                'novalidate' => true,
            ),
            array('url' => array(
                'controller' => 'api',
                'action' => 'changePassword'
            ))
        );
        echo $this->form->input(
            'old_password',
            array(
                'class' => 'form-control mb-3',
                'type' => 'password'
            )
        );
        echo $this->form->input(
            'password',
            array(
                'class' => 'form-control mb-3',
                'type' => 'password'
            )
        );
        echo $this->form->input(
            'confirm_password',
            array(
                'class' => 'form-control mb-3',
                'type' => 'password'
            )
        );
        echo $this->form->button('Submit', array(
            'class' => 'btn btn-primary mt-4',
            'type' => 'submit'
        ));

        ?>
    </div>
</div>

<?php $this->append('script', $this->Html->script('/js/change-password.js')) ?>