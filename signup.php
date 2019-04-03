

<?php
include"header.php";

?>
<style type="text/css">
  #signup{margin-top: 33px}

</style>
<div class="container" style="margin-top:100px;text-align: center; ">
	<section>
		<h2 style="font-weight:bold;">Sign Up</h2>
	<div class="container" id="signup">
	<a class="btn btn-default btn-lg btn-primary" href="provider_form.php" >Tution Provider</a>
	</div>

	<div class="container" id="signup">
    <a class="btn btn-default btn-lg btn-primary" href="tutorform.php">Tution Seeker</a>
	</div>
	</section>

</div>


<div class="container-fluidn" style="margin-top: 100px">
  <?php
include "footer.php";
  ?>
</div>

<script>
$("#menu").click(function(){
$("#showing").toggle(500);
});
return false;
</script>

</body>
</html>