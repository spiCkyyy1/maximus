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
                     <div class="qa">
                        <div class="card" v-if="applicationAccepted">
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

                              <inertiaLink :href="route('assessmentTest', {id: personalInformation.id})" as="button" class="btn btn-primary" style="margin-left: 30%">Take your Assessment Test</inertiaLink>
                           </div>
                        </div>
                        <div class="card" v-if="applicationRejected">
                           <div>
                              <div class="icon">
                                 <i class="icon-close alert-icon-rejected"></i>
                              </div>
                              <h6>We are sorry.</h6>
                              <p class="font-md">
                                 Your application does not meet the eligibility criteria.
                              </p>
                           </div>
                        </div>
                        <div class="card form-dark" id="personalInformation" v-if="showPersonalInformationForm">
                           <div>
                              <h6 class="mb-5">Personal Information</h6>
                              <div class="form-row">
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                       <label class="custom-label">First Name</label>
                                       <input type="text" class="form-control" v-model="personalInformation.firstName">
                                       <div class="error-messages" v-if="errors.firstName">{{ errors.firstName[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                       <label class="custom-label">Middle Name</label>
                                       <input type="text" class="form-control" v-model="personalInformation.middleName">
                                       <div class="error-messages" v-if="errors.middleName">{{ errors.middleName[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                       <label class="custom-label">Surname</label>
                                       <input type="text" class="form-control" v-model="personalInformation.surName">
                                       <div class="error-messages" v-if="errors.surName">{{ errors.surName[0] }}</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">Mobile No.</label>
                                       <input type="number" class="form-control" v-model="personalInformation.mobile">
                                       <div class="error-messages" v-if="errors.mobile">{{ errors.mobile[0] }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">Email Address</label>
                                       <input type="email" class="form-control" v-model="personalInformation.email">
                                       <div class="error-messages" v-if="errors.email">{{ errors.email[0] }}</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">City</label>
                                       <div class="select-picker">
                                          <select class="form-control" v-model="personalInformation.city">
                                             <option value="lahore">Lahore</option>
                                             <option value="karachi">Karachi</option>
                                             <option value="peshawar">Peshawar</option>
                                          </select>
                                          <div class="error-messages" v-if="errors.city">{{ errors.city[0] }}</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">Region</label>
                                       <div class="select-picker">
                                          <select class="form-control" v-model="personalInformation.region">
                                             <option value="pakistan">Pakistan</option>
                                             <option value="india">India</option>
                                             <option value="japan">Japan</option>
                                          </select>
                                          <div class="error-messages" v-if="errors.region">{{ errors.region[0] }}</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="custom-label">NIN</label>
                                 <input type="text" class="form-control" v-model="personalInformation.nin">
                                 <div class="error-messages" v-if="errors.nin">{{ errors.nin[0] }}</div>
                              </div>
                              <div class="form-group">
                                 <label class="custom-label">Date of Birth</label>
                                 <input type="date" class="form-control" v-model="personalInformation.dob">
                                 <div class="error-messages" v-if="errors.dob">{{ errors.dob[0] }}</div>
                              </div>
                              <div class="text-center mt-5">
                                 <button type="button" class="btn btn-primary" @click="validatePersonalInformation">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card" v-if="showGenderForm" id="genderForm">
                           <div>
                              <h6>What's your Gender?</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c1"  value="male" v-model="personalInformation.gender">
                                    <label for="c1">Male</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c2"  value="female" v-model="personalInformation.gender">
                                    <label for="c2">Female</label>
                                 </div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="validateGender">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card" v-if="showQualificationForm">
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
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveQualification">Submit</button>
                              </div>
                           </div>
                        </div>

                        <div class="card" v-if="showEmploymentForm">
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
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveEmployment">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card" v-if="showOnJobForm">
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
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveJobTraining">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card" v-if="showSocialForm">
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
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveSocial">Submit</button>
                              </div>
                           </div>
                        </div>
                        <div class="card" v-if="showUnemployedForm">
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
        data(){
            return{
                showPersonalInformationForm: true,
                showGenderForm: false,
                showQualificationForm: false,
                showEmploymentForm: false,
                AssessmentStarted: false,
                applicationRejected: false,
                applicationAccepted: false,
                showOnJobForm: false,
                showSocialForm: false,
                showUnemployedForm: false,
                personalInformation: {
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
                    this.showGenderForm = false;
                    this.applicationRejected = true;

                }else{
                    axios.post('/save-gender', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showGenderForm = false;
                                this.showQualificationForm = true;
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                }

            },
            saveQualification: function(){
                if(this.personalInformation.qualification == 'school'){
                            this.showQualificationForm = false;
                            this.applicationRejected = true;

                }else{
                    axios.post('/save-qualification', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showQualificationForm = false;
                            this.showEmploymentForm = true;
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
                        }
                    });
            },
            saveJobTraining: function(){
                axios.post('/save-jobTraining', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showOnJobForm = false;
                            this.showSocialForm = true;
                        }
                    });
            },
            saveSocial: function(){
                axios.post('/save-social', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showSocialForm = false;
                            this.showUnemployedForm = true;
                        }
                    });
            },
            saveUnemploymentForm: function(){
                if(this.personalInformation.beenUnemployed == 'less_than_3_months'){
                    this.showUnemployedForm = false;
                    this.applicationRejected = true;

                }else{
                    axios.post('/save-unemployment', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showSocialForm = false;
                            this.showUnemployedForm = false;
                            this.applicationAccepted = true;
                        }
                    });
                }
            }
        }
    }
</script>
