
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
         <a class="navbar-brand" href="https://www.coursesites.com/webapps/Bb-sites-course-creation-BBLEARN/pages/index.html" target="_blank">Online Courses</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../userlogin">Home</a></li>
            <li class="active"><a href="../feedback">Leave Feedback</a></li>

        </ul>

        
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $member->first_name;?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://www.gmail.com"><?php echo $member->email;?></a></li>
                <li><a href="../userlogin/logout">Log out </a></li>
                <li><li><a href="/getfbk">leave feedback</a></li>
                 
              </ul>
             </li>
            </ul>
    </div><!--/.navbar-collapse -->
      </div>
    </div>

    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
        <h1>Welcome!!</h1>

        <!-- <h4>have a great time :)</h4> -->
        <p><img src="../bootstrap/images/l.png" alt=""><?php echo $member->first_name;?> <?php echo $member->last_name;?></p>
        <p>This is a simple and user easy informational website. And your organization: <?php echo $organization->org_name;?> provides wide range of the coureses </p>
        

      </div>

    <div class="col-xs-3 col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
            <ul class="nav">
              <li>option courses</li>
              <li class="active"><a href="#"></a></li>

              <li><a href='add_courses'>+ courses</a></li>
              <li><a href='deactivate_courses'>-- courses</a></li>
              <li><a href='activate_courses'>++ courses</a></li>
              <li><a href='detele_courses'>unEnroll courses</a></li>
              
            </ul>
          </div><!--/.well -->
        </div>
         </div><!--/.well -->
        </div>
         </div><!--/.well -->
        
      <div class="jumbotron">
      <div class="container">
      <div class="panel panel-default ">
      <!-- Default panel contents -->
      <div class="panel-heading"><h2>Add Courses</h2></div>
      <!-- Table -->
      
      <table class="table">
        <tr>
              <td width="300">Course Name</td>
              <td width="200">Category</td>
              <td width="300">Duration</td>
              <td width="300">mark to add</td>
              
            </tr>
            <form method='post'>
            <?php  $bool=TRUE;
                foreach($enrollments as $enrollment)
                {   $course= Course::find_by_id($enrollment->course_id);
                  $member_enrollment= Enrollment::find_by_course_id_and_member_id_and_is_delete($course->id,$member->id,FAlSE);
                  if ($member_enrollment) { 
                    continue;
                  }
                  $bool=FAlSE;
                  
              ?>
            
            <tr>
              <td width="300"><?php echo $enrollment->course->cname;?></td>
              <td width="200"><?php echo $enrollment->course->catagory;?></td>
              <td width="300"><?php echo $enrollment->course->duration;?></td>
              <td width="300">
              <input type= "checkbox" name= "check_list[]" value="<?php echo $enrollment->course->id;?>"><?php echo $enrollment->course->cname; ?> <br>
              </td>
            </tr>

          <?php 
              continue;
                }
            if($bool) {

              echo "no course to add :(";
            }
          ?>
            


      </table>
      <div class="col-lg-offset-10">
      <input type="submit" name="submit" value="submit"></div>          
    </form>

    </div>

    </div>
    </div>

    <div class="row">
      <div class= "col-md-4 col-md-offset-5">
        <?php if(isset($message))
        echo $message;
        ?>
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
    <img src="https://chart.googleapis.com/chart?chs=100x100&amp;cht=qr&amp;chl=http://www.jotform.org"> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>