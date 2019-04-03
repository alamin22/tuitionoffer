
<?php
include"connection.php";
include"header.php";

?>
<style type="text/css">
body{background:url(image/p6.jpg) repeat fixed;}
	
	#tutor_post{
        margin-top: 70px;
       min-height: 50px;
       text-align: center;
       color: #001834;
       font-weight: bold;
    
	}
	#pagination li a{padding:24px 25px }
	#pagination li a:hover{background:blue;color:white;}

</style>
<div class="container-fluidn" id="tutor_post">
	<h2>Welcome To Tutor Post Area</h2>
</div>

	<div class="container-fluidn" >

<?php
if(isset($_POST['SearchButton'])){
	$search=$_POST['SearchInput'];
$statement=null;
try{
       $statement=$conn->prepare("select * from tutor where fullname like ? or tutor_gender=? or district=? or subject=? or institute=? ");
     $statement->execute(array($search,$search,$search,$search,$search));
     $table_row=$statement->fetchAll();



}catch(PDOException $e){
 echo $e->getMessage();
}
finally
{
	if($statement!=null){
		$statement=null;
	}
}
foreach($table_row as $row){
	?>
	<div class="well" style="max-width: 100%;min-height: 100% ;float: left;">

	    <div class="container"  style="max-width: 22%;min-height: 50% ;float: left;margin-right: 12px">
          <form class="form-group">
        	<table>
        		<tr>
        			<td>
        				<?php echo"<b>".$row['fullname']."</b>"?>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<?php echo"<b class=form-control style=max-width:110px;min-height:130px>Photo</b>"?>
        			</td>
        		</tr>
        	</table>
          </form>
        </div>
        <div class="container" style="max-width: 42%;min-height: 50% ;float: left;">
        
        	<table>
        		<tr>
        			<td>
        				<?php echo"<b> Full Name :  </b>".$row['fullname']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Tutor Gender :  </b>".$row['tutor_gender']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Tutor District :  </b>".$row['district']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Subject Name :  </b>".$row['subject']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Institute Name : </b>".$row['institute']?>
        			</td>
        		</tr>
        	</table>
      
        </div>
          <div class="container" style="max-width: 30%;min-height: 50% ;float: left;">
                <form class="form-group">
                	<table><br>
                		<label for="contact"></label>
                		<button class="btn btn-primary col-sm-6"  id="contact" >Contact</button><br><br><br>

                		<label for="View"></label>
                		 <a class="btn btn-success col-sm-6" href="tutor_details.php?id=<?php echo $row['tid'];?>" id="View" >Details</a><br><br>
              
        				<?php echo"<b style=margin-top:12px;> Posted Date : </b> ".date("y/m/d");?>
        		
                	</table>
                </form>
        </div>

	

  
<?php

echo"</div>";
}


}

/*end of search session */

else {
	$statement=null;
	try{
	$statement=$conn->prepare("select * from tutor");
	$statement->execute();
	 $table_row=$statement->fetchAll();
}catch(PDOException $e){
  echo $e->geuMessage();
}

finally{
	if($statement!=null){
		$statement=null;
	}
}
foreach ( $table_row as $row) {
	?>
		<div class="well" style="max-width: 100%;min-height: 100% ;float: left;">

	    <div class="container"  style="max-width: 22%;min-height: 50% ;float: left;margin-right: 12px">
          <form class="form-group">
        	<table>
        		<tr>
        			<td>
        				<?php echo"<b>".$row['fullname']."</b>"?>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<?php echo"<b class=form-control style=max-width:110px;min-height:130px>Photo</b>"?>
        			</td>
        		</tr>
        	</table>
          </form>
        </div>
        <div class="container" style="max-width: 42%;min-height: 50% ;float: left;">
        
        	<table>
        		<tr>
        			<td>
        				<?php echo"<b> Full Name :  </b>".$row['fullname']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Tutor Gender :  </b>".$row['tutor_gender']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Tutor District :  </b>".$row['district']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Subject Name :  </b>".$row['subject']?>
        			</td>
        		</tr>
        		<tr>
        			<td><br>
        				<?php echo"<b> Institute Name : </b>".$row['institute']?>
        			</td>
        		</tr>
        	</table>
      
        </div>
          <div class="container" style="max-width: 30%;min-height: 50% ;float: left;">
                <form class="form-group">
                	<table><br>
                		<label for="contact"></label>
                		<button class="btn btn-primary col-sm-6"  id="contact" >Contact</button><br><br><br>

                		<label for="View"></label>
                		 <a class="btn btn-success col-sm-6" href="tutor_details.php?id=<?php echo $row['tid'];?>" id="View" >Details</a><br><br>
              
        				<?php echo"<b style=margin-top:12px;> Posted Date : </b> ".date("y/m/d");?>
        		
                	</table>
                </form>
        </div>

	

  
<?php

echo"</div>";
}
echo"</div>";
}
?> 
</div >

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

<script>
$("#menu").click(function(){
$("#showing").toggle(500);
});
return falsa;
</script>

<div class="container-fluidn" >
  <?php
include "footer.php";
  ?>
</div>



</body>
</html>