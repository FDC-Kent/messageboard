<table class="table table-striped">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['name']?></td>
            <td><?php echo $user['User']['email']?></td>
            <td>
                <?php echo $this->Html->link('view', array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
                <?php if($current_user['id'] == $user['User']['id']): ?>
                    <?php echo $this->Html->link('edit', array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink('delete', 
                        array('action' => 'delete', $user['User']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                    ?>
                <?php endif;?>
            </td>
        
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>