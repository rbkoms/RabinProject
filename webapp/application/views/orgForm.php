
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
Organization Name: <input type="text" name="org_name"><br>
Location: <input type="text" name="org_location"><br>
Director: <input type="text" name="org_director"><br>
Contact_No: <input type="text" name="org_contact_no"><br>
	

<input type="submit" value="submit">

</form>
</body>
</html>
