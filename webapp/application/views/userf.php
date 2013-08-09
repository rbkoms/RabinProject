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
<a href='/userlogin/logout'>logout</a>

</body>
</html>