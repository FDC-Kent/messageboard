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
    <div class="container py-4" >
        <!-- Example messages -->
        <div class="row">
            <div class="col-md-10 mx-auto" id="message-list">
                <div class="d-flex justify-content-center align-items-center spinner-msg">
                    <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center mb-3">
        <button class="btn btn-primary mt-4 d-none" id="view-more">Show more</button>
    </div>
</div>

<?php echo $this->append('script', $this->Html->script('/js/message.js')); ?>