<div class="countries form">
<?php echo $this->Form->create('Wish'); ?>
    <fieldset>
        <legend><?php echo __('Edit Wishes'); ?></legend>
        <?php 
        echo $this->Form->hidden('id', array('value' => $this->data['Wish']['id']));
        echo $this->Form->input('wish');
        echo $this->Form->submit('Edit Wishes', array('class' => 'form-submit',  'title' => 'Click here to add the Wishes') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php 
echo $this->Html->link( "Return to Dashboard",   array('controller'	=>	'Wishes','action'=>'index') ); 
?>
<br/>
<?php 
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>