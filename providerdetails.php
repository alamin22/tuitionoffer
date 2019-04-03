
<?php
include "header.php";
include "connection.php";
?>
<style type="text/css">
		#pagination li a{padding:24px 25px }
	#pagination li a:hover{background:blue;color:white;}
</style>

<center>
<div class=" container-fluidn" style="margin-top: 60px;max-width: 70%;min-height: 100%">

<?php


if(isset($_POST["SearchButton"])){

	$statement  = null;
	try
	{
	  $statement = $conn->prepare("select * from provider where fullname Like ? or phone_mobile=? or  contactaddress=? or district=? or thana_upazila=? or tuitionarea=? or institute=? or subject=?");
	  $statement->execute(array($_POST["SearchInput"],$_POST["SearchInput"],$_POST["SearchInput"],$_POST["SearchInput"],$_POST["SearchInput"],$_POST["SearchInput"],$_POST["SearchInput"],$_POST["SearchInput"]));
	  $provider_rows = $statement->fetchAll(); 
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
	foreach($provider_rows as $row){
		?>
	<div class="well" style="max-width: 100%;min-height: 100% ;float: left;">
                 <h3 style="text-align: center;color:#00007F">Need A Tutor For</h3>
          <div class="container" style="max-width: 60%;min-height: 50% ;float: left;">
        	<table>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Student Gender :  </b>".$row['student_gender']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Preferred subject :  </b>".$row['subject']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Student District :  </b>".$row['district']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Tuition Area :  </b>".$row['tuitionarea']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Institute Name : </b>".$row['institute']?>
        			</td>
        		</tr>
                	<td><br>
        				<?php echo"<b style=color:#00007F> Days In a Week : </b>".$row['day']?>
        			</td>
        		</tr>
        	   	<td><br>
        				<?php echo"<b style=color:#00007F> Salary Per Month : </b>".$row['fee']?>
        			</td>
        		</tr>

        	</table>
      
        </div>
          <div class="container-fluidn" style="max-width: 30%;min-height: 50% ;float:left;">
                <form class="form-group">
                	<table><br>
                		<button class="btn btn-primary col-sm-6"  id="contact" >Contact</button><br><br><br>
                		<button class="btn btn-success col-sm-6"  id="View" >Details</button><br><br><br>
                       <tr><td>
                       		<?php echo"<b > Posted Date : </b> ".date("y/m/d");?>
                       </td></tr>
        			
        		
                	</table>
                </form>
        </div>
 
	   
	<?php
	echo"</div>";
	
}
	}	



	else {
	$statement  = null;
	try
	{
	  $statement = $conn->prepare("select * from provider");
	  $statement->execute();
	  $provider_rows = $statement->fetchAll(); 
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
	foreach($provider_rows as $row){
       
	?>

	<div class="well" style="max-width: 100%;min-height: 100% ;float: left;">
               <h3 style="text-align: center;color:#00007F">Need A Tutor For</h3>
          <div class="container" style="max-width: 60%;min-height: 50% ;float: left;">
        	<table>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Student Gender :  </b>".$row['student_gender']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Preferred subject :  </b>".$row['subject']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Student District :  </b>".$row['district']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Tuition Area :  </b>".$row['tuitionarea']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b style=color:#00007F> Institute Name : </b>".$row['institute']?>
        			</td>
        		</tr>
                	<td><br>
        				<?php echo"<b style=color:#00007F> Days In a Week : </b>".$row['day']?>
        			</td>
        		</tr>
        	   	<td><br>
        				<?php echo"<b style=color:#00007F> Salary Per Month : </b>".$row['fee']?>
        			</td>
        		</tr>

        	</table>
      
        </div>
          <div class="container-fluidn" style="max-width:30% ;min-height: 50% ;float: left;">
                <form class="form-group">
                	<table><br>
                				
                		<button class="btn btn-primary col-sm-6"  id="contact" >Contact</button><br><br><br>
                		<button class="btn btn-success col-sm-6"  id="View" >Details</button><br><br><br>
              
        				<?php echo"<b style=margin-top:12px;> Posted Date : </b> ".date("y/m/d");?>
        		
                	</table>
                </form>
        </div>
 </div>
	<?php
}


	}
	?>

	</div>
</center>

<div class="container-fluid" style="text-align: center ;">
 <ul class="pagination pagination-lg pagination-primary" id="pagination">
  <li class="previous"><a href="#">Previous</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li class="next"><a href="#">Next</a></li>
</ul> 
</div>

<?php
include("footer.php");
?>
