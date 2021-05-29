<template>
    	<!--MAIN BODY-->
	<div class="main-body">

		<div class="container">
			<div class="row">
				<div class="col-12">

					<!--Page Heading-->
					<div class="page-heading">
						<div class="row align-items-center">
							<div class="col">
								<div class="meta">
									<h1 class="title">
										<div class="icon"><i class="icon-speedometer"></i></div>
										Dashboard
									</h1>
									<h1 class="title-xl">Dashboard</h1>
									<p class="sub-title">Sociis natoque penatibus et magnis.</p>
								</div>
							</div>
                            <div class="col float-right">
                                <InertiaLink :href="route('logout')" method="post" as="button" style="margin-left: 91%"><i class="icon-logout"></i> Log Out</InertiaLink>
                            </div>
						</div>
					</div>


					<div class="row">
						<div class="col-lg-3 col-sm-6 mb-4">
							<div class="th-box-7 bgc-1">
								<div class="media">
									<div class="media-object">
										<div class="icon"><i class="icon-people"></i></div>
									</div>
									<div class="media-body align-self-center">
										<p class="description">All Candidates</p>
										<div class="title">20</div>
									</div>
								</div>
							</div><!--/.th-box-->
						</div>
						<div class="col-lg-3 col-sm-6 mb-4">
							<div class="th-box-7 bgc-2">
								<div class="media">
									<div class="media-object">
										<div class="icon"><i class="icon-user-following"></i></div>
									</div>
									<div class="media-body align-self-center">
										<p class="description">Selected Candidates</p>
										<div class="title">10</div>
									</div>
								</div>
							</div><!--/.th-box-->
						</div>
						<div class="col-lg-3 col-sm-6 mb-4">
							<div class="th-box-7 bgc-4">
								<div class="media">
									<div class="media-object">
										<div class="icon"><i class="icon-user-unfollow"></i></div>
									</div>
									<div class="media-body align-self-center">
										<p class="description">Rejected Candidates</p>
										<div class="title">7</div>
									</div>
								</div>
							</div><!--/.th-box-->
						</div>
						<div class="col-lg-3 col-sm-6 mb-4">
							<div class="th-box-7 bgc-5">
								<div class="media">
									<div class="media-object">
										<div class="icon"><i class="icon-note"></i></div>
									</div>
									<div class="media-body align-self-center">
										<p class="description">Assessment Test</p>
										<div class="title">13</div>
									</div>
								</div>
							</div><!--/.th-box-->
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-12">
							<ul class="nav nav-tabs nav-tabs-2 nav-overflow">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tab-1a">All Candidates</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-2a">Selected Candidates</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-3a">Rejected Candidates</a>
								</li>
							</ul>

							<div class="card">
								<div class="card-body pb-0">
									<div class="form-row">
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Gender</label>
												<div class="select-picker">
													<select class="form-control">
														<option>Male</option>
														<option>Female</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Qualification</label>
												<div class="select-picker">
													<select class="form-control">
														<option>School</option>
														<option>Bachelor's Degree</option>
														<option>Master's Degree</option>
														<option>Doctoral Degree</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Full-Time Employment</label>
												<div class="select-picker">
													<select class="form-control">
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">On-TheJob Training</label>
												<div class="select-picker">
													<select class="form-control">
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Active Social Beneficiary</label>
												<div class="select-picker">
													<select class="form-control">
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Unemployed</label>
												<div class="select-picker">
													<select class="form-control">
														<option>Never worked</option>
														<option>Less Than 3 Months</option>
														<option>More than 3 months</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-content">
								<div class="tab-pane active" id="tab-1a">
									<div class="card table-card">
										<div class="card-header">
											<div class="row align-items-center">
												<div class="col">
													<div class="title"><i class="icon-people"></i>Job Seekers</div>
												</div>
												<div class="col-auto">
													<a href="" class="btn btn-default">View All</a>
												</div>
											</div>
										</div><!--.card-header-->
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th width="55px">#</th>
															<th class="text-center" width="50px"><i class="icon-user fa-lg"></i></th>
															<th width="150px">Name</th>
															<th>Gender</th>
															<th>Qualification</th>
															<th class="text-center">Full-Time Employment</th>
															<th class="text-center">On-TheJob Training</th>
															<th class="text-center">Active Social Beneficiary</th>
															<th class="text-center">Assessment Test</th>
															<th>Unemployed</th>
														</tr>
													</thead>
													<tbody>
														<tr v-for="(jobSeeker, k) in jobSeekers" :key="k">
															<td>{{jobSeeker.id}}</td>
															<td class="text-center">
																<div class="avatar avatar-sm">
																	<img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
																</div>
															</td>
															<td class="strong">{{jobSeeker.first_name}} {{jobSeeker.middle_name}} {{jobSeeker.last_name}} </td>
															<td><span class="badge badge-soft-info">{{jobSeeker.gender}}</span></td>
                                                            <td v-if="jobSeeker.qualification == 'school'">School</td>
															<td v-if="jobSeeker.qualification == 'bachelors'">Bachelor's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'masters'">Master's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'doctoral'">Doctoral Degree</td>
															<td class="text-center">{{jobSeeker.full_time_employment}}</td>
															<td class="text-center">{{jobSeeker.on_job_training}}</td>
															<td class="text-center">{{jobSeeker.social_benficiary}}</td>
															<td class="text-center strong"><a href data-toggle="modal" data-target="#mcqs-modal">{{jobSeeker.weighted_score}}%</a></td>
															<td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                                            <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                                            <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
														</tr>
													</tbody>
												</table>
											</div> <!--/.table-responsive--->
										</div><!--.card-body-->
									</div>
								</div>
								<div class="tab-pane fade" id="tab-2a"></div>
								<div class="tab-pane fade" id="tab-3a"></div>
								<div class="tab-pane fade" id="tab-4a"></div>
								<div class="tab-pane fade" id="tab-5a"></div>
								<div class="tab-pane fade" id="tab-6a"></div>
							</div>
						</div>
					</div>

				</div><!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->

	</div><!--main-body-->
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
export default {
    components:{
        AdminLayout
    },
    props: {
        jobSeekers: Object
    },
    methods: {

    }
}
</script>
