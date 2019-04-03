 <?php
 include("connection.php");

 include"header.php";
?>

 <style media="screen">

    *{
      margin: 0px;
      padding: 0px;
    }

    .top_menu {
    	min-height: 50px;
    	background: #F4F5F3;
    	box-shadow: 0 0 5px;
    	width: 100%;
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
     /*end to make placeholder text bold */


    .create_accout_form_container {
      max-width: 550px;
      background: #f4f5f3;
      margin: 0 auto;
      margin-top: 50px;
      text-align: center;
      padding: 10px;
      box-shadow: 0 0 3px #000;
    }


    .create_accout_form_container  p {
    	font-family: monospace;
    	font-size: 12px;
    	margin: 7px 0;
    }

    form.create_accout_form input {
	    margin: 10px auto;
	    border: 0px;
	    height: 30px;
	}

    input {
    	display: block;
    	padding: 5px;
    	width: 90%;
    	margin: 7px auto;
    	box-shadow: 0 0 1px #31382c;
    }

    input[type="submit"] {
    	box-shadow: 0 0 3px #04aeae;
    	width: 200px;
    }


	@media only screen and (max-width: 766px) {
		.top_menu a {
			display: block;
			width: 100%;
			float: none;
			text-align: center;
			background: green;
			color: #fff;
            text-decoration: none;
            font-size: 20px;
		}

		.login_form_container {
		    float: none;
		    margin: 20px auto;
		}

		.login {
		    float: none;
		}

		input {
		    padding: 5px 0;
		    width: 300px;
		}


		.login input[type="submit"] {
			width: 300px;
			margin: 0 auto;
			box-shadow: 0 0 3px #04aeae;
			background: #008000;
			color: #fff;
			padding: 9px;
			border:0px solid #000;
			border-radius: 5px;
		}

	}
	    </style>
<center>

<div class="container" style="margin-top: 51px">
<h2 id="fillup">Fill Up provider Requirement Form</h2>
<h4 id="fillup2">All fields are require, please fill all information and submit the form</h4>
	
<br>

<div class="show">
<?php
if(isset($msg)){
echo"<b style=color:blue;font-size:19>".$msg."</b>";
}
?>
</div>
<div class="create_accout_form_container">
 <h4>Create an account</h4>
  <h5>It's totally free</h5>
  <form class="create_accout_form" action="validation.php" method="post"  enctype="multipart/form-data">
<input type="text" name="fullname" class="form-control" placeholder="Name" id="" required>
<input type="email" name="email"  class="form-control" placeholder="Email" id="" required>
<input type="text" name="phone_mobile"  class="form-control" placeholder="Phone" id="" required>

<select name="student_gender"  class="form-control" id="location1" required>
<option>Select Student Gender</option>
<option value="Male"  id="">Male</option>
<option value="Female" id="">Female</option>
</select>

<select name="tutor_gender"  class="form-control" id="location1">
<option>Select desired tutor Gender</option>
<option value="any"  id="">Any</option>
<option value="Male"  id="">Male</option>
<option value="Female" id="">Female</option>
</select>
<input type="text" name="contactaddress"  class="form-control" placeholder="Contact address *" id="" required>

<select  name="district"  class="form-control" id="location1" required>
	<option>Select Districts </option>


<?php 
	
	$statement  = null;
try
{
  $statement = $conn->prepare("select * from districts");
  $statement->execute();
  $tutor_rows = $statement->fetchAll(); 
}
catch(PDOException $e)
{
  echo $e->getMessage();
}
finally
{
  if($statement!=null)
  {
    $statement = null;
  }
}
$specilDistId = 0; 
foreach($tutor_rows as $row){
	?>
<option value="<?php echo $row['name']?>" id="">
	  <?php  echo $row['name']?></option>


<?php
	}
?>
</select>
<select  name="thana_upazila"  class="form-control" id="location1" required>
	<option>Select thana/upazila *</option>


<?php 
	
	$statement  = null;
try
{
  $statement = $conn->prepare("select * from upazilas");
  $statement->execute();
  $tutor_rows = $statement->fetchAll(); 
}
catch(PDOException $e)
{
  echo $e->getMessage();
}
finally
{
  if($statement!=null)
  {
    $statement = null;
  }
}
$specilDivId = 0;
foreach($tutor_rows as $row){
	?>
	
<option value="<?php echo $row['name']?>" id="">
	  <?php  echo $row['name']?></option>


<?php
	}
?>

</select>


<input type="text"  class="form-control" name="tuitionarea" placeholder=" Tuition Area " id="" required>
</select>
<input type="text"  class="form-control" name="subject" placeholder=" Subjects" id="" required>
</select>

<input type="number" name="day" placeholder="days in a week"  class="form-control" id="location1" required>

<input type="text"  class="form-control" name="fee" placeholder="Expected Fee/Manth" id="" required>
<input type="text"  class="form-control" name="hire_date" placeholder="When Looking for Hire(DD/MM/YY)" id="" required>


<input type="text"  class="form-control" name="institute" placeholder="Institute" id="" required>
<input type="text"  class="form-control" name="other" placeholder="Other Requirement" id="" required>
 
<input type="reset"  class="form-control btn-danger" name="reset" value="Reset" id="reset">
  <input type="submit"  class="form-control btn-success" name="provider" value="Create Account">
   <p>Please remember email and password. These will be needed for the next login</p>
</form>
</center>

<script>
$("#menu").click(function(){
$("#showing").toggle(500);
});
return false;
</script>
<?php
include("footer.php"); 
?>