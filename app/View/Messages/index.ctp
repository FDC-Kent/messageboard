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

    <div class="row">
        <div class="col-md-9 offset-md-3">
            <div class="card my-3" style="max-width: 75%;">
                <div class="row g-0 mb-3">
                    <div class="col-md-3">
                        <img width="75%" src="<?php echo $this->webroot.'img/default-img.jpeg'; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text text-end"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>