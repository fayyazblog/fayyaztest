<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('uploadifive');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		//echo $this->Html->script('jquery');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
        
	</div>
    
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    
	<?php echo $this->Html->script('jquery.uploadifive.min'); ?>
    
	<?php echo $this->element('sql_dump'); ?>
    
	<?php if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer(); ?>
    
    <script type="text/x-javascript">
    	<?php $timestamp = time();?>
		
		$('#file_upload').uploadifive({
				'auto'             : true,
				'checkScript'      : '/UserLoginLogout/users/imageNameExist',
				'formData'         : {
									   'timestamp' : '<?php echo $timestamp;?>',
									   'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
									   
				                     },
				'queueID'          	: 'queue',
				'multi'				: false,
				'uploadScript'     	: '/UserLoginLogout/users/uploadifive',
				'onUploadComplete' 	: function(file, data) { 
					console.log(data);
					console.log(file);
					//console.log(file['File']['name']);
					//alert(file);
					//alert(data);
					//alert(filename);
					var image_name	=	$('.filename').html();
					 //$.each(file, function(index,element){
                              //if(index == 'name'){ var image_name	=	element; return false; }
                         //});
					$('.filename').html('<img name="profile_image" id="profile_image" hight="150" width="150" src="<?php echo $this->html->url('/', true); ?>app/webroot/img/uploads/'+image_name+'" />');
					 }
			});
    </script>
</body>
</html>
