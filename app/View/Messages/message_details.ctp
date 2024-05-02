<div class="container">
    <div class="container py-4">
        <?php
        echo $this->Form->create(
            'Message',
            array('id' => 'reply-message-form'),
            array(
                'url' =>
                array(
                    'controller' => 'api',
                    'action' => 'postMessage'
                )
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
            'message_content',
            array(
                'class' => 'form-control',
                'rows' => '7'
            )
        );
        echo $this->Form->button(
            'Reply Message',
            array(
                'type' => 'submit',
                'class' => 'btn btn-primary my-3'
            ),
        )
        ?>
        <div class="row">
            <div class="col-md-10 mx-auto" id="message-list">

            </div>
        </div>
    </div>

    <div class="text-center mb-3">
        <button type="button" class="btn btn-primary mt-4" id="view-more">Show more</button>
    </div>
</div>

<?php echo $this->append('script', $this->Html->script('/js/message-details.js')); ?>