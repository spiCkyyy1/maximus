<template>
<admin-layout>
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
										<div class="title">{{jobSeekersCount}}</div>
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
										<div class="title">{{selectedJobSeekers}}</div>
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
										<div class="title">{{rejectedJobSeekers}}</div>
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
										<div class="title">{{jobSeekersWithAssessmentCount}}</div>
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
													<select class="form-control" v-model="filter.gender">
														<option value="" disabled>---</option>
                                                        <option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Qualification</label>
												<div class="select-picker">
													<select class="form-control" v-model="filter.qualification">
														<option value="" disabled>---</option>
                                                        <option value="school">School</option>
														<option value="bachelors">Bachelor's Degree</option>
														<option value="masters">Master's Degree</option>
														<option value="doctoral">Doctoral Degree</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Full-Time Employment</label>
												<div class="select-picker">
													<select class="form-control" v-model="filter.fullTimeEmployment">
                                                        <option value="" disabled>---</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">On-TheJob Training</label>
												<div class="select-picker">
													<select class="form-control" v-model="filter.JobTraining">
                                                        <option value="" disabled>---</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Active Social Beneficiary</label>
												<div class="select-picker">
													<select class="form-control" v-model="filter.socialBeneficiary">
                                                        <option value="" disabled>---</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Unemployed</label>
												<div class="select-picker">
													<select class="form-control" v-model="filter.unEmployed">
                                                        <option value="" disabled>---</option>
														<option value="never_worked">Never worked</option>
														<option value="less_than_3_months">Less Than 3 Months</option>
														<option value="more_than_3_months">More than 3 months</option>
													</select>
												</div>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-4">
											<div class="form-group">
												<label class="custom-label">Reviewed Candidates</label>
												<div class="select-picker">
													<select class="form-control" v-model="filter.review">
                                                        <option value="" disabled>---</option>
														<option value="1">Yes</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="card-footer">
                                        <div class="row align-items-center">

                                            <div class="col-auto ml-auto">
                                                    <button class="btn btn-sm btn-default" title="Reset Filter" @click="resetFilter"><i class="icon-refresh fa-lg fa-r"></i>Reset</button>
                                                    <button class="btn btn-sm btn-primary ml-1" title="Apply Filter" @click="filterCandidates"><i class="icon-layers fa-lg fa-r"></i> Apply filter</button>
                                            </div>
                                        </div>
                                </div>
							</div>

							<div class="tab-content">
								<div class="tab-pane active" id="tab-1a">
									<div class="card table-card" v-if="jobSeekers.length > 0">
										<div class="card-header">
											<div class="row align-items-center">
												<div class="col">
													<div class="title"><i class="icon-people"></i>Job Seekers</div>
												</div>
												<div class="col-auto">
													<inertiaLink :href="route('allCandidates')" class="btn btn-default">View All</inertiaLink>
                                                    <a href="javascript:;" class="btn btn-primary ml-1" @click="excelDownload"><i class="icon-doc fa-lg fa-r"></i>Export</a>
												</div>
											</div>
										</div>
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
                                                            <th>Unemployed</th>
															<th class="text-center">Readiness Assessment Test</th>
                                                            <th class="text-center">Evaluation Assessment Test</th>
                                                            <th class="text-center">Best Competency</th>
                                                            <th class="text-center">Worst Competency</th>
                                                            <th>Actions</th>
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
															<td class="strong"><a href="javascript:;" @click="modalOpen(jobSeeker, $event)">{{jobSeeker.first_name}} {{jobSeeker.middle_name}} {{jobSeeker.last_name}}</a> </td>
															<td><span class="badge badge-soft-info">{{jobSeeker.gender}}</span></td>
                                                            <td v-if="jobSeeker.qualification == 'school'">School</td>
															<td v-if="jobSeeker.qualification == 'bachelors'">Bachelor's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'masters'">Master's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'doctoral'">Doctoral Degree</td>
                                                            <td v-if="jobSeeker.qualification == null">N/A</td>
															<td class="text-center">{{jobSeeker.full_time_employment}}</td>
															<td class="text-center">{{jobSeeker.on_job_training}}</td>
															<td class="text-center">{{jobSeeker.social_benficiary}}</td>
                                                            <td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                                            <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                                            <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
                                                            <td v-if="jobSeeker.unemployed == null">N/A</td>
															<td class="text-center strong" v-if="jobSeeker.readiness_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Readiness Assessment')">{{jobSeeker.readiness_weighted_score}}%</a></td>
                                                            <td class="text-center" v-if="jobSeeker.readiness_weighted_score == 'N/A'">{{jobSeeker.readiness_weighted_score}}</td>
                                                            <td class="text-center strong" v-if="jobSeeker.evaluation_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Evaluation Assessment')">{{jobSeeker.evaluation_weighted_score}}%</a></td>
                                                            <td class="text-center" v-if="jobSeeker.evaluation_weighted_score == 'N/A'">{{jobSeeker.evaluation_weighted_score}}</td>
                                                            <td v-if="jobSeeker.best_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.best_competency}}</span></td>
                                                            <td v-else><span>{{jobSeeker.best_competency}}</span></td>
                                                            <td v-if="jobSeeker.worst_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.worst_competency}}</span></td>
                                                            <td v-else><span>{{jobSeeker.worst_competency}}</span></td>
                                                            <td>
                                                                <span v-if="jobSeeker.reviewed == 0"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 1})"><i class="fas fa-eye" title="Reviewed"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.reviewed == 1"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 0})"><i class="fas fa-eye-slash" title="Unreviewed"></i></inertiaLink></span>
                                                            </td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
                                        <div class="card-footer">
                                            <div class="card-pagination">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="card-pagination-count">
                                                            Showing 1 to 10 of 57 entries
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <ul class="pagination justify-content-end">
                                                            <li class="page-item disabled">
                                                                <a href class="page-link" tabindex="-1">First</a>
                                                            </li>
                                                            <li><a href class="page-link"><i class="icon-arrow-left small"></i></a></li>
                                                            <li class="page-item"><a href class="page-link">1</a></li>
                                                            <li class="page-item active">
                                                                <a href class="page-link">2 <span class="sr-only">(current)</span></a>
                                                            </li>
                                                            <li class="page-item"><a href class="page-link">3</a></li>
                                                            <li><a href class="page-link"><i class="icon-arrow-right small"></i></a></li>
                                                            <li class="page-item">
                                                                <a href class="page-link">Last</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
                                    <div v-else><not-found></not-found></div>
								</div>
								<div class="tab-pane fade" id="tab-2a">
                                    <div class="card table-card" v-if="selectedCandidates.length > 0">
										<div class="card-header">
											<div class="row align-items-center">
												<div class="col">
													<div class="title"><i class="icon-people"></i>Job Seekers</div>
												</div>
												<div class="col-auto">
													<inertiaLink :href="route('allCandidates')" class="btn btn-default">View All</inertiaLink>
                                                    <a href="javascript:;" class="btn btn-default" @click="excelDownload"><i class="fas fa-file"></i> Export</a>
												</div>
											</div>
										</div>
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
                                                            <th>Unemployed</th>
															<th class="text-center">Readiness Assessment Test</th>
                                                            <th class="text-center">Evaluation Assessment Test</th>
                                                            <th class="text-center">Best Competency</th>
                                                            <th class="text-center">Worst Competency</th>
                                                            <th>Actions</th>
														</tr>
													</thead>
													<tbody>
														<tr v-for="(jobSeeker, k) in selectedCandidates" :key="k">
															<td>{{jobSeeker.id}}</td>
															<td class="text-center">
																<div class="avatar avatar-sm">
																	<img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
																</div>
															</td>
															<td class="strong"><a href="javascript:;" @click="modalOpen(jobSeeker, $event)">{{jobSeeker.first_name}} {{jobSeeker.middle_name}} {{jobSeeker.last_name}}</a> </td>
															<td><span class="badge badge-soft-info">{{jobSeeker.gender}}</span></td>
                                                            <td v-if="jobSeeker.qualification == 'school'">School</td>
															<td v-if="jobSeeker.qualification == 'bachelors'">Bachelor's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'masters'">Master's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'doctoral'">Doctoral Degree</td>
                                                            <td v-if="jobSeeker.qualification == null">N/A</td>
															<td class="text-center">{{jobSeeker.full_time_employment}}</td>
															<td class="text-center">{{jobSeeker.on_job_training}}</td>
															<td class="text-center">{{jobSeeker.social_benficiary}}</td>
                                                            <td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                                            <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                                            <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
                                                            <td v-if="jobSeeker.unemployed == null">N/A</td>
															<td  v-if="jobSeeker.readiness_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Readiness Assessment')">{{jobSeeker.readiness_weighted_score}}%</a></td>
                                                            <td class="text-center"   v-if="jobSeeker.readiness_weighted_score == 'N/A'">{{jobSeeker.readiness_weighted_score}}</td>
                                                            <td class="text-center strong" v-if="jobSeeker.evaluation_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Evaluation Assessment')">{{jobSeeker.evaluation_weighted_score}}%</a></td>
                                                            <td class="text-center"  v-if="jobSeeker.evaluation_weighted_score == 'N/A'">{{jobSeeker.evaluation_weighted_score}}</td>
                                                            <td v-if="jobSeeker.best_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.best_competency}}</span></td>
                                                            <td  v-else><span>{{jobSeeker.best_competency}}</span></td>
                                                            <td v-if="jobSeeker.worst_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.worst_competency}}</span></td>
                                                            <td v-else><span>{{jobSeeker.worst_competency}}</span></td>
                                                            <td>
                                                                <span v-if="jobSeeker.reviewed == 0"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 1})"><i class="fas fa-eye" title="Reviewed"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.reviewed == 1"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 0})"><i class="fas fa-eye-slash" title="Unreviewed"></i></inertiaLink></span>
                                                            </td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
                                        <div class="card-footer">
                                            <div class="card-pagination">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="card-pagination-count">
                                                            Showing 1 to 10 of 57 entries
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <ul class="pagination justify-content-end">
                                                            <li class="page-item disabled">
                                                                <a href class="page-link" tabindex="-1">First</a>
                                                            </li>
                                                            <li><a href class="page-link"><i class="icon-arrow-left small"></i></a></li>
                                                            <li class="page-item"><a href class="page-link">1</a></li>
                                                            <li class="page-item active">
                                                                <a href class="page-link">2 <span class="sr-only">(current)</span></a>
                                                            </li>
                                                            <li class="page-item"><a href class="page-link">3</a></li>
                                                            <li><a href class="page-link"><i class="icon-arrow-right small"></i></a></li>
                                                            <li class="page-item">
                                                                <a href class="page-link">Last</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
                                    <div v-else><not-found></not-found></div>
                                </div>
								<div class="tab-pane fade" id="tab-3a">
                                    <div class="card table-card" v-if="rejectedCandidates.length > 0">
										<div class="card-header">
											<div class="row align-items-center">
												<div class="col">
													<div class="title"><i class="icon-people"></i>Job Seekers</div>
												</div>
												<div class="col-auto">
													<inertiaLink :href="route('allCandidates')" class="btn btn-default">View All</inertiaLink>
                                                    <a href="javascript:;" class="btn btn-default" @click="excelDownload"><i class="fas fa-file"></i> Export</a>
												</div>
											</div>
										</div>
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
                                                            <th>Unemployed</th>
															<th class="text-center">Readiness Assessment Test</th>
                                                            <th class="text-center">Evaluation Assessment Test</th>
                                                            <th>Actions</th>
														</tr>
													</thead>
													<tbody>
														<tr v-for="(jobSeeker, k) in rejectedCandidates" :key="k">
															<td>{{jobSeeker.id}}</td>
															<td class="text-center">
																<div class="avatar avatar-sm">
																	<img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
																</div>
															</td>
															<td class="strong"><a href="javascript:;" @click="modalOpen(jobSeeker, $event)">{{jobSeeker.first_name}} {{jobSeeker.middle_name}} {{jobSeeker.last_name}}</a> </td>
															<td><span class="badge badge-soft-info">{{jobSeeker.gender}}</span></td>
                                                            <td v-if="jobSeeker.qualification == 'school'">School</td>
															<td v-if="jobSeeker.qualification == 'bachelors'">Bachelor's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'masters'">Master's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'doctoral'">Doctoral Degree</td>
                                                            <td v-if="jobSeeker.qualification == null">N/A</td>
															<td class="text-center">{{jobSeeker.full_time_employment}}</td>
															<td class="text-center">{{jobSeeker.on_job_training}}</td>
															<td class="text-center">{{jobSeeker.social_benficiary}}</td>
                                                            <td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                                            <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                                            <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
                                                            <td v-if="jobSeeker.unemployed == null">N/A</td>
															<td class="text-center strong" v-if="jobSeeker.readiness_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Readiness Assessment')">{{jobSeeker.readiness_weighted_score}}%</a></td>
                                                            <td class="text-center" v-if="jobSeeker.readiness_weighted_score == 'N/A'">{{jobSeeker.readiness_weighted_score}}</td>
                                                            <td class="text-center strong" v-if="jobSeeker.evaluation_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Evaluation Assessment')">{{jobSeeker.evaluation_weighted_score}}%</a></td>
                                                            <td class="text-center" v-if="jobSeeker.evaluation_weighted_score == 'N/A'">{{jobSeeker.evaluation_weighted_score}}</td>
                                                            <td v-if="jobSeeker.best_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.best_competency}}</span></td>
                                                            <td v-else><span>{{jobSeeker.best_competency}}</span></td>
                                                            <td v-if="jobSeeker.worst_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.worst_competency}}</span></td>
                                                            <td v-else><span >{{jobSeeker.worst_competency}}</span></td>
                                                            <td>
                                                                <span v-if="jobSeeker.reviewed == 0"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 1})"><i class="fas fa-eye" title="Reviewed"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.reviewed == 1"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 0})"><i class="fas fa-eye-slash" title="Unreviewed"></i></inertiaLink></span>
                                                            </td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
                                        <div class="card-footer">
                                            <div class="card-pagination">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="card-pagination-count">
                                                            Showing 1 to 10 of 57 entries
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <ul class="pagination justify-content-end">
                                                            <li class="page-item disabled">
                                                                <a href class="page-link" tabindex="-1">First</a>
                                                            </li>
                                                            <li><a href class="page-link"><i class="icon-arrow-left small"></i></a></li>
                                                            <li class="page-item"><a href class="page-link">1</a></li>
                                                            <li class="page-item active">
                                                                <a href class="page-link">2 <span class="sr-only">(current)</span></a>
                                                            </li>
                                                            <li class="page-item"><a href class="page-link">3</a></li>
                                                            <li><a href class="page-link"><i class="icon-arrow-right small"></i></a></li>
                                                            <li class="page-item">
                                                                <a href class="page-link">Last</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
                                    <div v-else><not-found></not-found></div>
                                </div>
							</div>
						</div>
					</div>
                        <detail-modal :show="showModal" v-if="showModal"
                                :jobSeeker="jobSeeker" v-on:closeModal="closeModal"></detail-modal>

                        <assessment-modal :show="showAssessmestModal" v-if="showAssessmestModal"
                        :assessment="assessment" v-on:closeAssessmentModal="closeAssessmentModal" :title="modalTitle"></assessment-modal>
				</div>
			</div>
		</div>

	</div>
</admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
import DetailModal from '../Admin/DetailModal'
import AssessmentModal from '../Admin/AssessmentModal'
import NotFound from '../Admin/NotFound'
export default {
    components:{
        AdminLayout,
        DetailModal,
        AssessmentModal,
        NotFound
    },
    mounted(){
        this.filterCandidates();
    },
    data(){
        return{

            jobSeekers: {},
            selectedCandidates: {},
            rejectedCandidates: {},
            jobSeekersCount: 0,
            jobSeekersWithAssessmentCount: 0,
            selectedJobSeekers: 0,
            rejectedJobSeekers: 0,
            filter: {
                gender: '',
                qualification: '',
                fullTimeEmployment: '',
                JobTraining: '',
                socialBeneficiary: '',
                unEmployed: '',
                review: '',
                limit: 10
            },
            showModal: false,
            showAssessmestModal: false,
            jobSeeker: {},
            assessment: {},
            modalTitle: ''
        }
    },
    methods: {
        excelDownload: function(){
            axios.get('/admin/download/excel', {responseType:'blob'}).
            then(result => {
                const url = window.URL.createObjectURL(new Blob([result.data], {type:'application/vnd.ms-excel'}));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'job-seekers.xlsx');
                    document.body.appendChild(link);
                    link.click();
            });
        },
        filterCandidates: function(){
            $("#loader").css("display", "block");
            axios.post('/filter-candidates', this.filter)
            .then(response => {
                if(response.data.success){
                    $("#loader").css("display", "none");
                    this.jobSeekers = response.data.jobSeekers;
                    this.jobSeekersCount = response.data.jobSeekersCount;
                    this.jobSeekersWithAssessmentCount = response.data.jobSeekersWithAssessmentCount;
                    this.selectedJobSeekers = response.data.selectedJobSeekers;
                    this.rejectedJobSeekers = response.data.rejectedJobSeekers;
                    this.selectedCandidates = response.data.selectedCandidates;
                    this.rejectedCandidates = response.data.rejectedCandidates;
                }
            }).catch(error => {
                console.log(error);
            });
        },
        resetFilter: function(){
            this.filter =  {
                gender: '',
                qualification: '',
                fullTimeEmployment: '',
                JobTraining: '',
                socialBeneficiary: '',
                unEmployed: ''
            };
            this.filterCandidates();
        },
        modalOpen: function(jobSeeker, event) {
            this.jobSeeker = jobSeeker;
            this.showModal = true;
      },
      closeModal: function(show){
          this.jobSeeker = {};
          this.showModal = false;
          $("#mcqs-modal").modal('hide');
      },
      openAssessmentModal: function(assessment, title){
          this.assessment = assessment;
          this.showAssessmestModal = true;
          this.modalTitle = title;
          $("#assessment-modal").modal('show');
      },
      closeAssessmentModal: function(){
          this.assessment = {};
          this.showAssessmestModal = false;
          $("#assessment-modal").modal('hide');
      }
    }
}
</script>
