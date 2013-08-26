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
<?php

echo $member->first_name;
echo $member->last_name; 
?>
<h1>mark the courses u like to deactivate</h1>


	<form method='post'>
<?php 
	foreach($enrollments as $enrollment)
	{ if($enrollment->is_active){ ?>
	<input type= "checkbox" name= "check_list[]" value="<?php echo $enrollment->course->id;?>"><?php echo $enrollment->course->cname; ?> <br>
	
	<?php }
	continue;
	} ?>
	<input type="submit" name="submit" value="submit">
</form>
 


</body>
</html>