<?php
//Include database configuration file
include('dbConfig.php');

if(isset($_POST["divisionid"]) && !empty($_POST["divisionid"])){
    //Get all state data
    $query = $db->query("SELECT * FROM districts WHERE division_id = ".$_POST['divisionid']."  ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select District</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">District not available</option>';
    }
}

    
    
if(isset($_POST["districtid"]) && !empty($_POST["districtid"])){
    //Get all city data
    $query = $db->query("SELECT * FROM upazilas WHERE district_id = ".$_POST['districtid']."  ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select Upazila/Thana</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Upazila/Thana not available</option>';
    }
}
?>