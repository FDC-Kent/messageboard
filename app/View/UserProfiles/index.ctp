<div class="container">
    <h3 class="my-5">User Details</h3>

    <div class="row">
        <div class="col-md-5 offset-md-0">
            <div class="row">

                <div class="col-md-4">
                    <div id="user_img">
                        <?php echo $this->Html->image('default_img.jpeg', [
                            'alt' => 'Image',
                            'width' => '150px',
                            'class' => 'img-fluid'
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="list-unstyled">
                        <li>
                            <h4 class="mb-0"><?php echo $user['name']; ?></h4>
                        </li>
                        <li> 
                            Gender: <?php echo $user['UserProfile']['gender'] ? $user['UserProfile']['gender'] : 'N/A' ; ?>
                        </li>
                        <li>
                            Birth Date: <?php echo $user['UserProfile']['birth_date'] ? $user['UserProfile']['birth_date'] : 'N/A'; ?>
                        </li>
                        <li>Joined: <?php echo $user['created']; ?></li>
                        <li>Last Login: <?php echo $user['last_login']; ?></li>
                        <!-- Add more profile details here -->
                    </ul>
                </div>
                <div class="col mt-5">
                    <label class="mb-4">Hubby:</label>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus deleniti dicta harum temporibus suscipit nihil sint mollitia earum voluptate at officiis, cum consectetur alias quam, molestias, distinctio sunt repellat explicabo!
                    </p>
                </div>
                <div>
                    <?php echo $this->Html->link('Update Profile',
                        array(
                            'controller' => 'userprofiles',
                            'action' => 'update'
                        ),
                        array('class' => 'btn btn-primary mt-3')
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>