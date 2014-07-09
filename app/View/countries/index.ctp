<div class="countries form">
<h1>Countries</h1>

<table>
    <thead>
        <tr>
            <th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'name');?>  </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>                       
        <?php $count=0; ?>
        <?php foreach($countries as $c): ?>  
                      
        <?php $count ++;?>
        <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
        <?php endif; ?>
            <td><?php echo $this->Form->checkbox('Country.id.'.$c['Country']['id']); ?></td>
            <td><?php echo $this->Html->link( $c['Country']['name']  ,   array('action'=>'edit', $c['Country']['id']),array('escape' => false) );?></td>
            <td >
            <?php echo $this->Html->link(    "Edit",   array('controller'	=>	'Countries','action'=>'edit', $c['Country']['id']) ); ?> | 
            <?php
                
                    echo $this->Html->link(    "Delete", array('controller'	=>	'Countries','action'=>'delete', $c['Country']['id']));
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($Countries); ?>
    </tbody>
</table>
<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>                
<?php echo $this->Html->link( "Add A New User.",   array('controller'	=>	'users','action'=>'add') ); ?>
<br />
<?php echo $this->Html->link( "Add A New Country.",   array('controller'	=>	'countries','action'=>'add') ); ?>
<br />
<?php echo $this->Html->link( "Add A New City.",   array('controller'	=>	'cities','action'=>'index') ); ?>

<br/>
<?php 
echo $this->Html->link( "Logout",   array('controller'	=>	'users','action'=>'logout') ); 
?>