<div class="countries form">
<h1>Wishes</h1>

<table>
    <thead>
        <tr>
            <th><?php echo $this->Form->checkbox('all', array('wish' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
            <th><?php echo $this->Paginator->sort('wish', 'wish');?>  </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>                       
        <?php $count=0; ?>
        <?php foreach($wishes as $c): ?>  
                      
        <?php $count ++;?>
        <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
        <?php endif; ?>
            <td><?php echo $this->Form->checkbox('Wish.id.'.$c['Wish']['id']); ?></td>
            <td><?php echo $this->Html->link( $c['Wish']['wish']  ,   array('action'=>'edit', $c['Wish']['id']),array('escape' => false) );?></td>
            <td >
            <?php echo $this->Html->link(    "Edit",   array('controller'	=>	'Wishes','action'=>'edit', $c['Wish']['id']) ); ?> | 
            <?php
                
                    echo $this->Html->link(    "Delete", array('controller'	=>	'Wishes','action'=>'delete', $c['Wish']['id']));
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($Wishes); ?>
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
<br />
<?php echo $this->Html->link( "Add A New Wish.",   array('controller'	=>	'wishes','action'=>'add') ); ?>

<br/>
<?php 
echo $this->Html->link( "Logout",   array('controller'	=>	'users','action'=>'logout') ); 
?>