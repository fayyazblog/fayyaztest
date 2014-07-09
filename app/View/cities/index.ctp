<div class="cities form">
<h1> Countries & Cities </h1>


<table>
    <tbody>
    <?php echo $this->Form->create('City',array('action' => 'add')); ?>
        <tr>
            <td style="text-align:right; line-height:30px;">Select The Country: </td>
            <td style="text-align:left"><?php echo $this->Form->input('country_id', array( 'type' => 'select', 'options' => $countries,"empty" => "Select the Country",)); ?></td>
        </tr>
        <tr>
            <td style="text-align:right; line-height:30px;">Enter the Name of City Corresponding Country: </td>
            <td style="text-align:left"><?php echo $this->Form->input('name',array( 'type' => 'text')); ?></td>
        </tr>
        <tr>
            <td style="text-align:right; line-height:30px;">&nbsp;</td>
            <td style="text-align:left">
				<?php  echo $this->Form->submit('Add City', array('class' => 'form-submit',  'title' => 'Click here to add the City') );  ?>
            </td>
        </tr>
        <?php echo $this->Form->end(); ?>
</tbody>
</table>



</div>                
<?php echo $this->Html->link( "Add A New User.",   array('controller' => 'users' , 'action' => 'add') ); ?>
<br />
<?php echo $this->Html->link( "Add A New Country.",   array('controller' => 'countries' , 'action'=>'add') ); ?>
<br />
<?php echo $this->Html->link( "Add A City.",   array('controller' => 'Cities', 'action' => 'index') ); ?>

<br/>
<?php 
echo $this->Html->link( "Logout",   array('controller'	=>	'users','action'=>'logout') ); 
?>