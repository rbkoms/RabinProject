
<html>
<body>
<?php if(isset($message)) {

	echo $message;
} ?>
<?php 
	if($this->session->flashdata('error')){
	echo $this->session->flashdata('error');
	}
	if($this->session->flashdata('in')){
	echo $this->session->flashdata('in');
	}
?>
<form method='post'>

First_Name: <input type="text" name="first_name"><br>
Last_Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Sex: <input type="radio" name="sex" value="Male">Male
     <input type="radio" name="sex" value="Female">Female<br>
Username: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
Organization: <select name="organizations">

<?php
foreach($organizations as $organization)
{?>
	<option value="<?php echo $organization->id; ?>"><?php echo $organization->org_name; ?>
	</option>
	<?php }?>

</select><br>
<input type="submit" value="submit">
</form>

</body>
</html>
