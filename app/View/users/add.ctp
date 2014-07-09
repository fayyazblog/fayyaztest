<?php //echo "<pre>"; print_r($citiesList); echo "</pre>"; die(); ?>
<!-- image upload style-->
<style>
.uploadifive-button {
	float: left;
	margin-right: 10px;
}
#queue {
	/*border: 1px solid #E5E5E5;
	height: 177px;*/
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 300px;
}
</style>
<!-- //image upload style-->
<div class="users form">
<?php echo $this->Form->create('User',array('id' => 'addUserForm'));?>
	<fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
		echo $this->Form->input('username');
		if(isset($citiesList)){ $selectedValue	=	$countryID;}else{ $selectedValue	="";}
		//echo $this->Form->input('country_id', array( 'type' => 'select', 'options' => $countries,"empty" => "Select the Country",'value' => $selectedValue, 'onChange' => 'selectCountryOnchange(this.value)'));
		echo $this->Form->input('country_id', array( 'type' => 'select', 'options' => $countries,"empty" => "Select the Country",'value' => $selectedValue ));
		echo $this->Form->input('city_country_id');
		if(isset($citiesList)){
				echo $this->Form->input('city_id', array( 'type' => 'select', 'options' => $citiesList,"empty" => "Select the City"));
			}
		?><div id="queue"></div><?php
		echo $this->Form->input('photo', array('type' => 'file','id' => 'file_upload'));
		echo $this->Form->input('wish_id', array( 'type' => 'select', "empty" => "Select the Wish",));
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
        echo $this->Form->input('role', array(
            'options' => array( 'king' => 'King', 'queen' => 'Queen', 'rook' => 'Rook', 'bishop' => 'Bishop', 'knight' => 'Knight', 'pawn' => 'Pawn')
        ));
         
        echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
    
    
<?php echo $this->Form->end(); ?>
</div>
<?php 
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}
?>

<?php

/* populate the city list by select the country from dropdwon */
$this->Js->get('#UserCountryId')->event(
											'change', 
											$this->Js->request(
																array( 
																		'controller'=>'Users',
																		'action'=>'getcityajaxlist/'
																		),
																array(
																		'update'=>'#UserCityCountryId',
																		'async' => true,
																		'method' => 'post',
																		'dataExpression'=>true,
																		'data'=> $this->Js->serializeForm(
																											array(
																													'isForm' => true,
																													'inline' => true
																													)
																										)
																		)
																)
										);
	
/* End of populate the city list by select the country from dropdwon */

 ?>






<script type="text/javascript">
	function selectCountryOnchange(val){
			/*by doing the POST method*/
			/*window.location = "<?php //echo Router::url(array('controller' => 'Users', 'action' => 'add'), true) ?>/" +val;*/
			
			/*by ajax call*/
				/*
				$.ajax({
							type: "GET", 
							url: "<?php //echo $this->webroot; ?>GetCountryList",
							success: function(data){ 
								
							} 
						}); 
						*/
						/*
			var countryID = val;
			    /*send ajax*/
				/*
			   $.ajax({
				  url: 'get_city_ajax_list/'+countryID,
				  method: 'get',
				  dataType: 'json',
				  success: function(response) {
					  /* for example
					   response = [{'Answer': {'id': 1, 'answer': 'ans 1'} }, {'Answer': {'id': 2, 'answer' : 2}}....];
					   now loop over the response
					  
					  var html = '';
					  $.each(response, function(index, val) {
						  html + = '<div id="answer_'+ val.Answer.id +'">'+ val.Answer.answer +'</div>'
					  });
					   append this html to target container
					  $('#target_container').append(html);
					  */
					  /*
					  alert(response);
				  }
			   });
			   */
			   /*new ajax method*/
			   		var countryID 		=	val;
			   		var formData		=	$(this).serialize();
						//var formUrl		=	$(this).attr('action');
						var formUrl		=	'/UserLoginLogout/users/getcityajaxlist/'+countryID;
						$.ajax({
								type	:	'POST',
								url		:	formUrl,
								data	:	formData,
								success	:	function(data,textStatus,xhr){
										alert(data);
										return false;
									},
								error	:	function(xhr,textStatus,error){
										alert(textStatus);
										return false;
									}
							});
						return false;		
					
			   /*// new ajax method*/
				
						
					
			
		}
		
</script>
