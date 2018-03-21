<div class="formPanel medium">
	<?php 
	if(isset($error)){
		echo "<div class='error-mess'>";
		echo '<ul>';
		echo "<li>$error</li>";
		echo '</ul>';
		echo '</div>';
	}
	?>
	<fieldset>
		<legend>Login Form</legend>
		<form action="<?php echo base_url();?>admin/verify/login" method="post">
			<label>Username</label><input type="text" name="txtname" /><br />
			<label>Password</label><input type="password" name="txtpass" /><br />
			<label>&nbsp;</label><input class='button' type="submit" name="ok" value="Login" />
		</form>
	</fieldset>
</div>