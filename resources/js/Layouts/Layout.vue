<template>
<div class="wrap">
        <!--
<button class="btn btn-primary" data-toggle="modal" data-target="#delete-modal">
	<i class="icon-layers fa-lg fa-r" data-toggle="tooltip" data-placement="top" title="Advance Filter"></i>Filter
</button>
-->
<!--Sample - sample.php-->
<div id="sample-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times"></i>
				</button>
				<h2 class="modal-title mb-5"><i class="icon-calendar"></i>Modal Title</h2>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Sample - sample.php-->
<div id="employer-form-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times"></i>
				</button>
				<h2 class="modal-title">Employer</h2>
			</div>
			<div class="modal-body">
				<div>
					<div class="form-group">
						<label class="custom-label">Your Name</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label class="custom-label">Region</label>
						<div class="select-picker">
							<select class="form-control">
								<option value="">Pakistan</option>
								<option value="">India</option>
								<option value="">Japan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="custom-label">Company Name</label>
						<input type="text" class="form-control">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="custom-label">Email</label>
								<input type="email" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="custom-label">Mobile #</label>
								<input type="number" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary btn-sm">Apply</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<header id="header" class="header">
	<div class="container">
		<div class="row">
			<div class="col">
				<nav class="navbar navbar-expand-lg">
					<div class="p-rel">
						<a href="index.php" class="navbar-brand">
							<img src="/images/logo-white.png" class="img-fluid" alt="">
						</a>
						<ul class="lang-rtl">
							<li class="lang_switcher">

									<a class="icon-lang" href="?lang=arb">
										<span>AR</span>Lang
									</a>

									<!-- <a class="icon-lang" href="?lang=eng">
										<span>EN</span>Lang
									</a> -->

							</li>
						</ul>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item active">
                                <InertiaLink :href="route('landing')" class="nav-link">Home</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php#about-us">About</a>
							</li>
							<li class="nav-item mr-0">
                                <InertiaLink :href="route('jobSeeker')" class="nav-link nav-btn btn-secondary active">Job Seeker</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-btn btn-primary" href="index.php#employer">Employer</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<main>

<slot></slot>


				<footer class="section section-auto section-footer" id="footer">
					<div class="content-box p-0">
						<div class="footer-bottom">
							<div class="row align-items-center">
								<div class="col-sm">
									© Copyright 2020 <a href="index.php" class="th-text">Maximus</a> Company.
								</div>
								<div class="col-sm-auto">
									<ul class="social-icons">
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-youtube"></i></a></li>
										<li><a href="#"><i class="fab fa-instagram"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</footer>

			</main>

			<div id="scroll-to-top" title="Go to top" onclick="topFunction()">
				<img src="/images/icons/arrow.png">
			</div>

</div>
</template>

