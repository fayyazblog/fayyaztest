<div class="countries form">
 
<?php echo $this->Form->create('Wish');?>
    <fieldset>
        <legend><?php echo __('Add Wish'); ?></legend>
        <?php echo $this->Form->input('wish');
        echo $this->Form->submit('Add Wish', array('class' => 'form-submit',  'title' => 'Click here to add the Wish') ); 
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
echo $this->Html->link( "Return to Wish Dashboard",   array('controller' => 'wishes' , 'action'=>'index') ); 
echo "<br>";

echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}
?>