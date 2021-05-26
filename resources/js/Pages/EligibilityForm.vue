<template>
    <layout>
        <!--Question & Answers-->
	<div class="section section-qa section-custom section-custom-right secondary-bg">
		<div class="feature-background">
			<div class="fb-fill d-flex align-items-center bg-2" style="background-image: url('/images/banners/bg2.png');">
				<div class="feature-content w-100 px-5">
					<img src="/images/banners/2.png" alt="" class="img-fluid hiring-img wow fadeInDown">
					<div class="sec-title wow fadeInLeft">
						<p class="sub-title white-text">JOIN THE TEAM</p>
						<h1 class="title white-text">We Are Hiring</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="content-box">
			<div class="feature-foreground wow fadeInRight">
				<ul class="process-steps-1">
					<li class="active">
						<a href=""><span>1</span></a>
					</li>
					<li>
						<a href=""><span>2</span></a>
					</li>
					<li>
						<a href=""><span>3</span></a>
					</li>
					<li>
						<a href=""><span>4</span></a>
					</li>
					<li>
						<a href=""><span>5</span></a>
					</li>
					<li>
						<a href=""><span>6</span></a>
					</li>
					<li>
						<a href=""><span>7</span></a>
					</li>
					<li>
						<a href=""><span>8</span></a>
					</li>
				</ul>
				<div>
					<div class="row justify-content-center">
						<div class="col">
							<div class="status-bar">
								<div class="custom-label">
									<div class="row">
										<div class="col title">1 out of 10</div>
										<div class="col-auto sub-title">25%</div>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="feature-content d-flex align-items-center">
						<div class="qa">
							<div class="card" style="display: none">
								 <div>
									<div class="icon">
										<i class="icon-check alert-icon-success"></i>
									</div>
									<h6>Thank you for registering your interest.</h6>
									<p class="font-md">
										You have successfully completed the registration and passed the eligibility for the OJT program.
									</p>
									<p class="font-md">
										A member of the team will contact you with regards to the next steps of welcoming you on the program.
									</p>
								</div>
							</div>
							<div class="card" style="display: none">
								<div>
									<div class="icon">
										<i class="icon-close alert-icon-rejected"></i>
									</div>
									<h6>Thank you for registering your interest.</h6>
									<p class="font-md">
										You have successfully completed the registration, you are not eligible for the OJT program.
									</p>
									<p class="font-md">
										A member of the team will contact you with regards to other programs available.
									</p>
								</div>
							</div>
							<div class="card form-dark">
								<div>
									<h6 class="mb-5">Personal Information</h6>
									<div class="form-row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="custom-label">First Name</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="custom-label">Middle Name</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="custom-label">Surname</label>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="custom-label">Mobile No.</label>
												<input type="number" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="custom-label">Email Address</label>
												<input type="email" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="custom-label">City</label>
												<div class="select-picker">
													<select class="form-control">
														<option value="">City A</option>
														<option value="">City B</option>
														<option value="">City C</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
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
										</div>
									</div>
									<div class="form-group">
										<label class="custom-label">NIN</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="custom-label">Date of Birth</label>
										<input type="date" class="form-control">
									</div>
									<div class="text-center mt-5">
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
							<div class="card" style="display: none">
								<div>
									<h6>What's your Gender?</h6>

									<div class="check_radio mt-4 mb-5">
										<div class="radio text-left mb-3">
											<input type="radio" id="c1" name="check1">
											<label for="c1">Male</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="c2" name="check1">
											<label for="c2">Female</label>
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div><!--/.card-->
							<div class="card" style="display: none">
								<div>
									<h6>What is the highest level of qualification you hold?</h6>
									<div class="check_radio mt-4 mb-5">
										<div class="radio text-left mb-3">
											<input type="radio" id="oa1" name="check2">
											<label for="oa1">School</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="oa2" name="check2">
											<label for="oa2">Bachelor's Degree</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="oa3" name="check2">
											<label for="oa3">Master's Degree</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="oa4" name="check2">
											<label for="oa4">Doctoral Degree</label>
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-default">Back</button>
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div><!--/.card-->
							<div class="card" style="display: none">
								<div>
									<h6>You are available for full-time employment? </h6>
									<div class="check_radio mt-4 mb-5">
										<div class="radio text-left mb-3">
											<input type="radio" id="c5" name="check3">
											<label for="c5">Yes</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="c6" name="check3">
											<label for="c6">No</label>
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-default">Back</button>
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div><!--/.card-->
							<div class="card" style="display: none">
								<div>
									<h6>This programme has an element of On-TheJob training, you are willing and able to commit.</h6>
									<div class="check_radio mt-4 mb-5">
										<div class="radio text-left mb-3">
											<input type="radio" id="c7" name="check4">
											<label for="c7">Yes</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="c8" name="check4">
											<label for="c8">No</label>
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-default">Back</button>
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div><!--/.card-->
							<div class="card" style="display: none">
								<div>
									<h6>Are you an active social beneficiary? </h6>
									<div class="check_radio mt-4 mb-5">
										<div class="radio text-left mb-3">
											<input type="radio" id="c9" name="check5">
											<label for="c9">Yes</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="c10" name="check5">
											<label for="c10">No</label>
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-default">Back</button>
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div><!--/.card-->
							<div class="card" style="display: none">
								<div>
									<h6>How long have you been unemployed?</h6>
									<div class="check_radio mt-4 mb-5">
										<div class="radio text-left mb-3">
											<input type="radio" id="c91" name="check6">
											<label for="c91">Never worked</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="c101" name="check6">
											<label for="c101">Less Than 3 Months</label>
										</div>
										<div class="radio text-left mb-3">
											<input type="radio" id="c102" name="check6">
											<label for="c102">More than 3 months</label>
										</div>
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-default">Back</button>
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div><!--/.card-->
						</div> <!--/.owl-carousel-->
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
