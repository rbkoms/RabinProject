
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href=" ../views/favicon.ico">

    <title>Good Day</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Online Courses</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../userlogin">Home</a></li>
            <li><a href="../userlogin/about">About</a></li>
            <li><a href="../userlogin/contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Goto <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../org_signup">Sign up Organization</a></li>
                <li><a href="../course_signup">Sign up Courses</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Help Yourself</li>
                <li><a href="C:\Users\rabin\Documents\GitHub\RabinProject\webapp\application\views\feedback.html">leave feedback</a></li>
                 
              </ul>
             
              
            </li>
            </ul>
        
          
    </div><!--/.navbar-collapse -->
      </div>
    </div>

    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!!</h1>
        <!-- <h4>have a great time :)</h4> -->
        <p>This is a simple and user easy informational website. It includes a large numbers of organization along with respective courses. Use it as a starting point to create something more unique.</p>
        
      </div>
    </div>
    <div class="jumbotron">
      <div class="container">
      <div class="panel panel-default ">
      <!-- Default panel contents -->
      <div class="panel-heading"><h2>Organization Profile</h2></div>
      <!-- Table -->
      <p>
     <table class="table">
        <tr>
          <td width="300">Organization Name</td>
          <td width="300">Location</td>
          <td width="200">Contact Number</td>
          <td width="100">Members</td>
        </tr>
        <?php foreach($organizations as $organization){  ?>
        <tr>
          <td width="300"><?php echo $organization->org_name;?></td>
          <td width="300"><?php echo $organization->org_location;?></td>
          <td width="200"><?php echo $organization->org_contact_no;?></td>
          <td width="100"><?php echo "<a href='viewmembers/$organization->id'>view members</a>";?></a></td>
        </tr>
        <?php } ?>        
      </table>
      <?php echo $organization->org_name;?><br>
      <a href="<?php echo "/subscribecourse/for_your_organization/organization/$organization->id";?>">Subscribe Courses For The Very Organization</a>
         
    </p>
    </div>

    
    </div>
      </div>
       
      


    
      <footer>
        <p>&copy; OLIVE MEDIA 2013</p>
      </footer>
      <footer>
        <h3><b><font size="2" face="Georgia, Arial" color="black">Social Media:</font></b></h3>  
          <div class="row">
            <div class="col-lg-1">
          <li><a href="http://www.facebook.com"><img src="../bootstrap/images/fb.png" alt=""></a></li>
          
        </div>

        <div class="col-lg-1">
          <li><a href="http://www.twitter.com"><img src="../bootstrap/images/tw.png" alt=""></a></li>
        </div>

        <div class="col-lg-1">
          <li><a href="http://www.myspace.com"><img src="../bootstrap/images/my.png" alt=""></a></li>
        </div>
      </div>
    
    </footer>
            

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>