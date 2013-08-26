<?php if(isset($message))
echo $message;
?>
<html>
<head>
	
<title>Welcome</title>
</head>
<body>

<pre>
<?php
echo "Name:\n";
echo $organization->org_name;
echo "\n";
echo "Location:\n";
echo $organization->org_location;;
echo "\n";
echo "Contact:\n";
echo $organization->org_contact_no;
echo "\n";

/*foreach($organization->members as $member)
{
	echo $member->first_name;
	echo $member->last_name;
}*/

?>
</pre>
<form method='post'>
<?php 
	foreach($courses as $course)
	{ ?>
	<input type= "checkbox" name= "check_list[]" value="<?php echo $course->id;?>"><?php echo $course->cname; ?> <br>
	
	<?php } ?>
	<input type="submit" name="submit" value="submit">
</form>

</body>
</html>