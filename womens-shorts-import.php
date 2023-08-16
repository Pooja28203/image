<?php include "header.php"; ?>

<?php 
if(!isset($_SESSION["login"]))

	header("location:login.php"); 
?>

<main class="main">

	<section id="wrapper" class="section container-fluid wrapper">

		<div class="row no-gutters box">
			<div class="col-12 col-sm-2 columns">

				<?php include "sidebar.php"; ?>	

			</div>
			<div class="col-12 col-sm-10">

				<!-- Banner [Start] -->
				<section id="login" class="section container-fluid login">
					<div class="row no-gutters justify-content-center headline">
						<div class="col-12">
							<h3>Women's Shorts Import</h3>
						</div>
					</div>
					<div class="row no-gutters justify-content-center content">
						<div class="col-12">
							<div class="row no-gutters justify-content-center">
								<div class="col-12 col-sm-8 title">
									<h6>Upload CSV File</h6>
								</div>
								<div class="col-12 col-sm-8 elements">
									<form class="csvUpload" id="csvUpload" enctype="multipart/form-data" method="post" action="womens-shorts-upload.php">
										<div class="col-12 fields">
											<label for="file">File</label>
										    <input type="file" name="file" class="" id="file">
										</div>
										<div class="col-12 fields">
										    <input type="submit" name="submit" class="" id="submit" value="submit">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Banner [End] -->

			</div>
		</div>

	</section>

</main>

<?php include "footer.php"; ?>