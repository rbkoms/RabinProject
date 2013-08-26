<html>
<head>
	
<title>Welcome</title>	
</head>
<body>


<table width="1200">
				<tr>
					<td width="300">Course Name</td>
					<td width="200">Category</td>
					<td width="300">Duration</td>
					<td width="100">Members</td>
				</tr>
				<?php foreach($enrollments as $enrolment){  ?>
				<tr>
					<td width="300"><?= $enrolment->course->cname;?></td>
					<td width="200"><?=$enrolment->course->catagory;?></td>
					<td width="300"><?=$enrolment->course->duration;?></td>
					<td width="100"><a href="/dashboard/view_members/<?=$enrolment->course->id?>">view members</a></a></td>
				</tr>
				<?php } ?>				
</table>




</body>
</html>