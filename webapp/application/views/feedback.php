
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
            <li class="active"><a href="../userlogin">Home</a></li>
            <li><a href="/userlogin/about">About</a></li>
            <li><a href="/userlogin/contact">Contact</a></li>
            
             </ul>
            </li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Enter Your Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name = "name" placeholder="Enter Your Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form> -->
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
 
     <div class="jumbotron">
      <div class="container">
         <?php
        if(isset($message))
        {
          echo $message;
        }
        ?>

       <form class="form-signin" method="post">
          <h2 class="form-signin-heading">Feedback</h2>

          <p>
              <input type="text" class="form-control" placeholder="feedback please" name="feedback" autofocus>
          </p>
          <p>
              <input type="text" class="form-control" placeholder="your name" name="name">
          </p>
       
         <p>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add</button>
          </p>   
      
         
        </form>
         
      </div>
    </div>


  <hr>
      
      
   
         
 <hr>

      <footer>
        <p>&copy; OLIVE MEDIA 2013</p>
        
      </footer>
         <a href="http://www.facebook.com"><img src="../bootstrap/images/fb.png" alt=""></a></li>
          
        </div>

        <div class="col-lg-1">
          <a href="http://www.twitter.com"><img src="../bootstrap/images/tw.png" alt=""></a></li>
        </div>

        <div class="col-lg-1">
          <a href="http://www.myspace.com"><img src="../bootstrap/images/my.png" alt=""></a></li>
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
