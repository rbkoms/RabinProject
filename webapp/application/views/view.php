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
<br>You have enrolled these courses<br>
--------------------------------------<br>
<?php
foreach($enrollments as $enrollment)
{
 if($enrollment->is_active && !$enrollment->is_delete){		?>

<?php echo $enrollment->course->cname; ?><br> 
<?php echo $enrollment->is_active; ?><br>

<?php 
}
continue;
}
?>


</body>
</html>