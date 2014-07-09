<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
    <fieldset>
        <legend><?php echo __('Edit Countries'); ?></legend>
        <?php 
        echo $this->Form->hidden('id', array('value' => $this->data['Country']['id']));
        echo $this->Form->input('name');
        echo $this->Form->submit('Edit Countries', array('class' => 'form-submit',  'title' => 'Click here to add the Countries') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php 
echo $this->Html->link( "Return to Dashboard",   array('controller'	=>	'Countries','action'=>'index') ); 
?>
<br/>
<?php 
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>