<div class="countries form">
 
<?php echo $this->Form->create('Country');?>
    <fieldset>
        <legend><?php echo __('Add Country'); ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->submit('Add Country', array('class' => 'form-submit',  'title' => 'Click here to add the Country') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php 
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to User Dashboard",   array('controller' => 'users' , 'action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Return to Country Dashboard",   array('controller' => 'countries' , 'action'=>'index') ); 
echo "<br>";

echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}
?>