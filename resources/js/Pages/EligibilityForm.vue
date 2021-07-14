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
                                    {{__('completed_registration_rejected')}}
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
                                             <option value="mr">{{__('mr')}}</option>
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
                              <div class="form-row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                            <label class="custom-label">{{__('nin')}} *</label>
                                            <input type="text" class="form-control" v-model="personalInformation.nin">
                                            <div class="form-text small text-danger" v-if="errors.nin">{{ __(errors.nin[0]) }}</div>
                                        </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label class="custom-label">{{__('dob')}} *</label>
                                        <div class="select-date">
                                            <!-- date-pickr -->
                                            <input type="text" class="form-control date-pickr" v-model="personalInformation.dob" data-input>
                                            <div class="form-text small text-danger" v-if="errors.dob">{{ __(errors.dob[0]) }}</div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                        <label class="custom-label">{{__('highest_level_of_education')}} *</label>
                                        <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.qualification">
                                                <option value="bachelors">{{__('bachelor')}}</option>
                                                <!-- <option value="cannotreadnwrite">{{__('cannotreadnwrite')}}</option> -->
                                                <option value="diploma">{{__('diploma')}}</option>
                                                <!-- <option value="fellowship">{{__('fellowship')}}</option> -->
                                                <option value="high_school">{{__('High School')}}</option>
                                                <option value="higher_diploma">{{__('Higher Diploma')}}</option>
                                                <option value="literate">{{__('Literate')}}</option>
                                                <option value="masters">{{__('master')}}</option>
                                                <option value="PHD_and_equivalent">{{__('PhD. and equivalent')}}</option>
                                                <option value="primary">{{__('Primary')}}</option>
                                                <option value="secondary">{{__('Secondary')}}</option>
                                            </select>
                                          <div class="form-text small text-danger" v-if="errors.qualification">{{ __(errors.qualification[0]) }}</div>
                                       </div>
                                    </div>
                                <div class="form-row" v-if="personalInformation.qualification != 'high_school'">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="custom-label">{{__('Education Major')}} *</label>
                                            <div class="select-picker">
                                                <select class="form-control" id="educationMajor">
                                                    <option value=""></option>
                                                    <option value="administration_and_management">{{__('Administration and Management')}}</option>
                                                    <option value="arts">{{__('Arts')}}</option>
                                                    <option value="basic_programmes_and_qualifications">{{__('Basic programmes and qualifications')}}</option>
                                                    <option value="computer_and_technology">{{__('Computer and Technology')}}</option>
                                                    <option value="crop_and_agriculture_studies">{{__('Crop and Agriculture Studies')}}</option>
                                                    <option value="education">{{__('Education')}}</option>
                                                    <option value="engineering">{{__('Engineering')}}</option>
                                                    <option value="islamic_studies">{{__('Islamic Studies')}}</option>
                                                    <option value="literature_and_languages">{{__('Literature and Languages')}}</option>
                                                    <option value="medical_studies">{{__('Medical Studies')}}</option>
                                                    <option value="not_applicable">{{__('Not Applicable')}}</option>
                                                    <option value="science">{{__('Science')}}</option>
                                                    <option value="tourism_and_archaelogy">{{__('Tourism and ِArchaelogy')}}</option>
                                                </select>
                                            <div class="form-text small text-danger" v-if="errors.educationMajor">{{ __(errors.educationMajor[0]) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" v-if="personalInformation.qualification != 'high_school'">
                                        <div class="form-group">
                                            <label class="custom-label">{{__('Education Field')}} *</label>
                                            <div class="select-picker">
                                                <select class="form-control" id="educationField">
                                                    <option value=""></option>
                                                    <option value="accounting">{{__('Accounting')}}</option>
                                                    <option value="aerospace_engineering">{{__('Aerospace Engineering')}}</option>
                                                    <option value="agriculture_economics">{{__('Agriculture Economics')}}</option>
                                                    <option value="agriculture">{{__('Agriculture')}}</option>
                                                    <option value="applied_medical_science">{{__('Applied Medical Science')}}</option>
                                                    <option value="arabic_language">{{__('Arabic Language')}}</option>
                                                    <option value="archaelogy">{{__('Archaelogy')}}</option>
                                                    <option value="architecture">{{__('Architecture')}}</option>
                                                    <option value="arts_education">{{__('Arts Education')}}</option>
                                                    <option value="astronomy">{{__('Astronomy')}}</option>
                                                    <option value="basic_programmes_and_qualifications">{{__('Basic programmes and qualifications')}}</option>
                                                    <option value="biology">{{__('Biology')}}</option>
                                                    <option value="business_administration">{{__('Business Administration')}}</option>
                                                    <option value="catering_and_hospitality">{{__('Catering and Hospitality')}}</option>
                                                    <option value="chemical_engineering">{{__('Chemical engineering')}}</option>
                                                    <option value="chemistry">{{__('Chemistry')}}</option>
                                                    <option value="civil_engineering">{{__('Civil Engineering')}}</option>
                                                    <option value="computer">{{__('Computer (Teaching)')}}</option>
                                                    <option value="computer_engineering">{{__('Computer Engineering')}}</option>
                                                    <option value="computer_science">{{__('Computer Science')}}</option>
                                                    <option value="crops">{{__('Crops')}}</option>
                                                    <option value="dental_studies">{{__('Dental studies')}}</option>
                                                    <option value="design">{{__('Design')}}</option>
                                                    <option value="earth_sciences">{{__('Earth sciences')}}</option>
                                                    <option value="e_commerce">{{__('E-Commerce')}}</option>
                                                    <option value="economics">{{__('Economics')}}</option>
                                                    <option value="education">{{__('Education')}}</option>
                                                    <option value="education_techniques">{{__('Education Techniques')}}</option>
                                                    <option value="electrical_engineering">{{__('Electrical Engineering')}}</option>
                                                    <option value="english">{{__('English (Teaching)')}}</option>
                                                    <option value="environmental_sciences">{{__('Environmental sciences')}}</option>
                                                    <option value="faith">{{__('Faith')}}</option>
                                                    <option value="finance">{{__('Finance')}}</option>
                                                    <option value="fine_arts">{{__('Fine arts')}}</option>
                                                    <option value="fiqah">{{__('Fiqah')}}</option>
                                                    <option value="fisheries">{{__('Fisheries')}}</option>
                                                    <option value="forestry">{{__('Forestry')}}</option>
                                                    <option value="geography">{{__('Geography')}}</option>
                                                    <option value="hadeeth_science">{{__('Hadeeth Science')}}</option>
                                                    <option value="hair_and_beauty_services">{{__('Hair and beauty services')}}</option>
                                                    <option value="health_education">{{__('Health Education')}}</option>
                                                    <option value="history">{{__('History')}}</option>
                                                    <option value="hotel_management">{{__('Hotel management')}}</option>
                                                    <option value="human_resources">{{__('Human Resources')}}</option>
                                                    <option value="industrial_engineering">{{__('Industrial Engineering')}}</option>
                                                    <option value="information_technology">{{__('Information Technology')}}</option>
                                                    <option value="islamic_education">{{__('Islamic Education')}}</option>
                                                    <option value="islamic_legistlation">{{__('Islamic legistlation')}}</option>
                                                    <option value="islamic_studies_teaching">{{__('Islamic Studies (Teaching)')}}</option>
                                                    <option value="journalism_and_media">{{__('Journalism and Media')}}</option>
                                                    <option value="translator_english">{{__('Language and Translation - English')}}</option>
                                                    <option value="translator_french">{{__('Language and Translation - French')}}</option>
                                                    <option value="translator_linguistics_studies">{{__('Language and Translation - Linguistics and Studies')}}</option>
                                                    <option value="law">{{__('Law')}}</option>
                                                    <option value="library_and_information">{{__('Library and Information')}}</option>
                                                    <option value="management_information_system">{{__('Management Information System')}}</option>
                                                    <option value="management_information">{{__('Management Information')}}</option>
                                                    <option value="marketing">{{__('Marketing')}}</option>
                                                    <option value="mathematics_teaching">{{__('Mathematics (Teaching)')}}</option>
                                                    <option value="mathematics">{{__('Mathematics')}}</option>
                                                    <option value="mechanical_engineering">{{__('Mechanical Engineering')}}</option>
                                                    <option value="medical_administration">{{__('Medical Administration')}}</option>
                                                    <option value="medical_lab_technology">{{__('Medical Lab Technology')}}</option>
                                                    <option value="medical_laboratory">{{__('Medical Laboratory')}}</option>
                                                    <option value="medical_science">{{__('Medical Science')}}</option>
                                                    <option value="medicine">{{__('Medicine')}}</option>
                                                    <option value="mining_engineering">{{__('Mining Engineering')}}</option>
                                                    <option value="networks_and_communication">{{__('Networks and Communication')}}</option>
                                                    <option value="not_applicable">{{__('Not Applicable')}}</option>
                                                    <option value="nursing">{{__('Nursing')}}</option>
                                                    <option value="optometry">{{__('Optometry')}}</option>
                                                    <option value="performing_arts">{{__('Performing arts')}}</option>
                                                    <option value="petroleum_engineering">{{__('Petroleum Engineering')}}</option>
                                                    <option value="pharmacy">{{__('Pharmacy')}}</option>
                                                    <option value="phsycology_teaching">{{__('Phsycology (Teaching)')}}</option>
                                                    <option value="physical_education">{{__('Physical Education')}}</option>
                                                    <option value="physical_therapy">{{__('Physical Therapy')}}</option>
                                                    <option value="physics">{{__('Physics')}}</option>
                                                    <option value="physiological_chemistry">{{__('Physiological Chemistry')}}</option>
                                                    <option value="plant_production">{{__('Plant production')}}</option>
                                                    <option value="political_science">{{__('Political Science')}}</option>
                                                    <option value="pre_school">{{__('Pre-school')}}</option>
                                                    <option value="psychology">{{__('Psychology')}}</option>
                                                    <option value="public_administration">{{__('Public Administration')}}</option>
                                                    <option value="quantitative_techniques">{{__('Quantitative Techniques')}}</option>
                                                    <option value="quran_science">{{__('Quran Science')}}</option>
                                                    <option value="radiology">{{__('Radiology')}}</option>
                                                    <option value="rehabilitation">{{__('Rehabilitation')}}</option>
                                                    <option value="science_teaching">{{__('Science (Teaching)')}}</option>
                                                    <option value="sea_sciences">{{__('Sea Sciences')}}</option>
                                                    <option value="secretarial_and_office_work">{{__('Secretarial and office work')}}</option>
                                                    <option value="social_science_teaching">{{__('Social Science (Teaching)')}}</option>
                                                    <option value="social_science">{{__('Social Science')}}</option>
                                                    <option value="software_engineering">{{__('Software Engineering')}}</option>
                                                    <option value="special_education">{{__('Special Education')}}</option>
                                                    <option value="statistics">{{__('Statistics')}}</option>
                                                    <option value="teacher_training">{{__('Teacher training without subject specialisation')}}</option>
                                                    <option value="tourism">{{__('Tourism')}}</option>
                                                    <option value="travel_and_leisure">{{__('Travel and leisure')}}</option>
                                                    <option value="Veterinary">{{__('Veterinary')}}</option>
                                                </select>
                                            <div class="form-text small text-danger" v-if="errors.educationField">{{ __(errors.educationField[0]) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <label class="custom-label">{{__('full_time_employment')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.employment">
                                             <option value="yes">{{__('yes')}}</option>
                                             <option value="no">{{__('no')}}</option>
                                          </select>
                                        <div class="form-text small text-danger" v-if="errors.employment">{{ __(errors.employment[0]) }}</div>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-label">{{__('active_social')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.socialBeneficiary">
                                             <option value="yes">{{__('yes')}}</option>
                                             <option value="no">{{__('no')}}</option>
                                          </select>
                                        <div class="form-text small text-danger" v-if="errors.socialBeneficiary">{{ __(errors.socialBeneficiary[0]) }}</div>
                                       </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="custom-label">{{__('ojt_training')}} *</label>
                                       <div class="select-option">
                                          <select class="form-control" v-model="personalInformation.jobTraining">
                                             <option value="yes">{{__('yes')}}</option>
                                             <option value="no">{{__('no')}}</option>
                                          </select>
                                        <div class="form-text small text-danger" v-if="errors.jobTraining">{{ __(errors.jobTraining[0]) }}</div>
                                       </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="agreed" id="termsNcondition" v-model="personalInformation.agreed">
                                    <label class="form-check-label" for="termsNcondition">
                                       By clicking submit you accept the terms & conditions and data approval share as part of the recruitment process.
                                    </label>
                                    <div class="form-text small text-danger" v-if="errors.agreed">{{ __(errors.agreed[0]) }}</div>
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
                        <!-- <div class="card wow fadeInRight" v-if="showQualificationForm">
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
                        </div> -->

                        <!-- <div class="card wow fadeInRight"  v-if="showEmploymentForm">
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
                        </div> -->
                        <!-- <div class="card wow fadeInRight" v-if="showSocialForm">
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
                        </div> -->
                        <div class="card wow fadeInRight" v-if="showEducationForm" id="educationForm">
                           <div>
                               <div class="form-group mb-5">
                                        <label class="custom-label">{{__('Job Role')}} *</label>
                                        <div class="select-picker">
                                            <select class="form-control" id="jobRoleSelect">
                                                <option value=""></option>
                                                <option value="medical_and_nursing">{{__('Medical and Nursing')}}</option>
                                                <option value="engineering">{{__('Engineering')}}</option>
                                                <option value="teaching">{{__('Teaching')}}</option>
                                                <option value="call_center">{{__('Call center')}}</option>
                                                <option value="operations">{{__('Operations')}}</option>
                                                <option value="human_resource">{{__('Human resource')}}</option>
                                                <option value="finance">{{__('Finance')}}</option>
                                                <option value="transportations">{{__('Transportations')}}</option>
                                                <option value="procurement">{{__('Procurement')}}</option>
                                                <option value="designing">{{__('Designing')}}</option>
                                                <option value="marketing">{{__('Marketing')}}</option>
                                                <option value="security_and_safety">{{__('Security and safety')}}</option>
                                                <option value="IT">{{__('IT')}}</option>
                                                <option value="sales">{{__('Sales')}}</option>
                                                <option value="premises_maintenance">{{__('Premises & maintenance')}}</option>
                                                <option value="legal">{{__('Legal')}}</option>
                                                <option value="PR_Communications">{{__('PR & Communications')}}</option>
                                                <option value="business_development">{{__('Business Development')}}</option>
                                                <option value="reaserch_development">{{__('Reaserch & Development')}}</option>
                                                <option value="customer_service">{{__('Customer service')}}</option>
                                            </select>
                                        <div class="form-text small text-danger" v-if="errors.jobRole">{{ __(errors.jobRole[0]) }}</div>
                                    </div>
                                </div>
                               <div class="form-group mb-5">
                                        <label class="custom-label">{{__('Role Preference')}} *</label>
                                        <div class="select-picker">
                                            <select class="form-control" id="roleSelect">
                                                        <option value=""></option>
                                                        <option value="accountant">{{__('Accountant')}}</option>
                                                        <option value="admin">{{__('Admin')}}</option>
                                                        <option value="assistant_store_manager">{{__('Assistant Store manager')}}</option>
                                                        <!-- <option value="baker_associate">{{__('Baker Associate')}}</option> -->
                                                        <!-- <option value="baker">{{__('Baker')}}</option> -->
                                                        <!-- <option value="butcher">{{__('Butcher')}}</option> -->
                                                        <option value="cashier">{{__('Cashier')}}</option>
                                                        <option value="CCO_district_manager">{{__('CCO District Manager')}}</option>
                                                        <option value="CCO_supervisor">{{__('CCO Supervisor')}}</option>
                                                        <!-- <option value="cleaner">{{__('Cleaner')}}</option> -->
                                                        <option value="cleaner_supervisor">{{__('Cleaner Supervisor')}}</option>
                                                        <option value="coordinator">{{__('Coordinator')}}</option>
                                                        <option value="cost_accountant">{{__('Cost Accountant')}}</option>
                                                        <option value="customer_services">{{__('Customer services')}}</option>
                                                        <option value="data_entry">{{__('Data Entry')}}</option>
                                                        <option value="deli_service_associate">{{__('Deli Service Associate')}}</option>
                                                        <option value="designer">{{__('Designer')}}</option>
                                                        <option value="director_of_operation">{{__('Director of Operation')}}</option>
                                                        <option value="district_manager_operation">{{__('District Manager Operation')}}</option>
                                                        <!-- <option value="driver">{{__('Driver')}}</option> -->
                                                        <option value="duty_manager">{{__('Duty Manager')}}</option>
                                                        <option value="engineer">{{__('Engineer')}}</option>
                                                        <!-- <option value="fish_service_associate">{{__('Fish Service Associate')}}</option> -->
                                                        <!-- <option value="forklift">{{__('Forklift')}}</option> -->
                                                        <!-- <option value="front_end_associate">{{__('Front End Associate')}}</option> -->
                                                        <option value="hr_specialist">{{__('HR Specialist')}}</option>
                                                        <!-- <option value="laborer">{{__('Laborer')}}</option> -->
                                                        <!-- <option value="laundry_official">{{__('Laundry official')}}</option> -->
                                                        <!-- <option value="machine_operator">{{__('Machine Operator')}}</option> -->
                                                        <option value="manager">{{__('Manager')}}</option>
                                                        <option value="merchandiser">{{__('Merchandiser')}}</option>
                                                        <option value="nursing">{{__('Nursing')}}</option>
                                                        <!-- <option value="operator">{{__('Operator')}}</option> -->
                                                        <option value="payroll_coordinator">{{__('Payroll coordinator')}}</option>
                                                        <option value="produce_service_associate">{{__('Produce Service Associate')}}</option>
                                                        <option value="production_line">{{__('Production line')}}</option>
                                                        <option value="quality_officer">{{__('Quality officer')}}</option>
                                                        <!-- <option value="receiver">{{__('Receiver')}}</option> -->
                                                        <option value="receptionist">{{__('Receptionist')}}</option>
                                                        <option value="recruitment_coordinator">{{__('Recruitment coordinator')}}</option>
                                                        <option value="regional_operation_manager">{{__('Regional Operation Manager')}}</option>
                                                        <option value="sales_person">{{__('Sales person')}}</option>
                                                        <option value="secretary">{{__('Secretary')}}</option>
                                                        <option value="section_manager">{{__('Secretary')}}</option>
                                                        <option value="security_guard">{{__('Security Guard')}}</option>
                                                        <option value="security_supervisor">{{__('Security Supervisor')}}</option>
                                                        <option value="shift_leader">{{__('Shift Leader')}}</option>
                                                        <!-- <option value="stocker">{{__('Stocker')}}</option> -->
                                                        <option value="store_manager">{{__('Store Manager')}}</option>
                                                        <option value="student_counsellor">{{__('Student Counsellor')}}</option>
                                                        <option value="system_administrator">{{__('System Administrator')}}</option>
                                                        <option value="teacher">{{__('Teacher')}}</option>
                                                        <option value="technician">{{__('Technician')}}</option>
                                                        <option value="VP_of_operation">{{__('VP of operation')}}</option>
                                                        <option value="waiter">{{__('Waiter')}}</option>
                                            </select>
                                        <div class="form-text small text-danger" v-if="errors.role">{{ __(errors.role[0]) }}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <label class="custom-label">{{__('Sector Preference')}} *</label>
                                    <div class="select-picker">
                                        <select class="form-control" id="sectorSelect">
                                                <option value=""></option>
                                                <option value="accommodation_and_tourism">{{__('Accommodation and Tourism')}}</option>
                                                <!-- <option value="agriculture_and_livestock_production">{{__('Agriculture and Livestock Production')}}</option> -->
                                                <!-- <option value="agriculture_fishing_and_grazing_horses">{{__('Agriculture Fishing and Grazing Horses')}}</option> -->
                                                <option value="air_transport">{{__('Air Transport')}}</option>
                                                <option value="bakeries_and_bread_trade">{{__('Bakeries and Bread Trade')}}</option>
                                                <option value="building_and_construction_for_government_projects">{{__('Building and Construction for Government Projects')}}</option>
                                                <option value="building_and_construction">{{__('Building and Construction')}}</option>
                                                <option value="business_advisory_services">{{__('Business Advisory Services')}}</option>
                                                <option value="cement_industry">{{__('Cement Industry')}}</option>
                                                <option value="ceramics_granite_and_bricks">{{__('Ceramics Granite and Bricks')}}</option>
                                                <option value="collection_offices_and_real_estate_services">{{__('Collection Offices and Real Estate Services')}}</option>
                                                <option value="communications">{{__('Communications')}}</option>
                                                <option value="electricity_gas_and_water">{{__('Electricity Gas and Water')}}</option>
                                                <option value="farmers_fishermen_and_shepherds">{{__('Farmers Fishermen and Shepherds (Private)')}}</option>
                                                <option value="financial_institutions">{{__('Financial Institutions')}}</option>
                                                <option value="gas_stations">{{__('Gas Stations')}}</option>
                                                <option value="gold_and_jewellery_trade">{{__('Gold and Jewellery Trade')}}</option>
                                                <option value="government_facilities_services_offices">{{__('Government Facilities Services Offices')}}</option>
                                                <option value="health_services">{{__('Health Services')}}</option>
                                                <option value="information_technology">{{__('Information Technology')}}</option>
                                                <option value="insurance_and_business_services">{{__('Insurance and Business Services')}}</option>
                                                <option value="international_schools">{{__('International Schools')}}</option>
                                                <option value="kindergartens">{{__('Kindergartens')}}</option>
                                                <option value="laboratories">{{__('Laboratories')}}</option>
                                                <option value="maintenance_and_cleaning_contracts_and_operating">{{__('Maintenance and Cleaning Contracts and Operating')}}</option>
                                                <option value="manufacturing">{{__('Manufacturing')}}</option>
                                                <option value="mining_and_quarrying">{{__('Mining and Quarrying')}}</option>
                                                <option value="nutrition_services">{{__('Nutrition Services')}}</option>
                                                <option value="oil_and_gas_extraction">{{__('Oil and Gas Extraction')}}</option>
                                                <option value="other">{{__('Other')}}</option>
                                                <option value="passenger_and_goods_transport_outside_cities">{{__('Passenger and Goods Transport Outside Cities')}}</option>
                                                <option value="personal_services">{{__('Personal Services')}}</option>
                                                <option value="petrochemical_coal_and_rubber">{{__('Petrochemical Coal and Rubber')}}</option>
                                                <option value="pharmacies_and_drug_stores">{{__('Pharmacies and Drug Stores')}}</option>
                                                <option value="print_and_electronic_publishing">{{__('Print and Electronic Publishing')}}</option>
                                                <option value="private_employment_offices">{{__('Private Employment Offices')}}</option>
                                                <option value="private_recruitment_offices">{{__('Private Recruitment Offices')}}</option>
                                                <option value="ready_mix_cement">{{__('Ready Mix Cement')}}</option>
                                                <option value="road_transport_of_goods_within_cities">{{__('Road Transport of Goods within Cities')}}</option>
                                                <option value="road_transport_of_passengers_within_cities">{{__('Road Transport of Passengers within Cities')}}</option>
                                                <option value="Sanitation companies_operating_under_government_contracts">{{__('Sanitation Companies Operating Under Government Contracts')}}</option>
                                                <option value="saudi_schools_for_boys_and_girls">{{__('Saudi Schools for Boys and Girls')}}</option>
                                                <option value="saudi_schools_for_boys">{{__('Saudi Schools for Boys')}}</option>
                                                <option value="saudi_schools_for_girls">{{__('Saudi Schools for Girls')}}</option>
                                                <option value="security_guards">{{__('Security Guards')}}</option>
                                                <option value="shipping">{{__('Shipping')}}</option>
                                                <option value="small_business_entities">{{__('Small Business Entities (Not More Than 9 Employees)')}}</option>
                                                <option value="social_and_group_services">{{__('Social and Group Services')}}</option>
                                                <option value="storage">{{__('Storage')}}</option>
                                                <option value="transporting_goods_outside_cities">{{__('Transporting Goods Outside Cities')}}</option>
                                                <option value="universities_colleges_and_training_institutions">{{__('Universities Colleges and Training Institutions')}}</option>
                                                <option value="wholesale_and_retail_trade">{{__('Wholesale and Retail Trade')}}</option>
                                                <option value="workshops_and_maintenance_shops">{{__('Workshops and Maintenance Shops')}}</option>
                                            </select>
                                        <div class="form-text small text-danger" v-if="errors.sector">{{ __(errors.sector[0]) }}</div>
                                    </div>
                                </div>
                           </div>
                           <div class="text-center mt-5">
                                 <button type="button" class="btn btn-primary" @click="validateEducation">{{__('submit')}}</button>
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
                        <!-- <div class="card wow fadeInRight" v-if="uploadDocuments">
                            <div>
                                <h6 class="mb-5">Upload Files</h6>
                                <div class="form-group">
                                    <div class="btn btn-default btn-upload">
                                        <i class="icon-doc pr-2"></i>{{uploadCvText}}
                                        <input type="file" accept="application/pdf" id="cv" ref="cv" @change="handleCvUpload">
                                    </div>
                                </div>
                                <div class="form-text small text-danger" v-if="errors.cv">{{ __(errors.cv[0]) }}</div>
                                <div class="form-group">
                                    <div class="btn btn-default btn-upload">
                                        <i class="icon-docs pr-2"></i>{{uploadDegree}}
                                        <input type="file" accept="application/pdf" id="certificate" ref="certificate" @change="handleCertificateUpload">
                                    </div>
                                </div>
                                <div class="form-text small text-danger" v-if="errors.degreeCertificate">{{ __(errors.degreeCertificate[0]) }}</div>
                                <div class="form-group">
                                    <div class="btn btn-default btn-upload">
                                        <i class="icon-note pr-2"></i>{{uploadGosi}}
                                        <input type="file" accept="application/pdf" id="evidence" ref="evidence" @change="handleGosiUpload">
                                    </div>
                                </div>
                                <div class="form-text small text-danger" v-if="errors.gosiEvidence">{{ __(errors.gosiEvidence[0]) }}</div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" @click="uploadFiles">Submit</button>
                                </div>
                            </div>
                        </div> -->

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
                showEducationForm: false,
                uploadDocuments: false,
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
                    martialStatus: '',
                    jobRole: '',
                    role: '',
                    sector: '',
                    educationMajor: '',
                    educationField: '',
                    cv: '',
                    degreeCertificate: '',
                    gosiEvidence: '',
                    agreed: false
                },
                uploadCvText: 'Upload CV',
                uploadDegree: 'Upload Degree Certificate ',
                uploadGosi: 'GOSI Evidence',
                errors: {},
                showLoader: false
            }
        },
        methods: {
            validatePersonalInformation: function(){

                this.showLoader = true;

                this.personalInformation.educationMajor = $("#educationMajor").val();
                this.personalInformation.educationField = $("#educationField").val();

                axios.post('/save-personal-information', this.personalInformation)
                .then(response => {
                   console.log(response);

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
                axios.post('/save-gender', this.personalInformation)
                .then(response => {
                    if(response.data.success){
                            this.showGenderForm = false;
                            this.showEducationForm = true;
                            // this.showQualificationForm = true;
                            this.errors = [];

                    }
                    if(response.data.errors){
                            this.errors = response.data.errors;
                    }
                    this.showLoader = false;
                }).catch(error => {
                    console.log(error);
                });

                // if(this.personalInformation.gender == 'male'){
                //     axios.post('/application-rejected', this.personalInformation)
                //     .then(response => {
                //         if(response.data.success){
                //                 this.showGenderForm = false;
                //                 this.applicationRejected = true;

                //         }
                //         this.showLoader = false;
                //     }).catch(error => {
                //         console.log(error);
                //     });
                // }

            },
            // saveQualification: function(){

                //  this.showLoader = true;
                //  axios.post('/save-qualification', this.personalInformation)
                //  .then(response => {
                //      if(response.data.success){
                //          this.showQualificationForm = false;
                //          // this.showEmploymentForm = true;
                //          this.showEducationForm = true;
                //          this.errors = []
                //      }
                //      if(response.data.errors){
                //              this.errors = response.data.errors;
                //      }
                //      this.showLoader = false;
                //  })
                 // this.showLoader = true;
                 // if(this.personalInformation.qualification == 'school')
                 //     axios.post('/application-rejected', this.personalInformation)
                 //     .then(response => {
                 //         if(response.data.success){
                 //                 this.showQualificationForm = false;
                 //                 this.applicationRejected = true
                 //         }
                 //         this.showLoader = false;
                 //     }).catch(error => {
                 //         console.log(error);
                 //     });

            //     // }
            // },
            // saveEmployment: function(){
            //     this.showLoader = true;
            //     axios.post('/save-employment', this.personalInformation)
            //         .then(response => {
            //             if(response.data.success){
            //                 this.showEmploymentForm = false;
            //                 this.showOnJobForm = true;
            //                 this.errors = [];

            //             }
            //             if(response.data.errors){
            //                     this.errors = response.data.errors;
            //             }
            //             this.showLoader = false;
            //         });
            // },
            // saveJobTraining: function(){
            //     this.showLoader = true;
            //     axios.post('/save-jobTraining', this.personalInformation)
            //         .then(response => {
            //             if(response.data.success){
            //                 this.showOnJobForm = false;
            //                 this.showSocialForm = true;
            //                 this.errors = [];

            //             }
            //             if(response.data.errors){
            //                     this.errors = response.data.errors;
            //             }
            //             this.showLoader = false;
            //         });
            // },
            // saveSocial: function(){
            //     this.showLoader = true;
            //     axios.post('/save-social', this.personalInformation)
            //         .then(response => {
            //             if(response.data.success){
            //                 this.showSocialForm = false;
            //                 this.showUnemployedForm = true;
            //                 this.errors = [];

            //             }
            //             if(response.data.errors){
            //                     this.errors = response.data.errors;
            //             }
            //             this.showLoader = false;
            //         });
            // },
            validateEducation: function(){
                this.personalInformation.jobRole = $("#jobRoleSelect").val();
                this.personalInformation.role = $("#roleSelect").val();
                this.personalInformation.sector = $("#sectorSelect").val();
                 this.showLoader = true;
                axios.post('/save-education-field', this.personalInformation)
                    .then(response => {
                        if(response.data.success){
                            this.showEducationForm = false;
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
                axios.post('/save-unemployment', this.personalInformation)
                .then(response => {
                    if(response.data.success){
                       this.showUnemployedForm = false;
                       if(response.data.success == 'Application Rejected'){
                          this.applicationRejected = true;
                       }

                       if(response.data.success == 'Application Accepted'){
                          this.applicationAccepted = true;
                       }
                  //      if(this.personalInformation.gender == 'male' || this.personalInformation.qualification == 'primary' ||
                  //       this.personalInformation.qualification == 'high_school' ||
                  //               this.personalInformation.beenUnemployed == 'less_than_3_months'){
                  //               this.showLoader = true;
                  //               axios.post('/application-rejected', this.personalInformation)
                  //               .then(response => {
                  //                   if(response.data.success){
                  //                         //   this.uploadDocuments = false;
                  //                      this.applicationRejected = true;

                  //                   }
                  //                   this.showLoader = false;
                  //               }).catch(error => {
                  //                   console.log(error);
                  //               });
                  //           }else{
                  //              this.showLoader = true;
                  //              axios.post('/application-accepted', this.personalInformation)
                  //               .then(response => {
                  //                   if(response.data.success){
                  //                      this.applicationAccepted = true;
                  //                   }
                  //                   this.showLoader = false;
                  //               }).catch(error => {
                  //                   console.log(error);
                  //               });
                                
                  //           }
                  //       // this.showSocialForm = false;

                  //       // this.uploadDocuments = true;
                  //       this.errors = [];

                  //   }
                    }
                    if(response.data.errors){
                            this.errors = response.data.errors;
                    }
                    this.showLoader = false;
                });
            },
            handleCvUpload: function(){
                this.personalInformation.cv = this.$refs.cv.files[0];
                this.uploadCvText = this.$refs.cv.files[0].name;

            },
            handleCertificateUpload(){
                this.personalInformation.degreeCertificate = this.$refs.certificate.files[0];
                this.uploadDegree = this.$refs.certificate.files[0].name;
            },
            handleGosiUpload(){
                this.personalInformation.gosiEvidence = this.$refs.evidence.files[0];
                this.uploadGosi = this.$refs.evidence.files[0].name;
            },
            uploadFiles: function(){

                let formData = new FormData();
                formData.append('cv', this.personalInformation.cv);
                formData.append('degreeCertificate', this.personalInformation.degreeCertificate);
                formData.append('gosiEvidence', this.personalInformation.gosiEvidence);
                formData.append('id', this.personalInformation.id);

                this.showLoader = true;
                    axios.post('/upload-files', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {

                        if(response.data.success){
                            this.uploadDocuments = false;
                            if(this.personalInformation.gender == 'male' || this.personalInformation.qualification == 'school' ||
                                this.personalInformation.beenUnemployed == 'less_than_3_months'){
                                this.showLoader = true;
                                axios.post('/application-rejected', this.personalInformation)
                                .then(response => {
                                    if(response.data.success){
                                            this.uploadDocuments = false;
                                            this.applicationRejected = true;

                                    }
                                    this.showLoader = false;
                                }).catch(error => {
                                    console.log(error);
                                });
                            }else{
                                this.applicationAccepted = true;
                            }

                        }
                        if(response.data.errors){
                            this.errors = response.data.errors;
                        }
                        this.showLoader = false;
                    }).catch(error => {
                        console.log(error);
                    })
            }
        }
    }
</script>
