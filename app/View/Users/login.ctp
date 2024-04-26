
<div class='container mt-5 w-25'>
   <h3>LOGIN</h3>
        <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

    <?php
        echo $this->Form->create();
        echo $this->Form->control('email',
            array(
                'label' => 'Email',
                'class' => 'form-control mb-3',
                'placeholder' => 'Email',
                'required' => true
            )
        );
        echo $this->Form->control('password',
            array(
                'label' => 'Username',
                'class' => 'form-control mb-3',
                'type' => 'password',
                'placeholder' => 'Password',
                'required' => true
            )
        );
        echo $this->Form->button('Submit',
            array(
                'class' => 'btn btn-primary me-3',
                'type' => 'submit'
            )
        );

        echo $this->Html->link('register', 
                array(
                    'action' => 'add',
                ),
                array('class' => 'btn btn-warning')
        );
    ?>
</div>
