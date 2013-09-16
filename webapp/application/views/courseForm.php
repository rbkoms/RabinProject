

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/1.png">

    <title>Good Day</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../bootstrap/css/offcanvas.css" rel="stylesheet">
    <link href="../../bootstrap/css/signin.css" rel="stylesheet">
    <link href="../../bootstrap/css/theme.css" rel="stylesheet">
    

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
              </li>
          </ul>
          
        </div><!--/.navbar-collapse -->
      </div>
    </div>



   

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">

    
      <?php
        if(isset($message))
        {
          echo $message;
        }

        if($this->session->flashdata('error'))
        {
          echo $this->session->flashdata('error');
        }

        if($this->session->flashdata('success'))
        {
          echo $this->session->flashdata('success');
        }
      ?>

        <form class="form-signin" method="post">
          <h2 class="form-signin-heading">Add Course</h2>

          <p>
              <input type="text" class="form-control" placeholder="name" name="cname" autofocus>
          </p>
       
        <p>
              <input type="text" class="form-control" placeholder="catagory" name="catagory">
          </p>

        <p>
              <input type="text" class="form-control" placeholder="duration" name="duration">
          </p>
         <p>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add</button>
          </p>   
      
         
        </form>
        </div>
        <div class="col-lg-5">
          <h2>Courses</h2>
          <p>Our users/members associated with the respective organization will be provided with the bunch of the online courses along with certifed certificate. Use it as a starting point to create something more unique. </p>
          <a class="btn btn-lg btn-primary btn-block" href="course_signup/outcoursedetails">View Courses &raquo;</a>
        </div>
       </div>
       </div>
        <!-- <h1>Members & Courses</h1>
        <p>Our users/members associated with the respective organization will be provided with the bunch of the online courses along with certifed certificate. Use it as a starting point to create something more unique.</p> -->
        
      </div>
    </div>
    </br>
    </br>
    </br>
    
    <div class="container">
      <!-- Example row of columns -->
      <h3><u><b><font size="7" face="Georgia, Arial" color="maroon">O</font>live Media courses:</b></u></h3>  
      <div class="row">
        <div class="col-lg-3">
          <h2>Nepali</h2>
          <p>We have many leading organizations from new Market. In add oragnizaiton alloted courses each </p>
          
        </div>

        <div class="col-lg-3">
          <h2>Automata</h2>
          <p><h4>PDA,AUTOMATION,and so on</h4> </p>
        </div>
        
        <div class="col-lg-3">
          <h2>Respect </h2>
          <p>Know how to respect</p>
          
        </div>
     
         
        <div class="col-lg-3">
          <h2>Research</h2>
          <p>If you have some inovative ideas ,we heartly welcome you</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
       
      </div>
      </div>
     
    </br>
    </br>
    </br>

      <h3><u><b><font size="7" face="Georgia, Arial" color="maroon">H</font>amro Nepal courses:</b></u></h3>  
      <div class="row">
        <div class="col-lg-3">
          <h2>Nepali</h2>
          <p>We have many leading organizations from new Market. In add oragnizaiton alloted courses each </p>
          
        </div>

        <div class="col-lg-3">
          <h2>Regions</h2>
          <p><h4>3 main regions</h4> </p>
        </div>
        
        <div class="col-lg-3">
          <h2>Respect </h2>
          <p>Know how to respect</p>
          
        </div>

        <div class="col-lg-3">
          <h2>Desh</h2>
          <p>Kei garumm aba hamro nepal ko lagii</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>
      </div>

      <div class= "row">
        <div class="col-lg-3">
          <h2>Capital</h2>
          <p>If you have some inovative ideas ,we heartly welcome you</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>
        <div class="col-lg-3">
          <h2>Cookie</h2>
          <p>Cookie the datums</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>
        <div class="col-lg-3">
          <h2>Cache</h2>
          <p>Cache contains many importants</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>
        <div class="col-lg-3">
          <h2>Assemble</h2>
          <p>Inovative assembles </p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>

      </div>

    </br>
    </br>
    </br>
      
      <h3><u><b><font size="7" face="Georgia, Arial" color="maroon">G</font>lobal courses:</b></u></h3>
      <div class="row">
      <div class="col-lg-3">
          <h2>GPS</h2>
          <p>We have many leading organizations from new Market. In add oragnizaiton alloted courses like GPS(global position system) </p>
          
      </div>

      <div class="col-lg-3">
          <h2>Computer Networks</h2>
          <p>Distributed Systems & Networking are main features of the courses</p>
          
   
      </div>
        
      <div class="col-lg-3">
          <h2>Antinas</h2>
          
          <p>Its very inovative idea as todays world is tranforming to the wireless environments</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
      </div>
      <div class="col-lg-3">
          <h2>Areas</h2>
          
          <h4>Views the details of the areas that has been captured</h4>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
      </div>

      </div>

    </br>
    </br>
    </br>
      <h3><u><b><font size="7" face="Georgia, Arial" color="maroon">C</font>isco courses:</b></u></h3>  
      <div class="row">
        <div class="col-lg-3">
          <h2>Networking</h2>
          <p>We have many leading organizations from new Market. In add oragnizaiton alloted courses each </p>
          
        </div>

        <div class="col-lg-3">
          <h2>Distributed Database</h2>
          <p><h4>Playing with the database</h4> </p>
        </div>
        <div class="col-lg-3">
          <h2>Online GO</h2>
          <p>It helps to be in touch with the advance courses</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
       
        </div>
      </div>
        <div class="row">
        <div class="col-lg-3">
          <h2>Certificate </h2>
          <p>Certified Certificates will be alloted</p>
          
        </div>
         </div>

    </div>
         
        









      

      <hr>

      <footer>
        <p>&copy; OLIVE MEDIA 2013</p>
      </footer>
      <footer>
      <h3><b><font size="2" face="Georgia, Arial" color="black">Social Media:</font></b></h3>  
      <div class="row">
        <div class="col-lg-1">
          <li><a href="http://www.facebook.com"><img src="images/fb.png" alt=""></a></li>
          
        </div>

        <div class="col-lg-1">
          <li><a href="http://www.twitter.com"><img src="images/tw.png" alt=""></a></li>
        </div>

        <div class="col-lg-1">
          <li><a href="http://www.myspace.com"><img src="images/my.png" alt=""></a></li>
        </div>
      </div>
    
    </footer> 
    </div> <!-- /container -->


   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
   
  </body>
</html>
