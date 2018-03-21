<div class="formPanel medium">
<?php 
	echo validation_errors('<li>','</li>');
	$username = array(
		'name' => 'txtname',
		'size' => '25',
	);
	$password = array(
		'name' => 'txtpass',
		'size' => '25',
	);
	$rePassword = array(
		'name' => 'txtpass2',
		'size' => '25',
	);
	$level = array(
		'1' => 'Member',
		'2' => 'Administrator',
	);
	$email = array(
		'name' => 'txtemail',
		'size' => '25',
	);
	$submit = array(
		'name' => 'ok',
		'value' => 'Add',
		'class' => 'button',
	);
	echo form_fieldset('User Register');
	echo form_open(base_url()."$module/user/add");
	echo form_label('Username: ').form_input($username).'<br />';
	echo form_label('Password: ').form_password($password).'<br />';
	echo form_label('Re-password: ').form_password($rePassword).'<br />';
	echo form_label('Level: ').form_dropdown('level',$level,'1').'<br />';
	echo form_label('Email: ').form_input($email).'<br />';
	echo form_label('&nbsp;').form_submit($submit);
	echo form_close();
	echo form_fieldset_close();
 ?>
 </div>