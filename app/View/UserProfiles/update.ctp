<div class="container my-5">
    <h3>Edit Profile</h3>
    <div class="col-md-5 offset-md-0 mt-5">
        <div id="error-msg" class="d-none alert alert-danger" role="alert"></div>
        <?php echo $this->Form->create(
            'UserProfile',
            
            array(
                'url' => array(
                    'controller' => 'api',
                    'action' => 'updateProfile',
                ),
                'type' => 'file',
                'id' => 'profile-form',
                'class' => 'needs-validation',
                'novalidate' => true,
            ),
        );
        ?>
        <div class="row mb-4">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div id="image-preview">
                    <img src="<?php echo $this->webroot . 'img/default_img.jpeg' ?>" alt="image-preview">
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <?php echo $this->Form->button('Upload Pic', [
                    'class' => 'btn btn-primary w-75',
                    'id' => 'select-image',
                    'type' => 'button'
                ])
                ?>
                <?php echo $this->Form->file('img', array(
                    'id' => 'image-upload',
                    'class' => 'd-none',
                    'accept' => '.jpeg, .jpg, .gif, .png'
                ))
                ?>
            </div>
        </div>

        <?php
        echo $this->Form->input('name', 
            array(
                'class' => 'form-control mb-3',
                'maxLength' => 20
            )
        );

        echo $this->Form->input('email',
            array(
                'label' => 'Email',
                'class' => 'form-control mb-3',
                'type' => 'email',
            )
        );

        echo $this->Form->input('birth_date', array(
            'class' => 'form-control mb-3',
            'type' => 'text',
            'id' => 'birth-date'
        ));

        echo $this->Form->input('gender', array(
            'label' => 'Gender',
            'type' => 'select',
            'options' => array(
                '' => '-',
                'Male' => 'Male',
                'Female' => 'Female'
            ),
            'class' => 'form-control form-check-inline mb-3'
        ));

        echo $this->Form->input('hubby', array('class' => 'form-control'));
        ?>

        <div class="mt-5 form-upload-button">
            <?php
            echo $this->Html->Link('Back',
                array(
                    'controller' => 'userprofiles',
                    'action' => 'index'
                ),
                array(
                    'class' => 'btn btn-secondary btn-upload',
                    'type' => 'button'
                ),
            );

            echo $this->Form->button('Submit', ['class' => 'btn btn-primary btn-upload ms-3']);
            ?>
        </div>
        <?php echo $this->Form->end() ?>
    </div>
</div>


<?php $this->append('script', $this->Html->script('/js/profile-update.js')) ?>