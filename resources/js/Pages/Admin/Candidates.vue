<template>
    <admin-layout>
        <div>
            <div class="card-body" v-if="jobSeekers.length > 0">
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
															<th class="text-center">Readiness Assessment Test</th>
                                                            <th class="text-center">Evaluation Assessment Test</th>
															<th>Unemployed</th>
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
															<td class="strong">{{jobSeeker.first_name}} {{jobSeeker.middle_name}} {{jobSeeker.last_name}} </td>
															<td><span class="badge badge-soft-info">{{jobSeeker.gender}}</span></td>
                                                            <td v-if="jobSeeker.qualification == 'school'">School</td>
															<td v-if="jobSeeker.qualification == 'bachelors'">Bachelor's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'masters'">Master's Degree</td>
                                                            <td v-if="jobSeeker.qualification == 'doctoral'">Doctoral Degree</td>
															<td class="text-center">{{jobSeeker.full_time_employment}}</td>
															<td class="text-center">{{jobSeeker.on_job_training}}</td>
															<td class="text-center">{{jobSeeker.social_benficiary}}</td>
															<td class="text-center strong"><a href="javascript:;" data-toggle="modal" data-target="#mcqs-modal">{{jobSeeker.readiness_weighted_score}}%</a></td>
                                                            <td class="text-center strong"><a href="javascript:;" data-toggle="modal" data-target="#mcqs-modal">{{jobSeeker.evaluation_weighted_score}}%</a></td>
															<td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                                            <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                                            <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
                                                            <td>
                                                                <span v-if="jobSeeker.reviewed == 0"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 1})"><i class="fas fa-eye" title="Reviewed"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.reviewed == 1"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 0})"><i class="fas fa-eye-slash" title="Unreviewed"></i></inertiaLink></span>
                                                                &nbsp;
                                                                <span v-if="jobSeeker.status == 0"><inertiaLink :href="route('changeStatus', {id: jobSeeker.id, status: 1})"><i class="fas fa-check" title="Approve"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.status == 1"><inertiaLink :href="route('changeStatus', {id: jobSeeker.id, status: 0})"><i class="fas fa-times" title="Reject" style="color: red"></i></inertiaLink></span>
                                                            </td>
														</tr>
													</tbody>
												</table>
											</div> <!--/.table-responsive--->
            </div>
            <div v-else class="d-flex justify-content-center"><h3>Sorry, no candidate found.</h3></div>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
export default {
    components:{
        AdminLayout
    },
    props:{
        jobSeekers: Object
    }
}
</script>
