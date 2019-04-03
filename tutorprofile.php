
<?php
include("header.php");
?>
<style>
.false{
width:100%;
height:60;
}

.leftside{
float:left;
width:34%;
height:100%;
}
.rightside{
float:right;
background:rgb(230, 230, 230);
width:65%;
}
#search{
width:95%;
height:40;
background:blue;
text-align:center;
font-family:arial;
font-size:31;
color:white;
padding:12px 12px;
}
#city{
width:70%;height:33;
font-size:19;
}
#submit{
width:29%;height:36;
color:white;background:green;
font-size:20;
}
.find{
margin-top:12;
}
.paging{
width:100%;
height:33;

}
</style>



<!--menu side-->
<div class="false">

</div>




<div class="">

<?php
include("connection.php");
if(isset($_REQUEST['id'])){
   $id = $_REQUEST['id'];
}
else{
   header('location: providerdetails.php');
}

/*for searching*/


$statement  = null;
try
{
  $statement = $conn->prepare("select * from tutor where tid=?");
  $statement->execute(array($id));
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
foreach($tutor_rows as $row){
echo"<div>";
echo"<br><br>";
?>
<table style="margin-left:47;background:white;width:785;height:300;">
<tr><td><center><b style="font-size:23;color:#34445B">Tutor Profile</b></center></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Tutor Name:</b> <?php echo $row['fullname']?></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Preferred Subject :</b> <?php echo $row['subject']?></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Tuition Area: </b><?php echo $row['tuitionarea']?></tr>
<tr><td><br><b style="margin-left:56;font-size:18;color:#00007F">Thana/Upazila:</b> <?php echo $row['thana_upazila']?></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">District: </b><?php echo $row['district']?></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Contact Address: </b><?php echo $row['contactaddress']?></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Tutor Gender: </b><?php echo $row['tutor_gender']?></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Phone/Mobile: </b><?php echo $row['phone_mobile']?></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Email: </b><?php echo $row['email']?></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Education Level: </b><?php echo $row['educationlevel']?></td></tr>
<tr><td><b style="margin-left:56;font-size:18;color:#00007F">Institute Name: </b><?php echo $row['institute']?></td></tr>
 
<tr><td><b style="margin-left:56;font-size:18;color:#34445B"><?php echo $row['day']?> Day</b> In Week
<b style="margin-left:30;font-size:18;color:#34445B"><?php echo $row['fee']?>Tk. </b>Fee Range Per Month</td>
<tr><td><b style="margin-left:500;"> Posted Date:</b><?php /* echo $row['date'] */?></td></tr>
<tr><td><li style="float:right;margin-right:70;list-style:none;padding:8px 8px;background:green;border-radius:4px">
<a style="text-decoration:none;color:white;padding:8px 8px;font-size:20;font-family:arial" href="tutordetails.php">View More Tutor</a></li></td></tr>

<?php
 if(isset($_POST['abc'])){ 
	// Authorisation details.
	$username ="ismailcse14@gmail.com";
	$hash ="58909bf801e22065a308fbd3e23d00a34e7c53dae4485bbaaa96b0c65c2752aa";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender =  "Tuitionsbd.com"; // This is who the message appears to be from.
	$numbers = $row['phone_mobile']; // A single number or a comma-seperated list of numbers
	//$numbers = "01743557172"; // A single number or a comma-seperated list of numbers
	$message = $_POST['mess']."Number".$_POST['num']."Email:".$_POST['email'];
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	//echo($result);
	}
	
if(isset($_POST['abc'])){
	$message = $_POST['mess'].".  Phone/Mobile = ".$_POST['num'].". Email = :".$_POST['email'];
	try{
			if(mail($row['email'],"Tuitionsbd.com",$message)){
		throw new exception("send success");
	}else{
		throw new exception("send failed");
	}
	}catch(Exception $e){
		$messag=$e->getMessage();
	}

}
	
	
?>
</table>

<form method="post" action="">
<h2>Contact Tutor</h2>

<?php
if (isset($messag)) {
	echo $messag;
}
echo "<br><br>";

if (isset($result)) {
	echo $result;
}
?>
<table align="center">
<tr>
<td>Name:</td>
<td><input type="text" name="name" placeholder="enter your name" required> </td>
</tr>

<tr>
<td>Phone/Mobile:</td>
<td><input type="text" name="num" placeholder="enter your phone number" required></td>
</tr><tr>
<td>Email:</td>
<td><input type="email" name="email" placeholder="enter your Email" required></td>
</tr>
<tr>
<td>Message:</td>
<td><textarea name="mess" placeholder="enter your message" required></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="abc" value="send"></td>
</tr>
</table>
</form>
</body>


<?php

}

echo"</div>";



?>
</div>

<div>

<?php
include("footer.php");
?>
</div>