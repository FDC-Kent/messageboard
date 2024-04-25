<div class="users">
    <?php echo $this->Form->create('User'); ?>

    <fieldset>
        <legend>Register</legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('confirm_password', array('type' => 'password'));
        echo $this->Form->end('Submit');

    ?>
    </fieldset>
</div>
