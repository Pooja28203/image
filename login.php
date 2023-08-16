<?php include "header.php"; ?>

<main class="main fullheight">

	<!-- Login [Start] -->
	<section id="login" class="section container-fluid login">
		<div class="row no-gutters maxwd30 justify-content-center wrap">
			<div class="col-12 col-sm-5 title">
				<h3>Login</h3>
			</div>
		</div>
		<div class="row no-gutters maxwd30 justify-content-center wrap">
			<form class="loginForm" id="loginForm" method="post" action="loginprocess.php">
				<div class="col-12 fields">
					<label for="username">Username</label>
				    <input type="text" name="username" class="" id="username" value="admin" placeholder="admin">
				</div>
				<div class="col-12 fields">
					<label for="password">Password</label>
				    <input type="password" name="password" class="" id="password" value="admin" placeholder="admin">
				</div>
				<div class="col-12 fields">
				    <input type="submit" name="submit" class="" id="submit" value="submit">
				</div>
			</form>
		</div>
	</section>
	<!-- Login [End] -->

	<?php 
	if(isset($_POST["err"]))
		$msg="Login issue. Please contact admin.";
	?>
	<p style="color:red;">
	<?php if(isset($msg))
	{
		echo $msg;
	}
	?>
	<!-- Login [End] -->

</main>

<?php include "footer.php"; ?>