<template>
    <admin-layout>
        <div>
            <div class="card">
								<div class="card-body pb-0" v-if="route().current() == 'allCandidates'">
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
                                    <button class="btn btn-sm" title="Reset Filter" style="color: green" @click="resetFilter"><i class="fas fa-sync"></i></button>
                                    <button class="btn btn-sm btn-primary" title="Apply Filter" @click="filterCandidates"><i class="fas fa-filter"></i> Apply filter</button>
								</div>
            </div>
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
                                                            <th class="text-center">Best Competency</th>
                                                            <th class="text-center">Worst Competency</th>
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
															<td class="text-center strong" v-if="jobSeeker.readiness_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Readiness Assessment')">{{jobSeeker.readiness_weighted_score}}%</a></td>
                                                            <td class="text-center strong" v-if="jobSeeker.readiness_weighted_score == 'N/A'"><a href="javascript:;" >{{jobSeeker.readiness_weighted_score}}</a></td>
                                                            <td class="text-center strong" v-if="jobSeeker.evaluation_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Evaluation Assessment')">{{jobSeeker.evaluation_weighted_score}}%</a></td>
                                                            <td class="text-center strong" v-if="jobSeeker.evaluation_weighted_score == 'N/A'"><a href="javascript:;">{{jobSeeker.evaluation_weighted_score}}</a></td>
                                                            <td><span class="badge badge-soft-info">{{jobSeeker.best_competency}}</span></td>
                                                            <td><span class="badge badge-soft-info">{{jobSeeker.worst_competency}}</span></td>
															<td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                                            <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                                            <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
                                                            <td v-if="jobSeeker.unemployed == null">N/A</td>
                                                            <td>
                                                                <span v-if="jobSeeker.reviewed == 0"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 1})"><i class="fas fa-eye" title="Reviewed"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.reviewed == 1"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 0})"><i class="fas fa-eye-slash" title="Unreviewed"></i></inertiaLink></span>
                                                                <!-- &nbsp;
                                                                <span v-if="jobSeeker.status == 0"><inertiaLink :href="route('changeStatus', {id: jobSeeker.id, status: 1})"><i class="fas fa-check" title="Approve"></i></inertiaLink></span>
                                                                <span v-if="jobSeeker.status == 1"><inertiaLink :href="route('changeStatus', {id: jobSeeker.id, status: 0})"><i class="fas fa-times" title="Reject" style="color: red"></i></inertiaLink></span> -->
                                                            </td>
														</tr>
													</tbody>
												</table>
											</div>
            </div>
            <div v-else class="d-flex justify-content-center"><h3>Sorry, no candidate found.</h3></div>
                                    <detail-modal :show="showModal" v-if="showModal"
                                :jobSeeker="jobSeeker" v-on:closeModal="closeModal"></detail-modal>

                        <assessment-modal :show="showAssessmestModal" v-if="showAssessmestModal"
                        :assessment="assessment" v-on:closeAssessmentModal="closeAssessmentModal" :title="modalTitle"></assessment-modal>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
import DetailModal from '../Admin/DetailModal'
import AssessmentModal from '../Admin/AssessmentModal'
export default {
    components:{
        AdminLayout,
        DetailModal,
        AssessmentModal
    },
    props:{
        all: Boolean,
        selected: Boolean,
        rejected: Boolean,
        reviewed: Boolean
    },
    data(){
        return{
            showModal: false,
            showAssessmestModal: false,
            jobSeeker: {},
            jobSeekers: {},
            assessment: {},
            modalTitle: '',
            filter: {
                gender: '',
                qualification: '',
                fullTimeEmployment: '',
                JobTraining: '',
                socialBeneficiary: '',
                unEmployed: '',
                review: '',
                limit: ''
            },
        }
    },
    mounted(){
         if(this.selected){
                axios.get('/admin/get-selected-candidates')
                .then(response => {
                    if(response.data.success){
                        this.jobSeekers = response.data.success;
                    }
                }).catch(error => {
                    console.log(error);
                });
            }
            if(this.rejected){
                axios.get('/admin/get-rejected-candidates')
                .then(response => {
                    if(response.data.success){
                        this.jobSeekers = response.data.success;
                    }
                }).catch(error => {
                    console.log(error);
                });

            }
            if(this.reviewed){
                axios.get('/admin/get-reviewed-candidates')
                .then(response => {
                    if(response.data.success){
                        this.jobSeekers = response.data.success;
                    }
                }).catch(error => {
                    console.log(error);
                });

            }
            if(this.all){
        this.filterCandidates();
            }

    },
    methods: {
        filterCandidates: function(){

            axios.post('/filter-candidates', this.filter)
                .then(response => {
                    if(response.data.success){
                        this.jobSeekers = response.data.jobSeekers;
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
