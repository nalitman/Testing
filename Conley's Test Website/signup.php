<?php

    $error = "";
    $password = "";
    $confirmedPassword = "";
    $email = "";
    $username = "";

    $host = "localhost";
    $uname = "root";
    $pwd = "";
    $database = "my_uni_market";

    $link = mysqli_connect($host, $uname, $pwd, $database);

    if(mysqli_connect_error()){
        exit("There was an error connecting to the database");
    }else{
        //echo "Database connection successful!";
    }

  if ($_POST){

    //! Checking if username field is empty
    if(!$_POST['username']){

        $error .= "A username is required.<br>";
      
    }
    else
        $username = $_POST['username'];

    //! Checking if email field is empty
    if(!$_POST['email']){

      $error .= "An email address is required.<br>";
    
    }
    else
      $email = $_POST['email'];

    //! Checking if password field is empty
    if(!$_POST['password']){

      $error .= "The password is required.<br>";
    }
    else
      $password = $_POST['password'];

    //! Checking if confirm password field is empty
    if(!$_POST['confirmPassword']){

        $error .= "Confirmation of your password is required.<br>";
    }
    else
        $confirmedPassword = $_POST['confirmPassword'];

    //! Checking if the passwords match
    if(($_POST['confirmPassword'] && $_POST['password']) && $_POST['confirmPassword'] != $_POST['password']){

        $error .= "Passwords do not match.<br>";
    }

    //! Checking if the email is in valid format
    if($_POST['email'] && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false){

      $error .= "The email address is invalid.<br>";
      $email = "";
    }

    //! Displaying the error message if its not empty or executing main code if it is
    if($error != ""){

      $error = '<div class="signup-error" style="color:red;"><strong>Error:</strong><br>'.$error.'</div>';
    }
    else{

        $error = '<div class="signup-success" style="color:green;"><p>Sign Up Success!</p></div>';
        $password_hash = password_hash($password, PASSWORD_DEFAULT); //? Hashing the password
        $query = "INSERT INTO `users` (`email`, `password`, `username`) VALUES ('".$email."', '".$password_hash."', '".$username."')";
        mysqli_query($link, $query);
    }

  }
?>

<!doctype html>
<html lang="en">
<head>
	<!-- important for compatibility charset -->
    <meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>MyUniMarket - Sign Up</title>
	
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    
    <!-- important for responsiveness remove to make your site non responsive. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    
    <!-- Animation CSS -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="all" />
    
    <!-- Foundation CSS File -->
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css" media="all" />
    
    <!-- Font Awesome CSS File -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" />
    
    <!-- FlatIcon set -->
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css" media="all" />
    
    <!-- OWL Crousel CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="all" />
    
    <!-- Theme Styles CSS File -->
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CMontserrat:400,700" rel="stylesheet" type="text/css" />
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62711679-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body class="inner-page">
	<!-- MAIN Container Start here. -->
	<div class="container">
        
        <!-- Top Bar Starts Here -->
        <div class="top-info-bar">
        	<div class="row">
                    <div class="logo float-left">
                            <img alt="" src="../ImageFiles/MyUniMarket.png" />
                        </div><!-- Logo /-->
                
                <div class="medium-6 small-12 columns hide-for-small-only">

                </div><!-- Right Ends /-->
                
            </div><!-- row /-->
        </div>
        <!-- top Bar Ends here /-->
        

        <div class="content-container module">
			
            <!-- Title Section -->
            <div class="title-section">
                <div class="row">
                    <div class="small-12 columns">
                        <h1>New Account</h1>
                    </div> <!-- title /-->
                </div><!-- row /-->
            </div>
            <!-- Title Section End -->
            
           <div class="spacer module"></div>
           <div class="row">
            	<div class="medium-5 small-12 medium-offset-1 columns form-container">

                                <h2>Sign Up to start browing</h2>

                                <div class="err"><?php echo $error; ?></div>

                                <form method="post">
                                    <label>
                                            Username
                                            <input type="text" name="username" value="" placeholder="Your Username ..." />
                                            </label>
    
                                        <label> 

                                    <label>
                                        Your Email address
                                        <input type="text" name="email" value="" placeholder="Your Email Address ..." />
                                    </label>
                                    
                                        Your Password
                                        <input type="password" name="password" value="" placeholder="Enter password ..." />
                                    </label>

                                    <label>
                                            Confirm Password
                                            <input type="password" name="confirmPassword" value="" placeholder="Confirm password ..." />
                                        </label>

                                    <input type="submit" value="Sign Up" class="button primary" />
                                    <a href="signin.html">Already have an account?</a>
                                </form>
                
                </div>
               <!-- sidebar Ends -->
            	
                <div class="medium-6 small-12 columns sidebar">
					
                    <div class="widget">
                        <h2>Terms of Service</h2>
                        
                        <div class="widget-content">
                        	
                                <strong>Bold Text Here</strong> 	
                            </label>
                                <p>Regular Text Here</p>
						</div><!-- widget content /-->
                    </div><!-- widget ends -->

                </div>
                <!-- left area ends -->
            </div><!-- row ends /-->
   
        
            
        </div> <!-- content-container /-->
        

        <!-- Call to Action box -->
        <div class="call-to-action">
           <div class="row">
                <div class="medium-5 small-12 columns">
                    <h4> InsertTextHere</h4>
                </div>
                <div class="medium-7 small-12 columns signup-form">
                </div>
           </div><!-- row -->
         </div>
        <!-- Call to Action End -->
        
        <!-- Footer -->
	   <div class="footer">

        
        <!-- Footer bottom -->
        <div class="footerbottom">
        	<div class="row">
            	<div class="medium-6 small-12 columns">
                    <div class="clearfix"></div>
                    <div class="copyrightinfo">2019 © <a href="#">MyUniMarket</a> All Rights Reserved.</div>
                </div><!--left side-->
            </div>
        </div><!-- footer Bottom -->
   </div>
	   <!-- Footer Ends here -->

	</div>
    <!-- MAIN Container Ends here. -->
	<a href="#top" id="top" class="animated fadeInUp start-anim"><i class="fa fa-angle-up"></i></a>
	<!-- Page Preloader 
    <div class="preloader">
        <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
        </div>
	</div>
    	-->
    <!-- Including Jquery so All js Can run -->
	<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
    
   	<!-- Including Foundation JS so Foundation function can work. -->
    <script type="text/javascript" src="js/foundation.min.js"></script>
   	<!-- Crousel JS -->
   <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <!-- jQuery Timer plugin delete if not using -->
    <script src="js/jquery.simple.timer.js"></script>
   <!-- Webful JS -->
   <script src="js/webful.js"></script>
</body>
</html>
