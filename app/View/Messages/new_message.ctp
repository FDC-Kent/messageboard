<div class="container">
    <div class="m-4">
        <?php

        $options = [];

        foreach ($users as $key => $value) {
            $options[] = $value['User']['name'];
        }

        echo $this->Form->label(
            'receiverId',
            'Receiver',
            array('class' => 'mb-3')
        );
        echo $this->html->tag(
            'span',
            '*',
            array('class' => 'text-danger')
        );
        echo $this->Form->select(
            'receiver_id',
            $options, // Options array 
            array(
                'class' => 'select2 w-100 form-select',
                'id' => 'receiverId'
            )
        );
        echo $this->Form->label(
            'message-content',
            'Message Content',
            array('class' => 'my-3')
        );
        echo $this->html->tag(
            'span',
            '*',
            array('class' => 'text-danger')
        );
        echo $this->Form->textarea(
            'content',
            array(
                'class' => 'form-control',
                'rows' => '10'
            )
        );
        ?>
        <div class="mt-5">
            <?php
            echo $this->Form->button(
                'Send',
                array('class' => 'btn btn-primary me-3 px-5')
            );
            echo $this->Html->link(
                'Back',
                array(
                    'controller' => 'messages',
                     'action' => 'index'
                ),
                array('class' => 'btn btn-secondary px-5'),
            );

            ?>
        </div>
    </div>
</div>


<?php echo $this->append('script', $this->Html->script('/js/new-message.js')); ?>