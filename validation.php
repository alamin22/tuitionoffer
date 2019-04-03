<?php
ob_start();
session_start();
require 'connection.php';

if($_SERVER['REQUEST_METHOD'] =='POST')
{
  if(isset($_POST['login'])) // if user press login button
  {
    //if emal or password  or both are not set then stay at the same page
    if(empty($_POST['email']) || empty($_POST['password']))
    {
      $_SESSION['msg'] = "You must fulfill both email and password field";
      header("location: login.php");
    }
    else{
      try{
			//string password creation
			  $new_password = $_POST['password'];  
			  $salt = sha1(md5($new_password));
			  $new_password = md5($new_password.$salt);
        $statement = $conn->prepare("select tid,password from tutor where email =:email and password =:password");
            
        $statement->execute(array(':email' => $_POST['email'], ':password'=>$new_password));
        //$statement->execute(array($_POST['email'],$new_password));
        $row = $statement->fetch();
        if($row)// if account exists
        {
          $_SESSION['user_id'] = $row['tid']; // preserve user id in session
          header("location: tutorprofile.php?id=".$row['tid']);
        }else {// if given password does not match
          $_SESSION['msg'] = "Can't login. Invalid email or password..";
          header("location:login.php");
        }
      }catch(PDOException $e)
      {
        echo $e->getMessage();
      }finally{
        if ($statement != null) {
          $statement = null;
        }
      }
    }
  }
  
    else if(isset($_POST['signup'])) // when user tries to create account
  {
    try{
        
      $statement = $conn->prepare("select tid from tutor where email = :email");
      $statement->execute(array(':email' => $email = $_POST['email']));
      $row = $statement->fetch();
      if(!$row) // if no row exists then create new row (account)
      {
        //create unique id
          $uniqueId = time() . substr(md5(uniqid(mt_rand(), true)), 15);
          

		  
		 $stmt = $conn->prepare("insert into  tutor(username,password,fullname,email,phone_mobile,tutor_gender,contactaddress,district,thana_upazila,tuitionarea,subject,fee,day,educationlevel,institute,date,image)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $filename= $_FILES["file"]["name"];
           $filetmp= $_FILES["file"]["tmp_name"];
           $folder="image/". $filename;
            move_uploaded_file($filetmp,$folder);
		   //string password creation
          $password = $_POST['password'];  
          $salt = sha1(md5($password));
          $password = md5($password.$salt);
          
          $stmt->execute(array($_POST['username'],$password,$_POST['fullname'],$_POST['email'],$_POST['phone_mobile'],$_POST['tutor_gender'],$_POST['contactaddress'],$_POST['district'],$_POST['thana_upazila'],$_POST['tuitionarea'],$_POST['subject'],$_POST['fee'],$_POST['day'],$_POST['educationlevel'],$_POST['institute'],date("y/m/d"),$folder)); 
		  
		  
          $user_id = $conn->lastInsertId();//get user id
          $_SESSION['user_id'] = $user_id; // preserve user id in session
          header("location: tutorprofile.php?id=".$user_id);
      }else{//// if  row exists then do no create new row (account) just login
        $_SESSION['msg'] = "An account is already exist with this email. Just login.";
        header("location: login.php");
      }
    }catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }finally
    {
      if($stmt!=null)
      {
        $stmt =  null;
      }
    }
    
    
    
}
    
    


  else if(isset($_POST['provider'])) // when provider tries to create account
  {
    try{
 
        //create unique id
          $uniqueId = time() . substr(md5(uniqid(mt_rand(), true)), 15);
		  
		   $stmt = $conn->prepare("insert into  provider(fullname,email,phone_mobile,student_gender,tutor_gender,contactaddress,district,thana_upazila,tuitionarea,subject,day,fee,hire_date,institute,date,other)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
           
          
          $stmt->execute(array($_POST['fullname'],$_POST['email'],$_POST['phone_mobile'],$_POST['student_gender'],$_POST['tutor_gender'],$_POST['contactaddress'],$_POST['district'],$_POST['thana_upazila'],$_POST['tuitionarea'],$_POST['subject'],$_POST['day'],$_POST['fee'],$_POST['hire_date'],$_POST['institute'],date('y/m/d'),$_POST['other'])); 
		  
          $user_id = $conn->lastInsertId();//get user id
          $_SESSION['user_id'] = $user_id; // preserve user id in session
          header("location: providerprofile.php?id=".$user_id);
    }
	catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }finally
    {
      if($stmt!=null)
      {
        $stmt =  null;
      }
    }
  }
}
 ?>