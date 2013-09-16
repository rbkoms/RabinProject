

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/1.png">

    <title>Jumbotron Template for Bootstrap</title>

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

        if($this->session->flashdata('in'))
        {
          echo $this->session->flashdata('in');
        }
      ?>

        <form class="form-signin" method="post">
          <h2 class="form-signin-heading">Add Organization</h2>

          <p>
              <input type="text" class="form-control" placeholder="organization name" name="org_name" autofocus>
          </p>
       
        <p>
              <input type="text" class="form-control" placeholder="location" name="org_location">
          </p>

        <p>
              <input type="text" class="form-control" placeholder="Director" name="org_director">
          </p>
          <p>
              <input type="text" class="form-control" placeholder="contact number" name="org_contact_no">
          </p>
         <p>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add</button>
          </p>   
      
         
        </form>
        </div>
        <div class="col-lg-5">
          <h2>Organizations</h2>
          <p>Our users/members associated with the respective organization will be provided with the bunch of the online courses along with certifed certificate. Use it as a starting point to create something more unique. </p>
          <a class="btn btn-lg btn-primary btn-block" href="/org_signup/outorgdetails">View Organizations &raquo;</a>
        </div>
        

       </div>
       </div>
        
        
      </div>
    </div>
    </br>
    </br>
    </br>
    

    



     <div class="container">
        <h1>Our Organizations</h1>
        <p>As we stated we have many leading organizations in our bucket list..</p>
        <p><a class="btn btn-primary btn-lg" href="/org_signup/outorgdetails">View Organizations &raquo;</a></p>
      </div>
      </br>
      </br>   

    <div class="container">
        <h1>Olive Media</h1>
        <p>This is a simple and user easy informational website. It includes a large numbers of organization along with respective courses. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">View Courses &raquo;</a></p>
      </div>
      </br>
      </br>

    <div class="container">
        <h1>Hamro Nepal</h1>
        <p>This is a simple and user easy informational website. It includes a large numbers of organization along with respective courses. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">View Courses &raquo;</a></p>
      </div>
      </br>
      </br>

      <div class="container">
        <h1>Global Ltd</h1>
        <p>This is a simple and user easy informational website. It includes a large numbers of organization along with respective courses. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">View Courses &raquo;</a></p>
      </div>
      </br>
      </br>

      <div class="container">
        <h1>Cisco</h1>
        <p>This is a simple and user easy informational website. It includes a large numbers of organization along with respective courses. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">View Courses &raquo;</a></p></br>
        <p>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
      </div>




</br>
</br>
</br>

    <div class="container">
      <!-- Example row of columns -->
      

      <div class="row">
        <div class="col-lg-3">
          <h2>Organization</h2>
          <p>We have many leading organizations from new Market. In add oragnizaiton alloted courses each </p>
          
        </div>
        <div class="col-lg-3">
          <h2>Check Out the leading companies</h2>
          <p><h4>a.Olive Media</h4> <h4>b.Hamro Nepal</h4></p>
          <h4>c.Dell</h4>
   
       </div>
        <!-- <div class="col-lg-3">

          <div class="row">
            <div class="col-lg-1">span1
            </div>
          
            <div class="col-lg-1">span2
            </div>
            <div class="col-lg-1">span3
            </div>
          </div> -->
          <div class="col-lg-3">
          <h2>Contact </h2>
          <p>Office::021545815484</p>
          <h4>Address::HK,Mars</h4>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
        </div>
        <div class="col-lg-3">
          <h2>Research</h2>
          <p>If you have some inovative ideas ,we heartly welcome you</p>
          <!-- <p><a class="btn btn-default" href="#">View details &raquo;</a></p> -->
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
