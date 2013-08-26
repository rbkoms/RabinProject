<?php 
if(isset($message))
	echo $message;
?>

<html>
<head>
	
<title>Welcome</title>	
</head>
<body>
Hello!!<br>

<h1>mark the members u would like to deactivate</h1>
---------------------------------------------------
<form method='post'>
<?php 
	foreach($members as $member)
	{ 
		if(!$member->is_active)
		{ ?>
			<input type= "checkbox" name= "check_list[]" value="<?php echo $member->id;?>"><?php echo $member->first_name; ?> <br>
	
	<?php }
	continue;
	} ?>
	<input type="submit" value="submit">
</form>

</body>
</html>