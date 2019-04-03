<style>
.custom_container{
background:#202340;
min-height:350px;
}
footer a{
	color: #a09c9c;
}

.footerContentPart {
	padding-right: 10px;
	display: inline-block;
	vertical-align: top;
	margin-top: 20px;
	margin-right:80px;
}
.footerTitle{
padding-left: 60px;color: white;


}

.footerTitle h4 {
	margin-bottom: 5px;

}

.footerContent {
	font-size: 13px;
	margin-top: 10px;
	padding-left: 60px;color:silver;	
}
.footerContent td{color: #a09c9c;}
.footerContent p{color: #a09c9c;}
</style>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b966a50afc2c34e96e860d3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	
<?php
if(isset($_POST['btn'])){
	
	$msg = "User_Email = ".$_POST[email]."     Message : ".$_POST['comment'];
	
	try{
			if(mail("ismailcse14@gmail.com","Tuitionsbd.com",$msg)){
		throw new exception("send success");
	}else{
		throw new exception("send failed");
	}
	}catch(Exception $e){
		$messag=$e->getMessage();
	}

}
	
	

?>	
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<footer>
                <div class="custom_container">
                    <div class="footerSection">
                        <div class="footerContentPart">
                            <div class="footerTitle" style="">
                                <h4>Contact Us:-</h4>
                            </div>
                            <div class="footerContent">
                                <table>
                                    <tr>
                                        <td><i class="fa fa-mobile"></i></td>
                                        <td> 01738088967/01743557172</td>
                                        
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-envelope"></i></td>
                                        <td> tuitionsbd@gmail.com</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="footerContentPart">
                            <div class="footerTitle">
                                <h4>Comment:-</h4>
                            </div>
                            <div class="footerContent">
                                <form action="" method="post">
                                    <table>
                                        <tr><td><input type="email" placeholder="Email" name="email" required=""></td></tr>
                                        <tr><td><textarea rows="4" cols="30" placeholder="Your Comment"  name="comment" required=""></textarea></td></tr>
                                        <tr><td><input class="btn btn-primary btn-sm" type="submit" value="send" name="btn"></td></tr>
										
                                    </table>   
                                </form>
								<?php
											if (isset($messag)) {
												echo $messag;
											}
										?>
                            </div>
                        </div>
                       
                        <div class="footerContentPart">
                            <div class="footerTitle">
                                <h4>Follow Us:-</h4>
                            </div>
                            <div class="footerContent">
                                <table>
                                    <tr>
                                        <td><a href="https://www.facebook.com/Tuitionsbdcom-1345768392221380/?modal=admin_todo_tour"><i class="fa fa-facebook-square"></i>  Facebook</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="https://twitter.com/mdismailrz"><i class="fa fa-twitter-square"></i>  Twitter</a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><a href="https://www.linkedin.com/in/md-ismail-930a7b167/"><i class="fa fa-linkedin"></i>  Linkedin </a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><a href="https://www.instagram.com/mdismailhossainrz/"><i class="fa fa-instagram"></i>  Instagram </a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><a href="https://www.youtube.com/channel/UC843z2KIxFbtfkvfECkmNLg/featured?disable_polymer=1"><i class="fa fa-youtube"></i>  Youtube </a></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </footer>
</body>

</html>