
<?php if(isset($message)) {

	echo $message;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>

<pre><?php
echo "Firstname:\n";
echo $member->first_name;
echo "\n";
echo "Lastname:\n";
echo $member->last_name;
echo "\n";
echo "Email:\n";
echo $member->email;
echo "\n";
echo "Sex:\n";
echo $member->sex;
echo "\n";
echo "Organization:\n";
echo $member->organization->org_name;

?></pre>
<form method='post'>

<?php 
	foreach($enrollments as $enrollment)
	{ 	$course= Course::find_by_id($enrollment->course_id);
		$member_enrollment= Enrollment::find_by_course_id_and_member_id_and_is_delete($course->id,$member->id,FAlSE);
		if ($member_enrollment) { 
			continue;
		}
		
?>
	<input type= "checkbox" name= "check_list[]" value="<?php echo $course->id;?>"><?php echo $course->cname; ?> <br>
	
	<?php  }?>

	<input type="submit" value="submit">
</form>
<a href='logout'><h2>logout..</h2></a>
<!-- <a href='/userlogin/logout'>logout</a>
<a href='/dashboard/add_course'>add_course</a>
 --></body>
</html>