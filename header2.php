<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
     <style type="text/css">
     
     #SearchInput{min-width: 230px;max-height: 28px}
     #SearchButton{min-width: 40px;max-height: 28px}
    
     #menu{max-width:100%;box-sizing:border-box;cursor:pointer;text-align:center;padding:19px 33px;font-size:21px;color:white;display:none;}

     @media screen and (max-width:770px){
nav ul{max-height:0px;display:none;}
nav ul li a{box-sizing:border-box;width:100%;}
#menu{display:block;}
#showing{max-height:20em;}
}

   </style>

</head>

<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
     <div class="container-fluidn" id="menu">Menu <i class="fa fa-angle-down"></i></div>
    <ul class="nav navbar-nav" id="showing">
      <li><a href="index.php">Home</a></li>
      <li ><a href="tutor_post.php">Tution Seeker</a></li>
      <li><a href="providerdetails.php">Find Tutor</a></li>
      <li><a href="AboutUs.php">About Us</a></li>
     <li > <a  href="login.php"><span class="glyphicon glyphicon-user"></span><i> SignUp Or Login</i> </a></li>

 
  <!--  <ul class="nav navbar-nav navbar-middle">
       
 <form class="navbar-form navbar-left" method="post">

    <div class="input-group">
    <input id="SearchInput" type="text" name="SearchInput" class="form-control" placeholder="Search">
    <div class="input-group-btn">

      <button id="SearchButton" name="SearchButton" class="btn btn-success" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  
</form> !-->

    </ul>
  </div>
</nav> 

<script>
$("#menu").click(function(){
$("#showing").toggle(500);
});
</script>

</body>
</html>