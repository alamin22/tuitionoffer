<?PHP

   if(isset($_POST['pass1'])){
    
    if($_POST['pass1'] != $_POST['pass2']){

     echo '<p style="color:red">passwords do not matched</p>'; 
    }
    
    }


 ?>