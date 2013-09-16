
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
                <li><a href="../userlogin/feedback">leave feedback</a></li>
                 
              </ul>
              <li><a href="#" data-toggle="modal" data-target="#myModal" class="icon-bar">Sign Up</a></li>

              
            </li>
            </ul>
           
         

          <form class="navbar-form navbar-right" method="post" action="userlogin">
                        <?php if(isset($message)) {

                    echo $message;
                        } 
                    ?>

            <div class="form-group">
              <input type="text" name = "username" placeholder="Enter Your Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name = "password" placeholder="Enter Your Password" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success">Sign in</button>
            

          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                <h4 class="modal-title">Member Sign up</h4>
              </div>
              <div class="modal-body">
                
                <form method ="post" action="signup">
                  <h2 class="form-signin-heading">Sign Up</h2>
                  
                  <input type="text" class="form-control" placeholder="Email address" name="email" autofocus>
                  <input type="text" class="form-control" placeholder="Firstname" name="first_name">
                  <input type="text" class="form-control" placeholder="Lastname" name="last_name">
                  <input type="text" class= "form-control" placeholder="UserName" name="username">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  <input type="radio" name="sex" value="Male">Male
                  <input type="radio" name="sex" value="Female">Female<br>
                  Organization: <select name="organization_id">

                  <?php
                    foreach($organizations as $organization)
                    {?>
                   <option value="<?php echo $organization->id; ?>"><?php echo $organization->org_name; ?>
                      </option>
                   <?php }?>

                  </select>
                </div>
              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
              </div>
              </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
         <div class="col-lg-10">
        <h1>Welcome!!</h1>
        <!-- <h4>have a great time :)</h4> -->
        <p>This is a simple and user easy informational website. It includes a large numbers of organization along with respective courses. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="../userlogin/about">Come Inside &raquo;</a></p>
      
        
      </div>
      &nbsp &nbsp&nbsp<div class="col-lg-1" id="sidebar" role="navigation">
          
            <ul class="nav">
              <li><a href="http://www.twitter.com"><img src="../bootstrap/images/tw.png" alt=""></a></a></li>
              <li><a href="http://www.facebook.com"><img src="../bootstrap/images/fb.png" alt=""></a></li>
              <li><a href="http://www.myspace.com"><img src="../bootstrap/images/my.png" alt=""></a></li>
              
              
            </ul>
          </div>
          <div class="col-lg-1">
            <script src="//www.gmodules.com/ig/ifr?url=http://hosting.gmodules.com/ig/gadgets/file/107950459797439355026/CGS_Small_English.xml&amp;synd=open&amp;w=172&amp;h=55&amp;title=Courses+Search&amp;border=%23ffffff%7C3px%2C1px+solid+%23999999&amp;output=js"></script>
          </div>  <!--/.well -->
        </div>
    
    </div>
    </div>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Organization</h2>
          <p>We have many leading organizations from new Market. In add oragnizaiton alloted courses each </p>
          <a href="../org_signup"><img src="../bootstrap/images/course.png" alt=""></a>
          <p><a class="btn btn-default" href="../org_signup">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Member and Online Courses</h2>
          <p>Olive Media specialises in offering training courses to meet your organisational goals to maximise employee performance and achieve long term business success. </p>
          <p><a href="../course_signup"><img src="../bootstrap/images/org.png" alt=""></a></p>
          <p><a class="btn btn-default" href="../course_signup">View details &raquo;</a></p>
          
       </div>
        <div class="col-lg-4">
          <h2>Contact</h2>
          <p>If you’d like to speak to someone in Olive Media feel free to call us on +353 1 411 1011 or send us a message through our contact page</p>
          
            <!-- <div class="col-lg-2"> -->
          <li><a href="https://maps.google.com.np/maps?q=chabil%20nepal%20map&um=1&hl=en&biw=1280&bih=636&ie=UTF-8&sa=N&tab=il"><img src="../bootstrap/images/map.png" alt=""></a></li>
          
        </div>

        </div>
      </div>

      <hr>

      <footer>
        <p>   &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&copy; OLIVE MEDIA 2013</p>
   
      </footer>
      
        
    <script src="/bootstrap/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
        
    
    <script>
    $( document ).ready(function() {
 
    $( "a[id='submit']" ).trigger('click');
    
 
    });
    </script>
  </body>
</html>
