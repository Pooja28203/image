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
				<section id="banner" class="section container-fluid banner">
					<div class="row no-gutters justify-content-center maxwd60 wrap">
						<div class="col-12 headline">
							<h2>Welcome to Image Generator</h2>
						</div>
					</div>
					<div class="row no-gutters justify-content-center maxwd60 wrap">
						<div class="col-12 title">
							<h6>Tool Usage</h6>
							<p>This tool can create images based on the CSV file data or custom data entered in form</p>
						</div>
						<div class="col-12 list">
							<ul>
								<li>Can create <strong>Images</strong> as per <strong>Category Templates</strong></li>
								<li>Can create <strong>upto 500 images</strong> at once</li>
								<li>Can create <strong>Images</strong> of <strong>JPG, PNG and WEBP</strong> file types</li>
								<li>Created <strong>Images</strong> are with <strong>Lossless Compression</strong></li>
							</ul>
						</div>
					</div>
				</section>
				<!-- Banner [End] -->

			</div>
		</div>

	</section>

</main>

<?php include "footer.php"; ?>