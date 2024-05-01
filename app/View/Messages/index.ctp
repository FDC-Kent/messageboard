<div class="container">
    <?php
    echo $this->Html->link(
        'New Message',
        array(
            'controller' => 'messages',
            'action' => 'newMessage'
        ),
        array(
            'class' => 'btn btn-primary mt-3',
            'type' => 'button'
        )
    );
    ?>
    <div class="container mb-5">
        <div class="row" id="message-list">
        </div>

        <div class="text-center mb-3">
            <button class="btn btn-primary mt-4" id="view-more">Show more</button>
        </div>
    </div>
</div>

<?php echo $this->append('script', $this->Html->script('/js/message.js')); ?>