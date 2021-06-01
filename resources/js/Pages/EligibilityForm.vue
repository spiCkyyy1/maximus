<template>
   <layout>
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
               <ul class="process-steps-1" v-if="AssessmentStarted">
                  <li>
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
                  <div class="row justify-content-center" v-if="AssessmentStarted">
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
                     <div>
                        <div class="card wow fadeInDown" v-if="applicationAccepted">
                           <div>
                              <div class="icon">
                                 <i class="icon-check alert-icon-success"></i>
                              </div>
                              <h6>Thank you for registering your interest.</h6>
                              <p class="font-md">
                                You have successfully completed the registration and passed the eligibility for the OJT program.
                              </p>
                              <p class="font-md">
                                 A member of the team will contact you with regards to the documents required and welcoming you on the program.
                              </p>
                                Please follow the below link to complete the next step of the application / readiness assessments.

                              <inertiaLink :href="route('assessmentTest', {id: personalInformation.id})" as="button" class="btn btn-primary mt-5" style="margin-left: 30%">Take your Assessment Test</inertiaLink>
                           </div>
                        </div>
                        <div class="card wow fadeInDown" v-if="applicationRejected">
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
                        <div class="card form-dark wow fadeInRight" id="personalInformation" v-if="showPersonalInformationForm">
                           <div>
                              <h6 class="mb-5">Personal Information</h6>
                              <div class="form-row">
                                  <div class="col-sm-auto col-lg-12 col-xl-auto">
                                    <div class="form-group">
                                       <label class="custom-label">Title</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.title">
                                             <option value="mr">Mr.</option>
                                             <option value="mrs">Mrs.</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm">
                                    <div class="form-group">
                                       <label class="custom-label">First Name</label>
                                       <input type="text" class="form-control" v-model="personalInformation.firstName">
                                       <div class="form-text small text-danger" v-if="errors.firstName">{{ errors.firstName[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm">
                                    <div class="form-group">
                                       <label class="custom-label">Middle Name</label>
                                       <input type="text" class="form-control" v-model="personalInformation.middleName">
                                       <div class="form-text small text-danger" v-if="errors.middleName">{{ errors.middleName[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm">
                                    <div class="form-group">
                                       <label class="custom-label">Surname</label>
                                       <input type="text" class="form-control" v-model="personalInformation.surName">
                                       <div class="form-text small text-danger" v-if="errors.surName">{{ errors.surName[0] }}</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">Mobile No.</label>
                                       <input type="text" class="form-control" v-model="personalInformation.mobile">
                                       <div class="form-text small text-danger" v-if="errors.mobile">{{ errors.mobile[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">Email Address</label>
                                       <input type="email" class="form-control" v-model="personalInformation.email">
                                       <div class="form-text small text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">City</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.city">
                                                <option v-for="(city, k) in cities" :key="k" :value="city.value">{{city.text}}</option>
                                            </select>
                                          <div class="form-text small text-danger" v-if="errors.city">{{ errors.city[0] }}</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">Region</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.region">
                                            <option v-for="(region, k) in regions" :key="k" :value="region.value">{{region.text}}</option>
                                            </select>
                                          <div class="form-text small text-danger" v-if="errors.region">{{ errors.region[0] }}</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="custom-label">NIN</label>
                                 <input type="text" class="form-control" v-model="personalInformation.nin">
                                 <div class="form-text small text-danger" v-if="errors.nin">{{ errors.nin[0] }}</div>
                              </div>
                              <div class="form-group">
                                 <label class="custom-label">Date of Birth</label>
                                 <input type="date" class="form-control" v-model="personalInformation.dob">
                                 <div class="form-text small text-danger" v-if="errors.dob">{{ errors.dob[0] }}</div>
                              </div>
                              <div class="text-center mt-5">
                                 <button type="button" class="btn btn-primary" @click="validatePersonalInformation">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showGenderForm" id="genderForm">
                           <div>
                              <h6>What's your Gender?</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c1" class="form-control"  value="male" v-model="personalInformation.gender">
                                    <label for="c1">Male</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c2" class="form-control"  value="female" v-model="personalInformation.gender">
                                    <label for="c2">Female</label>
                                 </div>
                                <div class="form-text small text-danger" v-if="errors.gender">{{ errors.gender[0] }}</div>

                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="validateGender">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showQualificationForm">
                           <div>
                              <h6>What is the highest level of qualification you hold?</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa1" value="school" v-model="personalInformation.qualification">
                                    <label for="oa1">School</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa2" value="bachelors" v-model="personalInformation.qualification">
                                    <label for="oa2">Bachelor's Degree</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa3" value="masters" v-model="personalInformation.qualification">
                                    <label for="oa3">Master's Degree</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa4" value="doctoral" v-model="personalInformation.qualification">
                                    <label for="oa4">Doctoral Degree</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.qualification">{{ errors.qualification[0] }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveQualification">Submit</button>
                              </div>
                           </div>
                        </div>

                        <div class="card wow fadeInRight"  v-if="showEmploymentForm">
                           <div>
                              <h6>You are available for full-time employment? </h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c5" value="yes" v-model="personalInformation.employment">
                                    <label for="c5">Yes</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c6" value="no" v-model="personalInformation.employment">
                                    <label for="c6">No</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.employment">{{ errors.employment[0] }}</div>
                              </div>

                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveEmployment">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showOnJobForm">
                           <div>
                              <h6>This programme has an element of On-TheJob training, you are willing and able to commit.</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c7" value="yes" v-model="personalInformation.jobTraining">
                                    <label for="c7">Yes</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c8" value="no" v-model="personalInformation.jobTraining">
                                    <label for="c8">No</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.jobTraining">{{ errors.jobTraining[0] }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveJobTraining">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showSocialForm">
                           <div>
                              <h6>Are you an active social beneficiary? </h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c9"  value="yes"  v-model="personalInformation.socialBeneficiary">
                                    <label for="c9">Yes</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c10" value="no"   v-model="personalInformation.socialBeneficiary">
                                    <label for="c10">No</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.socialBeneficiary">{{ errors.socialBeneficiary[0] }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveSocial">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showUnemployedForm">
                           <div>
                              <h6>How long have you been unemployed?</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c91" value="never_worked" v-model="personalInformation.beenUnemployed">
                                    <label for="c91">Never worked</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c101" value="less_than_3_months" v-model="personalInformation.beenUnemployed">
                                    <label for="c101">Less Than 3 Months</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c102" value="more_than_3_months" v-model="personalInformation.beenUnemployed">
                                    <label for="c102">More than 3 months</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.beenUnemployed">{{ errors.beenUnemployed[0] }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveUnemploymentForm">Submit</button>
                              </div>
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
        },
        props:{
            cities: Object,
            regions: Object
        },
        data(){
            return{
                showPersonalInformationForm: true,
                showGenderForm: false,
                showQualificationForm: false,
                showEmploymentForm: false,
                showOnJobForm: false,
                showSocialForm: false,
                showUnemployedForm: false,
                AssessmentStarted: false,
                applicationRejected: false,
                applicationAccepted: false,
                personalInformation: {
                    title: '',
                    id: '',
                    firstName: '',
                    middleName: '',
                    surName: '',
                    mobile: '',
                    email: '',
                    city: '',
                    region: '',
                    nin: '',
                    dob: '',
                    gender: '',
                    qualification: '',
                    employment: '',
                    jobTraining: '',
                    socialBeneficiary: '',
                    beenUnemployed: ''
                },
                errors: {}
            }
        },
        methods: {
            validatePersonalInformation: function(){

                axios.post('/save-personal-information', this.personalInformation)
                .then(response => {

                    if(response.data.success){
                        this.personalInformation.id = response.data.success;
                        this.showPersonalInformationForm = false;
                        this.showGenderForm = true;
                        this.errors = [];
                    }
                    if(response.data.errors){
                        this.errors = response.data.errors;
                    }
                }).catch(e => {
                    console.log(e);
                });

            },
            validateGender: function(){

                if(this.personalInformation.gender == 'male'){
                    axios.post('/application-rejected', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showGenderForm = false;
                                this.applicationRejected = true;
                        }
                    }).catch(error => {
                        console.log(error);
                    });


                }else{
                    axios.post('/save-gender', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showGenderForm = false;
                                this.showQualificationForm = true;
                                this.errors = [];
                        }
                        if(response.data.errors){
                                this.errors = response.data.errors;
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                }

            },
            saveQualification: function(){
                if(this.personalInformation.qualification == 'school'){

                    axios.post('/application-rejected', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showQualificationForm = false;
                                this.applicationRejected = true;
                        }
                    }).catch(error => {
                        console.log(error);
                    });

                }else{
                    axios.post('/save-qualification', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showQualificationForm = false;
                            this.showEmploymentForm = true;
                            this.errors = [];
                        }
                        if(response.data.errors){
                                this.errors = response.data.errors;
                        }
                    });
                }
            },
            saveEmployment: function(){
                axios.post('/save-employment', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showEmploymentForm = false;
                            this.showOnJobForm = true;
                            this.errors = [];
                        }
                        if(response.data.errors){
                                this.errors = response.data.errors;
                        }
                    });
            },
            saveJobTraining: function(){
                axios.post('/save-jobTraining', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showOnJobForm = false;
                            this.showSocialForm = true;
                            this.errors = [];
                        }
                        if(response.data.errors){
                                this.errors = response.data.errors;
                        }
                    });
            },
            saveSocial: function(){
                axios.post('/save-social', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showSocialForm = false;
                            this.showUnemployedForm = true;
                            this.errors = [];
                        }
                        if(response.data.errors){
                                this.errors = response.data.errors;
                        }
                    });
            },
            saveUnemploymentForm: function(){
                if(this.personalInformation.beenUnemployed == 'less_than_3_months'){

                    axios.post('/application-rejected', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showUnemployedForm = false;
                                this.applicationRejected = true;
                        }
                    }).catch(error => {
                        console.log(error);
                    });


                }else{
                    axios.post('/save-unemployment', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showSocialForm = false;
                            this.showUnemployedForm = false;
                            this.applicationAccepted = true;
                            this.errors = [];
                        }
                        if(response.data.errors){
                                this.errors = response.data.errors;
                        }
                    });
                }
            }
        }
    }
</script>
