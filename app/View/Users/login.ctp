<h1>LOGIN</h1>
<div>
    <?php
        echo $this->Form->create();
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->end('Login');
    ?>
</div>
