<?php

    session_start();
    $testerID = "";
    if(!$_SESSION['email']){

        header('Location: signin.php'); 
    }
    else{

        $testerID = $_SESSION['email'];
    }
    //? Variables to be used
    $itemName = "";
    $itemPrice = "";
    $itemDescription = "";
    $location = "";
    $itemCategory = "";
    $itemQualPity = "";
    $newitemName = "";
    $newitemPrice = "";
    $newitemDescription = "";
    $newlocation = "";
    $newitemCategory = "";
    $newitemQuality = "";
    $error = "";

    //? Connecting to the database
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



    
?>
    
<!doctype html>
<html lang="en">
<head>
	<!-- important for compatibility charset -->
    <meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <script src="./js/badWordsMultiple.js" type="text/javascript"></script>
    <script src="./js/logoutSuccess.js" type="text/javascript"></script>
    
    <title>MyUniMarket - Edit Post</title>
	
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
                            <a href="market.html"> <!--NEEDS TO BE INDEX.HTML-->
                                <img alt="" src="../ImageFiles/MyUniMarket.png" />
                            </a> 
                        </div><!-- Logo /-->
                        <div class="medium-6 small-12 columns hide-for-small-only">
                </div><!-- Right Ends /-->                
        </div>
        <!-- top Bar Ends here /-->
        
        <!-- Header Starts -->
        <div class="header">
            <div class="row">
                    <div class="float-right">
                        <a href="account.php" class="button primary" title="Account">Account</a>
                        <input type="submit" value="Sign Out" id="logout" class="button primary" />
                    </div>
            </div>                
        </div>

        <script type="text/javascript">
            logoutSuccess('logout');
        </script>

        <!-- Header Ends /-->
        <div class="content-container module">
            <!-- Title Section -->
            <div class="title-section">
                <div class="row">
                    <div class="small-12 columns">
                        <h1>Edit Listing</h1>
                    </div> <!-- title /-->
                </div><!-- row /-->
            </div>
            <!-- Title Section End -->
            <div class = "row">
                <div class="medium-5 small-12 medium-offset-1 columns form-container">
                    <form>
                      <label>
                            Item For Sale
                            <input maxlength="100" type="text" id="nameItem" name="itemName" value="" placeholder="Your Item ..." />
                        </label>

                        <label>
                            Price
                            <input type="number" min="0.00" max="9999.99" step="0.01" name="itemPrice" value="" placeholder="Your Requested Price ..." />
                        </label>
                            Location
                            <input maxlength="100" type="text" id="locationItem" name="location" value="" placeholder="Your Location ..." />
                        </label>
                        <label> 
                            Select Category
                            <select name="itemCategory">
                            <option disabled value="0"> -- Select an option -- </option>
                                <option value="1">Category 2</option>
                                <option value="2">Category 3</option>
                                <option value="3">Category 4</option>
                                <option value="4">Category 5</option>
                                <option selected value="5">Other</option>
                            </select>
                        </label>
                        <label>
                            Quality
                            <div class="row">
                                <div class="medium-1 small-12 columns">
                            <input type="radio" name="quality" value="0"> 1<br>
                        </div>
                        <div class="medium-1 small-12 columns">

                            <input type="radio" name="quality" value="1"> 2<br>
                        </div>
                            <div class="medium-1 small-12 columns">

                            <input type="radio" name="quality" value="2"> 3 <br>
                            </div>
                            <div class="medium-1 small-12 columns">

                            <input type="radio" name="quality" value="3"> 4<br>
                            </div>
                            <div class="medium-1 small-12 columns">

                            <input type="radio" name="quality" value="4"> 5<br>
                            </div>
                        </div>
                        </label>
                        <label>
                            Description
                            <textarea name="itemDescription" placeholder="Brief Description" id="descriptionItem" rows="4" maxlength="200"></textarea>
                        </label>        
                        <label>
                            Image Upload: [Upload Button Here]
                        </label>
                        <br>
                        <input type="submit" value="Update Post" class="button primary" />
                    </form>

                    <script type='text/javascript'>
            
                    badWordsParser('nameItem','locationItem','descriptionItem','postCreate');
        
                    </script>


                </div><!-- main search form /-->
                <div class="medium-5 small-12 columns form-container">
                        <img alt="" src="../ImageFiles/ProductImages/Image2.jpg"/> preview here
                </div>
            </div>
        	
            
                                
		</div><!-- content container /-->
                
        <!-- Footer -->
        <div class="footer">
                <div class="footerbottom">
                    <div class="row inner-padding">
                        <div class="medium-6 small-12 columns">
                            <div class="clearfix"></div>
                            <div class="copyrightinfo">2019 © <a href="#">MyUniMarket</a> All Rights Reserved.</div>
                        </div><!--left side-->
                    </div>
                </div>
            </div> <!--Footer Ends-->

	</div>
    <!-- MAIN Container Ends here. -->
	<!-- Page Preloader -->
    <div class="preloader">
        <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
        </div>
	</div>
    	
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