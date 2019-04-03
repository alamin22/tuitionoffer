<?php
include"connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tutor profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<center>
<div class="connection" style="margin-top: 60px;max-width: 70%;">
	<?php
if(isset($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $statement=null;
  try{
  $statement=$conn->prepare("select * from tutor where tid=?");
  $statement->execute(array($id));
  $table=$statement->fetchAll();

  }catch(PDOException $e){
    echo $e->getMessage();
  }
finally{
	if($statement!=null){

		$statement=null;
	}
}
foreach ($table as $row) {
	?>
	<div class="well" style="min-height: 100%">
		<?php echo"<h3 class=text-info>". $row['fullname']. " Profile </h3>"?>	
	<table class="table table-striped">
		
		<tr>
			<td>
				<?php echo"<b> Full Name : </b>".$row['fullname']?>
			</td>
		</tr>
			<tr>
			<td>
				<?php echo"<b> Tutor Gender : </b>".$row['tutor_gender']?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo"<b>Prefered Subject : </b>".$row['subject']?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo"<b> Expected Salary : </b>".$row['fee']?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo"<b> Days In a Week : </b>".$row['day']?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo"<b> Tution Area : </b>".$row['tuitionarea']?>
			</td>
		</tr>
			<tr>
			<td>
				<?php echo"<b> Contact Address : </b>".$row['contactaddress']?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo"<b> Educational Level : </b>".$row['educationlevel']?>
			</td>
		</tr>

		<tr>
			<td>
				<?php echo"<b> Institution Name : </b>".$row['institute']?>
			</td>
		</tr>
           <tr><td>
           	   <h4 class="text-info" style="font-weight: bold">Tutor Permanent Addrerss</h4>
           </td></tr>
		
			<tr>
			<td>
				<?php echo"<b> Upozela Name: </b>".$row['thana_upazila']?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo"<b> District Name: </b>".$row['district']?>
			</td>
		</tr>
		  <tr><td>
           	   <h4 class="text-info" style="font-weight: bold">Contact With Tutor</h4>
           </td></tr>
	</table>
   

   <button class="btn btn-primary" id="button">Contact</button>
   <div class="well" style="min-width:30%;display:none;position: absolute; float: left;background: gray" id="show">  
        <?php echo"<b> Email : </b>".$row['email']?><br>
        <?php echo"<b> Mobile : </b>".$row['phone_mobile']?>
   </div>

    <a class="btn btn-success" href="tutor_post.php">Back</a>
      <div class="container_fluidn" style="margin-top: 49px;font-size: 23px">
      	 <a  href="index.php">Back to Home</a>
      </div>
	</div>
<?php
}
}
?>

</div>
</center>
<script>
$(document).ready(function(){
    $("#button").click(function(){
    	$("#show").toggle();
    });
});
</script>

</body>
</html>
