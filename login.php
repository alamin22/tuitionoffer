
<?php
include("header.php");
?>



<html lang="en-US">
<head>
	<title>Login page</title>
	<style media="screen">

    *{
      margin: 0px;
      padding: 0px;
    }

    .top_menu {
    	min-height: 50px;
    	background: #F4F5F3;
    	box-shadow: 0 0 5px;
    	width: 30%;
      overflow: hidden;
    }

    .top_menu a {
		display: block;
		width: 150px;
		min-height: 50px;
		line-height: 50px;
		float: left;
		color: #000;
	}

    .login_form_container {
    	float: right;
    }


    .login_form_container {
    	overflow: hidden;
    }

    .login {
    	float: left;
    }

    .login input[type="submit"] {
    	box-shadow: 0 0 3px #04aeae;
    	width: 50px;
    }


    /* For make placeholder text bold */
    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        font-size:15px;
        font-weight: bold;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       font-size:15px;
       font-weight: bold;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
       font-size:15px;
       font-weight: bold;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
       font-size:15px;
       font-weight: bold;
    }
    /* end to make placeholder text bold */




   input {
    	display: block;
    	padding: 5px;
    	width: 90%;
    	margin: 7px auto;
    	box-shadow: 0 0 1px #31382c;
    }
	    </style>
		

</head>
<body>
    <center>
<h2 style="margin-top: 70px" >Login</h2>
 <div class="top_menu">
        <a href="index.php">Tuitionsbd.com</a>
        
        <div class="login_form_container">
        	<h5 style="text-align: center;">Already registered? then..</h5>
          <form class="login-form" action="validation.php" method="post">
            <div class="email_or_mobile login">
                <input type="email" name="email" value="" id="email_or_mobile" placeholder="Email" required>
            </div>
            <div class="password login">
                <input type="password" name="password" value="" id="login_password" required placeholder="Password">
            </div>
            <div style="margin-top: 55px;float: right;">
                 <input class="btn btn-md btn-success col-sm-15" type="submit" name="login" value="login">
            </div>
             
           
          </form>
        </div>
      </div>
	  <p class="warning" style="text-align:center;font-style: italic; color: red; padding: 5px;"><?php if(isset($_SESSION['msg'])) echo $_SESSION['msg'];?></p>
<h3><a href="signup.php">Not account? Register now</a></h3>
</center>
<?php 
include("footer.php");
?>