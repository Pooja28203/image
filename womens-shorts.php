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

				<!-- Category [Start] -->
				<section id="category" class="section container-fluid category">
					<div class="row no-gutters justify-content-center headline">
						<div class="col-12">
							<h3>Women's Shorts</h3>
						</div>
					</div>
					<div class="row no-gutters justify-content-center content">
						<div class="col-12 col-sm-6 wrap">
							<div class="row no-gutters justify-content-center">
								<div class="col-12 title">
									<h6>Select data upload method</h6>
								</div>
								<div class="col-12 elements">
									<a href="womens-shorts-import.php">CSV Import</a>
								</div>
								<!-- <div class="col-12 col-sm-6 elements">
									<a href="javascript:void(0);">Custom</a>
								</div> -->
							</div>
						</div>
						<div class="col-12 col-sm-6 wrap">
							<div class="row no-gutters justify-content-center">
								<div class="col-12 title">
									<h6>Check Uploaded Data</h6>
								</div>
								<div class="col-12 elements">
									<a href="womens-shorts-fetch.php">Uploaded Data</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Category [End] -->

			</div>
		</div>

	</section>

</main>

<?php include "footer.php"; ?>