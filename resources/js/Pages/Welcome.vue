<template>
<layout>

    <div class="section section-banner bg-1" id="home">
		<div class="content-box">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-7 col-xl-6">
						<div class="info-block wow fadeInUp mt-5">
							<div class="figure mb-5">
                                <img src="/images/logo-white.png" class="img-fluid" alt="...">
							</div>
							<h1 class="white-text">
                                Join <span class="th-text">On The Job Training (OJT) </span> program to enhance your skills.
							</h1>
							<div class="btn-action mt-5">
								<a href="index.php#employer" class="btn btn-primary">Apply Now<span class="icon"><i class="icon-arrow-right"></i></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="/images/banners/1.png" alt="" class="img-block wow fadeInDown">
	</div>

	<!--Icons Boxes-->
	<div class="section section-auto bgc-1" id="">
		<div class="content-box p-0">
			<div class="icon-boxes wow fadeInUp">
				<ul>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-organization"></i>
							</div>
							<div class="col">Sourcing Jobs for Candidates</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-support"></i>
							</div>
							<div class="col">Dedicated Mentor to support along the journey</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-layers"></i>
							</div>
							<div class="col">5 Soft Skills Training</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-list"></i>
							</div>
							<div class="col">3 Technical Skills Training</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-notebook"></i>
							</div>
							<div class="col">Work place Assignments</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!--About Us-->
	<div class="section section-about" id="about-us">
		<div class="content-box">
			<div class="container">

				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="img-block">
							<img src="/images/banners/img1.png" alt="" class="img-fluid img-1 wow fadeInDown">
							<img src="/images/banners/img2.png" alt="" class="img-fluid img-2 wow fadeInUp">
							<div class="img-3 d-flex align-items-center wow fadeInUp">
								<div>
									<i class="icon-trophy"></i>
									<p class="mb-0">We're ready to assist you</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="info-block">
							<div class="sec-title">
								<p class="sub-title">About Us</p>
								<h1 class="title">OJT program is designed to support Job seekers</h1>
							</div>
							<p class="font-md">
								with a 360 degree solution for developing academic qualifications through a supported 16 week ‘on-the job training program’ centered around developing key skills to ensure graduates can build a strong foundation of skills required to meet the needs of employers and start their Career path.
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Services-->
	<div class="section section-services section-auto secondary-bg" id="services">
		<div class="content-box">
			<div class="container-fluid">

				<div class="services">
					<div class="sec-title text-center wow fadeInUp">
						<h1 class="title white-text">Eligibility Criteria</h1>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="icon-box">
								<i class="icon-user-female"></i>
								<div class="meta">
									<div class="heading white-text">Gender</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="icon-box">
								<i class="icon-graduation"></i>
								<div class="meta">
									<div class="heading white-text">qualifications</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="icon-box">
								<i class="icon-briefcase"></i>
								<div class="meta">
									<div class="heading white-text">Jobless</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Employer-->
	<div class="section section-auto section-js-e primary-bg" id="employer">
		<div class="content-box">
			<div class="container">
				<div class="row justify-content-center mt-5">
					<div class="col">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="card" data-eqh>
									<div class="icon">
										<img src="/images/icons/job-seeker.png" alt="" class="img-fluid">
									</div>
									<div class="text-center">
                                        <InertiaLink :href="route('jobSeeker')" as="buton" class="btn btn-primary">Job Seeker</InertiaLink>
										<!-- <button type="button" class="btn btn-primary">Job Seeker</button> -->
									</div>
									<p class="mb-0">
                                        OJT program will help you to start your professional career development journey. Click ‘JOB SEEKER’ to apply.
									</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card" data-eqh>
									<div class="icon">
										<img src="/images/icons/boss.png" alt="" class="img-fluid">
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#employer-form-modal">Employer</button>
									</div>
									<p class="mb-0">
                                        Contact us for partnership opportunities, register your vacancies and we help you fill the roles through 1 of our Programs aligned to Vision 2023.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</layout>
</template>

<script>
import Layout from '../Layouts/Layout'

    export default {
        components: {
            Layout
        }
    }
</script>
