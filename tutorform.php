 <?php
 include("connection.php");
include("header.php");
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
    /* end to make placeholder text bold */


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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script> 


<div class="false">

</div>
<div class="container" style="margin-top: 51px">
<h2 id="fillup">Fill Up Tutor Requirement Form</h2>
<h4 id="fillup2">All fields are require, please fill all information and submit the form</h4>
	
<br>
 </div>
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
<h3>Login Details</h3>
<input type="text" class="form-control" name="username" placeholder=" Username" id="" required>
<input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
<input type="password" class="form-control" name="Confirmpassword" placeholder="Confirm password" id="con_password" required>

<h3>Personal Details</h3>
<input type="text" class="form-control" name="fullname" placeholder=" Full name" id="" required>
<input type="email" class="form-control" name="email" placeholder="Email Address" id="" required>
<input type="text" class="form-control" name="phone_mobile" placeholder="Phone/Mobile" id="" required>

<select name="tutor_gender" class="form-control" id="location1" required>
<option>Select Gender</option>
<option value="Male"  id="">Male</option>
<option value="Female" id="">Female</option>
</select>
<input type="text" class="form-control" name="contactaddress" placeholder="Contact address" id="" required>


    


    <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'divisionid='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select Upazila/Thana</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select District</option>');
            $('#city').html('<option value="">Select Upazila/Thana</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'districtid='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select Upazila/Thana</option>'); 
        }
    });
});
</script>
      
    


    <?php
    //Include database configuration file
    include('dbConfig.php');
    
    //Get all country data
    $query = $db->query("SELECT * FROM divisions  ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="country" class="form-control" id="country" >
        <option value="">Select Division</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option value="">Division not available</option>';
        }
        ?>
    </select>
    
    <select name="district" class="form-control" id="state">
        <option value="">Select District</option>
    </select>
    
    <select name="thana_upazila" class="form-control" id="city">
        <option value="">Select Upazila/Thana</option>
    </select>

<input type="text" class="form-control" name="tuitionarea" placeholder=" Tuition Area *" id="" required>
</select>
<input type="text" class="form-control" name="subject" placeholder=" Subjects(such as Math,Physics,English)" id="" required>
</select>

<input type="number" name="day" class="form-control" placeholder="days in a week" id="location1" required>

<input type="text" class="form-control" name="fee" placeholder="Expected Fee/Manth *" id="" required>



<h3>Education details </h3>


<select name="educationlevel" class="form-control" id="location1" required>
<option>Education Level</option>
<option value="Doctorate" id="">Doctorate</option>
<option value="Post Graduate" id="">Post Graduate</option>
<option value="Graduate" id="">Graduate</option>
<option value="Graduation(running)" id="">Graduation(Running)</option>
<option value="Diploma" id="">Diploma</option>
<option value="Higher Secondary" id="">Higher Secondary</option>
<option value="Secondary" id="class">Secondary</option>
</select></td>

<input type="text" class="form-control" name="institute" placeholder="Institute *" id="" required>
 
<input type="reset" class="btn btn-danger " name="reset" value="Reset" id="reset">
  <input type="submit" class="btn btn-success" name="signup" id="btnSubmit" value="Create Account">
   <p>Please remember email and password. These will be needed for the next login</p>
</form>


</div>


</div>
</center>
  <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("Password").value;
        var confirmPassword = document.getElementById("Confirmpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

<script>
$("#menu").click(function(){
$("#showing").toggle(500);
});
return false;
</script>
<?php
include("footer.php");
?>