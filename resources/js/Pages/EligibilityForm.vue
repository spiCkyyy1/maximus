<template>
   <layout>
      <div class="section section-qa section-custom section-custom-right secondary-bg">
         <div class="feature-background">
            <div class="fb-fill d-flex align-items-center bg-2" style="background-image: url('/images/banners/bg2.png');">
               <div class="feature-content w-100 px-5">
                  <img src="/images/banners/2.png" alt="" class="img-fluid hiring-img wow fadeInDown">
                  <div class="sec-title wow fadeInLeft">
                     <p class="sub-title white-text">{{__('join_the_team')}}</p>
                     <h1 class="title white-text">{{__('we_are_hiring')}}</h1>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-box">
            <div class="feature-foreground wow fadeInRight">
                <div class="th-loader loader-page" id="loader" v-if="showLoader">
					<svg class="spinner-container" viewBox="0 0 52 52">
						<circle class="path" cx="26px" cy="26px" r="20px" fill="none" />
					</svg>
				</div>

               <div>
                  <div class="feature-content d-flex align-items-center">
                     <div>
                        <div class="card wow fadeInDown" v-if="applicationAccepted">
                           <div>
                              <div class="icon">
                                 <i class="icon-check alert-icon-success"></i>
                              </div>
                              <h6>{{__('thankyou_register')}}</h6>
                              <p class="font-md">
                                {{__('completed_registration_passed')}}
                              </p>
                              <p class="font-md">
                                 {{__('member_contact')}}
                              </p>
                                {{__('follow_link')}}

                              <inertiaLink :href="route('assessmentTest', {id: personalInformation.id})" as="button" class="btn btn-primary mt-5" style="margin-left: 30%">{{__('take_your_assessment_test')}}</inertiaLink>
                           </div>
                        </div>
                        <div class="card wow fadeInDown" v-if="applicationRejected">
                           <div>
                              <div class="icon">
                                 <i class="icon-close alert-icon-rejected"></i>
                              </div>
                              <h6>{{__('thankyou_register')}}</h6>
                                <p class="font-md">
                                    {{__('completed_registration_passed')}}
                                </p>
                                <p class="font-md">
                                    {{__('member_contact_other_program')}}
                                </p>
                           </div>
                        </div>
                        <div class="card form-dark wow fadeInRight" id="personalInformation" v-if="showPersonalInformationForm">
                           <div>
                              <h6 class="mb-5">{{__('personal_information')}}</h6>
                              <div class="form-row">
                                  <div class="col-sm-auto col-lg-12 col-xl-auto">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('title')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.title">
                                             <option value="ms">{{__('ms')}}</option>
                                             <option value="miss">{{__('miss')}}</option>
                                             <option value="mrs">{{__('mrs')}}</option>
                                          </select>
                                       </div>
                                       <div class="form-text small text-danger" v-if="errors.firstName">{{ __(errors.title[0]) }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('first_name')}} *</label>
                                       <input type="text" class="form-control" v-model="personalInformation.firstName">
                                       <div class="form-text small text-danger" v-if="errors.firstName">{{ __(errors.firstName[0]) }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('middle_name')}}</label>
                                       <input type="text" class="form-control" v-model="personalInformation.middleName">
                                       <div class="form-text small text-danger" v-if="errors.middleName">{{ __(errors.middleName[0]) }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('surname')}} *</label>
                                       <input type="text" class="form-control" v-model="personalInformation.surName">
                                       <div class="form-text small text-danger" v-if="errors.surName">{{ __(errors.surName[0]) }}</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                       <label class="custom-label">{{__('marital_status')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.martialStatus">
                                            <option value="married">{{__('married')}}</option>
                                            <option value="divorced">{{__('divorced')}}</option>
                                            <option value="single">{{__('single')}}</option>
                                            </select>
                                          <div class="form-text small text-danger" v-if="errors.martialStatus">{{ __(errors.martialStatus[0]) }}</div>
                                       </div>
                                </div>
                              <div class="form-row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('mobile_no')}} *</label>
                                       <input type="text" class="form-control" v-model="personalInformation.mobile">
                                       <div class="form-text small text-danger" v-if="errors.mobile">{{ __(errors.mobile[0]) }}</div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('email_addresss')}} *</label>
                                       <input type="email" class="form-control" v-model="personalInformation.email">
                                       <div class="form-text small text-danger" v-if="errors.email">{{ __(errors.email[0]) }}</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('city')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.city">
                                                <option v-for="(city, k) in cities" :key="k" :value="city.value">{{__(city.text)}}</option>
                                            </select>
                                          <div class="form-text small text-danger" v-if="errors.city">{{ __(errors.city[0]) }}</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="custom-label">{{__('region')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.region">
                                            <option v-for="(region, k) in regions" :key="k" :value="region.value">{{__(region.text)}}</option>
                                            </select>
                                          <div class="form-text small text-danger" v-if="errors.region">{{ __(errors.region[0]) }}</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="custom-label">{{__('nin')}} *</label>
                                 <input type="text" class="form-control" v-model="personalInformation.nin">
                                 <div class="form-text small text-danger" v-if="errors.nin">{{ __(errors.nin[0]) }}</div>
                              </div>
                              <div class="form-group">
										<label class="custom-label">{{__('dob')}} *</label>
										<div class="select-date">
                                            <!-- date-pickr -->
											<input type="text" class="form-control date-pickr" v-model="personalInformation.dob" data-input>
                                            <div class="form-text small text-danger" v-if="errors.dob">{{ __(errors.dob[0]) }}</div>
										</div>
                                </div>
                              <div class="text-center mt-5">
                                 <button type="button" class="btn btn-primary" @click="validatePersonalInformation">{{__('submit')}}</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showGenderForm" id="genderForm">
                           <div>
                              <h6>{{__('whats_your_gender')}}</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c1" class="form-control"  value="male" v-model="personalInformation.gender">
                                    <label for="c1">{{__('male')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c2" class="form-control"  value="female" v-model="personalInformation.gender">
                                    <label for="c2">{{__('female')}}</label>
                                 </div>
                                <div class="form-text small text-danger" v-if="errors.gender">{{ __(errors.gender[0]) }}</div>

                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="validateGender">{{__('submit')}}</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showQualificationForm">
                           <div>
                              <h6>{{__('highest_level_of_education')}}</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa1" value="school" v-model="personalInformation.qualification">
                                    <label for="oa1">{{__('school')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa2" value="bachelors" v-model="personalInformation.qualification">
                                    <label for="oa2">{{__('bachelor')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa3" value="masters" v-model="personalInformation.qualification">
                                    <label for="oa3">{{__('master')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="oa4" value="doctoral" v-model="personalInformation.qualification">
                                    <label for="oa4">{{__('doctoral')}}</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.qualification">{{ __(errors.qualification[0]) }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveQualification">{{__('submit')}}</button>
                              </div>
                           </div>
                        </div>

                        <div class="card wow fadeInRight"  v-if="showEmploymentForm">
                           <div>
                              <h6>{{__('full_time_employment')}}</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c5" value="yes" v-model="personalInformation.employment">
                                    <label for="c5">{{__('yes')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c6" value="no" v-model="personalInformation.employment">
                                    <label for="c6">{{__('no')}}</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.employment">{{ __(errors.employment[0]) }}</div>
                              </div>

                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveEmployment">{{__('submit')}}</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showOnJobForm">
                           <div>
                              <h6>{{__('ojt_training')}}</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c7" value="yes" v-model="personalInformation.jobTraining">
                                    <label for="c7">{{__('yes')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c8" value="no" v-model="personalInformation.jobTraining">
                                    <label for="c8">{{__('no')}}</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.jobTraining">{{ __(errors.jobTraining[0]) }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveJobTraining">{{__('submit')}}</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showSocialForm">
                           <div>
                              <h6>{{__('active_social')}} </h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c9"  value="yes"  v-model="personalInformation.socialBeneficiary">
                                    <label for="c9">{{__('yes')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c10" value="no"   v-model="personalInformation.socialBeneficiary">
                                    <label for="c10">{{__('no')}}</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.socialBeneficiary">{{ __(errors.socialBeneficiary[0]) }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveSocial">{{__('submit')}}</button>
                              </div>
                           </div>
                        </div>
                        <div class="card wow fadeInRight" v-if="showUnemployedForm">
                           <div>
                              <h6>{{__('long_unemployed')}}</h6>
                              <div class="check_radio mt-4 mb-5">
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c91" value="never_worked" v-model="personalInformation.beenUnemployed">
                                    <label for="c91">{{__('never_worked')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c101" value="less_than_3_months" v-model="personalInformation.beenUnemployed">
                                    <label for="c101">{{__('less_than_3')}}</label>
                                 </div>
                                 <div class="radio text-left mb-3">
                                    <input type="radio" id="c102" value="more_than_3_months" v-model="personalInformation.beenUnemployed">
                                    <label for="c102">{{__('more_than_3')}}</label>
                                 </div>
                                 <div class="form-text small text-danger" v-if="errors.beenUnemployed">{{ __(errors.beenUnemployed[0]) }}</div>
                              </div>
                              <div class="text-center">
                                 <button type="button" class="btn btn-primary" @click="saveUnemploymentForm">{{__('submit')}}</button>
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
        mixins: [require('../base')],
        props:{
            cities: Object,
            regions: Object
        },
        mounted(){

            var base_url = window.location.origin;
            let cssFile = document.createElement('link');
            cssFile.rel = 'stylesheet';
            cssFile.href = base_url+'/css/flatpickr.min.css';
            document.head.appendChild(cssFile);
            let jsFile = document.createElement('script');
            jsFile.type = 'text/javascript';
            jsFile.src = base_url+'/js/flatpickr.min.js';
            document.head.appendChild(jsFile);

            $(".date-pickr").flatpickr({
			altInput: true,
			altFormat: "Y-m-d",
			dateFormat: "Y-m-d",
		});
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
                    beenUnemployed: '',
                    martialStatus: ''
                },
                errors: {},
                showLoader: false
            }
        },
        methods: {
            validatePersonalInformation: function(){
                this.showLoader = true;

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
                    this.showLoader = false;
                }).catch(e => {
                    console.log(e);
                });

            },
            validateGender: function(){
                this.showLoader = true;
                if(this.personalInformation.gender == 'male'){
                    axios.post('/application-rejected', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showGenderForm = false;
                                this.applicationRejected = true;

                        }
                        this.showLoader = false;
                    }).catch(error => {
                        console.log(error);
                    });


                }else{
                    this.showLoader = true;
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
                        this.showLoader = false;
                    }).catch(error => {
                        console.log(error);
                    });
                }

            },
            saveQualification: function(){
                this.showLoader = true;
                if(this.personalInformation.qualification == 'school'){

                    axios.post('/application-rejected', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showQualificationForm = false;
                                this.applicationRejected = true;

                        }
                        this.showLoader = false;
                    }).catch(error => {
                        console.log(error);
                    });

                }else{
                    this.showLoader = true;
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
                        this.showLoader = false;
                    });
                }
            },
            saveEmployment: function(){
                this.showLoader = true;
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
                        this.showLoader = false;
                    });
            },
            saveJobTraining: function(){
                this.showLoader = true;
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
                        this.showLoader = false;
                    });
            },
            saveSocial: function(){
                this.showLoader = true;
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
                        this.showLoader = false;
                    });
            },
            saveUnemploymentForm: function(){
                this.showLoader = true;
                if(this.personalInformation.beenUnemployed == 'less_than_3_months'){
                    this.showLoader = true;
                    axios.post('/application-rejected', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                                this.showUnemployedForm = false;
                                this.applicationRejected = true;

                        }
                        this.showLoader = false;
                    }).catch(error => {
                        console.log(error);
                    });


                }else{
                    this.showLoader = true;
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
                        this.showLoader = false;
                    });
                }
            }
        }
    }
</script>
