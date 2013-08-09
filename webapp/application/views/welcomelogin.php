<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>login</title>

	
</head>
<body>
	<?php 
	if($this->session->flashdata('error')){
	echo $this->session->flashdata('error');
	}
	if($this->session->flashdata('in')){
	echo $this->session->flashdata('in');
	}
?>

<div id="container">
	<h1>we welcome you</h1>

	<div id="body">
		<p>you are logedin....</p>

		
	</div>

	
</div>

</body>
</html>