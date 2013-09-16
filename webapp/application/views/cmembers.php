
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
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

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
          <a class="navbar-brand" href="https://www.coursesites.com/webapps/Bb-sites-course-creation-BBLEARN/pages/index.html" target="_blank">Online Courses</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/userlogin">Home</a></li>
            </ul>
        
          
    </div><!--/.navbar-collapse -->
      </div>
    </div>

    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <div class="jumbotron">
      <div class="container">
      <div class="panel panel-default ">
      <!-- Default panel contents -->
      <div class="panel-heading"><h2>Courses Members Profile</h2></div>
      <!-- Table -->
      <p>
     <table class="table">
        <tr>
          <td width="300">First Name</td>
          <td width="300">Last Name</td>
         
        </tr>
        <?php foreach ($courses->enrollments as $enrollment){  ?>
        <tr>
          <td width="300"><?php echo $enrollment->member->first_name;?></td>
          <td width="300"><?php echo $enrollment->member->last_name;?></td>
          
        </tr>
        <?php } ?>        
      </table>

      
         
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
          <li><a href="http://www.facebook.com"><img src="/bootstrap/images/fb.png" alt=""></a></li>
          
        </div>

        <div class="col-lg-1">
          <li><a href="http://www.twitter.com"><img src="/bootstrap/images/tw.png" alt=""></a></li>
        </div>

        <div class="col-lg-1">
          <li><a href="http://www.myspace.com"><img src="/bootstrap/images/my.png" alt=""></a></li>
        </div>
      </div>
    
    </footer>
            

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bootstrap/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>