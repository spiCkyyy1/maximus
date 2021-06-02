<template>
   <admin-layout>
      <div>
         <div class="card" v-if="route().current() == 'allCandidates'">
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
                     <button class="btn btn-sm btn-primary ml-1" title="Apply Filter" @click="getPaginatedData(currentPage)"><i class="icon-layers fa-lg fa-r"></i> Apply filter</button>
                  </div>
               </div>
            </div>
         </div>
         <div v-if="dataLoaded && jobSeekers.data.length > 0">
             <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="title" v-if="all"><i class="icon-people"></i> Job Seekers</div>
                    <div class="title" v-if="selected"><i class="icon-people"></i> Selected Candidates</div>
                    <div class="title" v-if="rejected"><i class="icon-people"></i> Rejected Candidates</div>
                    <div class="title" v-if="reviewed"><i class="icon-people"></i> Reviewed Candidates</div>
                </div>
                <div class="col-auto">
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
                            <th  width="50px"><i class="icon-user fa-lg"></i></th>
                            <th width="150px">Name</th>
                            <th>Gender</th>
                            <th>Qualification</th>
                            <th >Full-Time Employment</th>
                            <th >On-TheJob Training</th>
                            <th >Active Social Beneficiary</th>
                            <th>Unemployed</th>
                            <th >Readiness Assessment Test</th>
                            <th >Evaluation Assessment Test</th>
                            <th >Best Competency</th>
                            <th >Worst Competency</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr v-for="(jobSeeker, k) in jobSeekers.data" :key="k">
                                <td>{{jobSeeker.id}}</td>
                                <td >
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
                                <td >{{jobSeeker.full_time_employment}}</td>
                                <td >{{jobSeeker.on_job_training}}</td>
                                <td >{{jobSeeker.social_benficiary}}</td>
                                <td v-if="jobSeeker.unemployed == 'never_worked'">Never Worked</td>
                                <td v-if="jobSeeker.unemployed == 'less_than_3_months'">Less Than 3 Months</td>
                                <td v-if="jobSeeker.unemployed == 'more_than_3_months'">More than 3 months</td>
                                <td v-if="jobSeeker.unemployed == 'N/A'">N/A</td>
                                <td v-if="jobSeeker.readiness_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Readiness Assessment')">{{jobSeeker.readiness_weighted_score}}%</a></td>
                                <td  v-if="jobSeeker.readiness_weighted_score == 'N/A'">{{jobSeeker.readiness_weighted_score}}</td>
                                <td v-if="jobSeeker.evaluation_weighted_score != 'N/A'"><a href="javascript:;"  @click="openAssessmentModal(jobSeeker.readiness_assessment, 'Evaluation Assessment')">{{jobSeeker.evaluation_weighted_score}}%</a></td>
                                <td  v-if="jobSeeker.evaluation_weighted_score == 'N/A'">{{jobSeeker.evaluation_weighted_score}}</td>
                                <td v-if="jobSeeker.best_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.best_competency}}</span></td>
                                <td v-else><span>{{jobSeeker.best_competency}}</span></td>
                                <td v-if="jobSeeker.worst_competency != 'N/A'"><span class="badge badge-soft-info">{{jobSeeker.worst_competency}}</span></td>
                                <td v-else><span>{{jobSeeker.worst_competency}}</span></td>
                                <td>
                                        <span v-if="jobSeeker.reviewed == 'Unreviewed'"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 1})"><i class="fas fa-eye" title="Reviewed"></i></inertiaLink></span>
                                        <span v-if="jobSeeker.reviewed == 'Reviewed'"><inertiaLink :href="route('reviewJobSeeker', {id: jobSeeker.id, review: 0})"><i class="fas fa-eye-slash" title="Unreviewed"></i></inertiaLink></span>
                                </td>
                            </tr>
                        </tbody>
                </table>
                </div>
            </div>
            <pagination :metaData="jobSeekers" v-on:getPaginatedData="getPaginatedData"
            v-on:getPaginatedDataByUrl="getPaginatedDataByUrl"></pagination>
         </div>
         <div v-else>
            <not-found></not-found>
         </div>
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
import NotFound from '../Admin/NotFound'
import Pagination from '../Admin/TablePagination'
export default {
    components:{
        AdminLayout,
        DetailModal,
        AssessmentModal,
        NotFound,
        Pagination
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
            dataLoaded: false,
            getAllCandidatesUrl: '/admin/get-paginated-data',
            tab: '',
            currentPage: 1
        }
    },
    mounted(){
         if(this.selected){
             $("#loader").css("display", "block");
                axios.post('/admin/get-selected-candidates')
                .then(response => {
                    if(response.data.success){
                        $("#loader").css("display", "none");
                        this.jobSeekers = response.data.success;
                        this.dataLoaded = true;
                    }
                }).catch(error => {
                    console.log(error);
                });
            }
            if(this.rejected){
                this.getAllCandidatesUrl = '/admin/get-rejected-candidates';
                $("#loader").css("display", "block");
                axios.post(this.getAllCandidatesUrl)
                .then(response => {
                    if(response.data.success){
                        $("#loader").css("display", "none");
                        this.jobSeekers = response.data.success;
                        this.dataLoaded = true;
                    }
                }).catch(error => {
                    console.log(error);
                });

            }
            if(this.reviewed){
                $("#loader").css("display", "block");
                axios.post('/admin/get-reviewed-candidates')
                .then(response => {
                    if(response.data.success){
                        $("#loader").css("display", "none");
                        this.jobSeekers = response.data.success;
                        this.dataLoaded = true;
                    }
                }).catch(error => {
                    console.log(error);
                });

            }
            if(this.all){
                this.getPaginatedData(this.currentPage);
            }

    },
    methods: {
        getPaginatedData: function(page){
            $("#loader").css("display", "block");
            axios.post(this.getAllCandidatesUrl+'?page='+page, {filter: this.filter, tab: ''})
            .then(response => {
                if(response.data.success){
                    $("#loader").css("display", "none");
                    this.jobSeekers = response.data.success;
                    this.dataLoaded = true;
                }

            });
        },
        getPaginatedDataByUrl: function(url){
            $("#loader").css("display", "block");
            axios.post(url, {filter: this.filter, tab: this.tab})
            .then(response => {
                if(response.data.success){
                    $("#loader").css("display", "none");
                    this.jobSeekers = response.data.success;
                    this.dataLoaded = true;
                }
            })
        },
        resetFilter: function(){
            this.filter =  {
                gender: '',
                qualification: '',
                fullTimeEmployment: '',
                JobTraining: '',
                socialBeneficiary: '',
                unEmployed: '',
                review: '',
                limit: ''
            };

            this.dataLoaded = false;
            this.getPaginatedData(1);
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
      },
      excelDownload: function(){
            $("#loader").css("display", "block");
            let url = '';
            let fileName = '';
            if(this.all){
                url = '/admin/download/excel';
                fileName = 'job-seekers.xlsx';
            }
            if(this.selected){
                url = '/admin/download/selected';
                fileName = 'Selected-candidates.xlsx';
            }
            if(this.rejected){
                url = '/admin/download/rejected';
                fileName = 'rejected-candidates.xlsx';
            }
            if(this.reviewed){
                url = '/admin/download/reviewed';
                fileName = 'reviewed-candidates.xlsx';
            }
            axios.get(url, {responseType:'blob'}).
            then(result => {
                $("#loader").css("display", "none");
                const url = window.URL.createObjectURL(new Blob([result.data], {type:'application/vnd.ms-excel'}));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', fileName);
                    document.body.appendChild(link);
                    link.click();
            });
        },
    }
}
</script>
