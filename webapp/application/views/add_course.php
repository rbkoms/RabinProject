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
<form method ='post'>
<?php
foreach($courses as $course)
	{?>
	<input type="checkbox" name ="check_list[]" value="<?php echo $course->id; ?>"><?php echo $course->cname; ?><br>
	
	<?php }?>

<input type="submit" value="submit">
</form>
<a href='/userlogin/logout'><h2>logout..</h2></a>
<!-- <a href='/userlogin/logout'>logout</a>
<a href='/dashboard/add_course'>add_course</a>
 --></body>
</html>