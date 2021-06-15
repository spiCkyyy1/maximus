<template>
   <layout>
      <div class="section section-qa section-custom section-custom-right secondary-bg">
         <div class="feature-background">
            <div class="fb-fill d-flex align-items-center bg-2" style="background-image: url('/images/banners/bg2.png');">
               <div class="feature-content w-100 px-5">
                  <img src="/images/banners/2.png" alt="" class="img-fluid hiring-img wow fadeInDown">
                  <div class="sec-title wow fadeInLeft">
                     <p class="sub-title white-text">{{__(partNo)}}</p>
                     <h1 class="title white-text">{{__(testPhase)}}</h1>
                  </div>
                  <div class="row wow fadeInLeft">
                        <div class="col-8 col-lg-12">
                            <p class="font-md white-text">{{__(testDescription)}}</p>
                        </div>
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
               <ul class="process-steps-1" v-if="hideProcess">
                  <li :class="readinessPart ? 'active' : ''">
                     <a href=""><span>1</span></a>
                  </li>
                  <li :class="evaluationPart ? 'active' : ''">
                     <a href=""><span>2</span></a>
                  </li>
                  <li :class="competenciesPart ? 'active' : ''">
                     <a href=""><span>3</span></a>
                  </li>
               </ul>
               <div>
                  <div class="row justify-content-center" v-if="hideProgressBar">
                     <div class="col">
                        <div class="status-bar">
                           <div class="custom-label">
                              <div class="row">
                                 <div class="col title">{{__(step)}} {{__('out_of')}} {{__('63')}}</div>
                                 <div class="col-auto sub-title">{{progressBarPercentage}}%</div>
                              </div>
                           </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" :style="{'width': progressBarPercentage+'%'}" :aria-valuenow="progressBarPercentage" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="feature-content d-flex align-items-center">
                     <div>
                        <div class="card" v-if="applicationAccepted">
                           <div>
                              <div class="icon">
                                 <i class="icon-check alert-icon-success"></i>
                              </div>
                              <h6>{{__('thankyou_assessment')}}</h6>
                              <p class="font-md">
                                 {{__('assessment_email')}}
                              </p>

                              <inertiaLink :href="route('landing')" as="button" class="btn btn-primary mt-5" style="margin-left: 30%">{{__('go_to_website')}}</inertiaLink>
                           </div>
                        </div>
                        <div class="card" v-if="applicationRejected">
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
                        <readiness class="wow fadeInRight" :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" v-if="step == 1"
                        :question="__('q1')" questionForDb="Do you have a recent work history?" :option1="__('q1_o1')" step="1"
                        :option2="__('q1_o2')" :option3="__('q1_o3')"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        value1="never_worked" value2="not_worked_within_six_months" value3="worked_within_six_months"
                        weighted_score1="0.5" weighted_score2="0.25" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="2" v-if="step == 2"
                        :question="__('q2')" :option1="__('q2_o1')" questionForDb="Can you start work in the next 30 days? When are you available to start work?"
                        :option2="__('q2_o2')" :option3="__('q2_o3')"
                        value1="no" value2="maybe" value3="yes"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="3" v-if="step == 3"
                        :question="__('q3')" :option1="__('q3_o1')" questionForDb="Are you limited by the number of hours that you can work? What are your prefered working hours?"
                        :option2="__('q3_o2')" :option3="__('q3_o3')"
                        value1="hours_and_days" value2="week" value3="weekends"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="4" v-if="step == 4"
                        :question="__('q4')" questionForDb="Do you have caring responsibilities that make it difficult to find work ( I.E Childcare/ Elderly person/ Disabled person)"
                        :option1="__('q4_o1')"
                        :option2="__('q4_o2')" :option3="__('q4_o3')"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        value1="significant_responsibilities" value2="some_responsibilities" value3="none"
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="5" v-if="step == 5"
                        :question="__('q5')" questionForDb="Do you need support with a current health condition to enable you to work?"
                        :option1="__('q5_o1')"
                        :option2="__('q5_o2')" :option3="__('q5_o3')"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        value1="cannot_work" value2="work_with_support" value3="no_support_needed"
                        weighted_score1="0.25" weighted_score2="0.25" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="6" v-if="step == 6"
                        :question="__('q6')" questionForDb="Are your family supportive of you working?"
                        :option1="__('q6_o1')"
                        :option2="__('q6_o2')" :option3="__('q6_o3')"
                        value1="not_supportive" value2="neutral" value3="very_supportive"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="7" v-if="step == 7"
                        :question="__('q7')" questionForDb="Are you able to arrange your own transportation to work?"
                        :option1="__('q7_o1')"
                        :option2="__('q7_o2')" :option3="__('q7_o3')"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        value1="no_transport" value2="access_to_transport" value3="own_transport"
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="8" v-if="step == 8"
                        :question="__('q8')" questionForDb="Would you work in a mixed working environment?"
                        :option1="__('q8_o1')"
                        :option2="__('q8_o2')" :option3="__('q8_o3')"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="9" v-if="step == 9"
                        :question="__('q9')" questionForDb="Would you consider working in a role other than that of your qualification or experience?"
                        :option1="__('q9_o1')"
                        :option2="__('q9_o2')" :option3="__('q9_o3')"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="10" v-if="step == 10"
                        :question="__('q10')" questionForDb="Do you have an up to date CV?"
                        :option1="__('q10_o1')"
                        :option2="__('q10_o2')" :option3="__('q10_o3')"
                        value1="no_cv" value2="needs_updating" value3="yes_cv"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="11" v-if="step == 11"
                        :question="__('q11')" questionForDb="Do you need support with job interviews?"
                        :option1="__('q11_o1')"
                        :option2="__('q11_o2')" :option3="__('q11_o3')"
                        value1="lot_of_support" value2="little_bit_of_support" value3="no_support"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="12" v-if="step == 12"
                        :question="__('q12')" questionForDb="Are you willing to work as part of a team?"
                        :option1="__('q12_o1')"
                        :option2="__('q12_o2')" :option3="__('q12_o3')"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="13" v-if="step == 13"
                        :question="__('q13')" questionForDb="Are you confident in using Microsoft office?"
                        :option1="__('q13_o1')"
                        :option2="__('q13_o2')" :option3="__('q13_o3')"
                        value1="not_at_all" value2="little_confidence" value3="very_confident"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="14" v-if="step == 14"
                        :question="__('q14')" questionForDb="Are you confident in working with numbers?"
                        :option1="__('q14_o1')"
                        :option2="__('q14_o2')" :option3="__('q14_o3')"
                        value1="not_at_all" value2="little_confidence" value3="very_confident"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="15" v-if="step == 15"
                        :question="__('q15')" questionForDb="Can you speak in English?"
                        :option1="__('q15_o1')"
                        :option2="__('q15_o2')" :option3="__('q15_o3')"
                        value1="no_english" value2="some_english" value3="fluent_english"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="16" v-if="step == 16"
                        :question="__('q16')" questionForDb="Can you read and write in English?"
                        :option1="__('q16_o1')"
                        :option2="__('q16_o2')" :option3="__('q16_o3')"
                        value1="no_english" value2="some_english" value3="fluent_english"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="17" v-if="step == 17"
                        :question="__('q17')" questionForDb="Do your living arrangements make it difficult for you to find work?"
                        :option1="__('q17_o1')"
                        :option2="__('q17_o2')" :option3="__('q17_o3')"
                        value1="very_difficult" value2="somewhat_difficult" value3="not_at_all_difficult"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="18" v-if="step == 18"
                        :question="__('q18')" questionForDb="Are you willing to travel for 30 minutes or more to get to your work location?"
                        :option1="__('q18_o1')"
                        :option2="__('q18_o2')" :option3="__('q18_o3')"
                        value1="not_at_all" value2="willing" value3="very_willing"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.5" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="19" v-if="step == 19"
                        :question="__('q19')" questionForDb="How difficult is it for you to get support with your caring responsibilities to enable you to work?"
                        :option1="__('q19_o1')"
                        :option2="__('q19_o2')" :option3="__('q19_o3')"
                        value1="very_difficult" value2="somewhat_difficult" value3="not_at_all_difficult"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="20" v-if="step == 20"
                        :question="__('q20')" questionForDb="Are you confident you will find a job?"
                        :option1="__('q20_o1')"
                        :option2="__('q20_o2')" :option3="__('q20_o3')"
                        value1="not_at_all" value2="somewhat_confidence" value3="very_confident"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="21" v-if="step == 21"
                        :question="__('q21')" questionForDb="How confident are you with using a computer and/ or smartphone?"
                        :option1="__('q21_o1')"
                        :option2="__('q21_o2')" :option3="__('q21_o3')"
                        value1="not_at_all" value2="little_confidence" value3="very_confident"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="22" v-if="step == 22"
                        :question="__('q22')" questionForDb="Do you believe you have any skills gaps in relation to your job goals/ preferences?"
                        :option1="__('q22_o1')"
                        :option2="__('q22_o2')" option3=""
                        value1="yes" value2="no" value3=""
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.5" weighted_score2="1" weighted_score3="" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="23" v-if="step == 23"
                        :question="__('q23')" questionForDb="Are you willing to move cities to secure a job?"
                        :option1="__('q23_o1')"
                        :option2="__('q23_o2')" :option3="__('q23_o3')"
                        value1="not_willing" value2="somewhat_willing" value3="very_willing"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="24" v-if="step == 24"
                        :question="__('q24')" questionForDb="Are you often late for appointments and deadlines?"
                        :option1="__('q24_o1')"
                        :option2="__('q24_o2')" :option3="__('q24_o3')"
                        value1="often" value2="occassionally" value3="never"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="25" v-if="step == 25"
                        :question="__('q25')" questionForDb="Do you have clear job goals?"
                        :option1="__('q25_o1')"
                        :option2="__('q25_o2')" :option3="__('q25_o3')"
                        value1="not_clear" value2="somewhat_clear" value3="very_clear"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="26" v-if="step == 26"
                        :question="__('q26')" questionForDb="How many jobs have you applied for in the last 3 months?"
                        :option1="__('q26_o1')"
                        :option2="__('q26_o2')" :option3="__('q26_o3')"
                        value1="0-5" value2="6-10" value3="11+"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="27" v-if="step == 27"
                        :question="__('q27')" questionForDb="How many interviews have you had in the last three months?"
                        :option1="__('q27_o1')"
                        :option2="__('q27_o2')" :option3="__('q27_o3')"
                        value1="0-5" value2="6-10" value3="11+"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="28" v-if="step == 28"
                        :question="__('q28')" questionForDb="How willing would you be to work in a customer facing role?"
                        :option1="__('q28_o1')"
                        :option2="__('q28_o2')" :option3="__('q28_o3')"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        option4="" option5="" option6="" option7="" option8=""
                        value4="" value5="" value6="" value7="" value8=""
                        weighted_score1="0.25" weighted_score2="0.75" weighted_score3="1" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="29" v-if="step == 29"
                        :question="__('q29')" questionForDb="If we have the perfect vacancy, what do you believe is your number one barrier stopping you from Starting this tomorrow?"
                        :option1="__('q29_o1')"
                        :option2="__('q29_o2')" :option3="__('q29_o3')" :option4="__('q29_o4')" :option5="__('q29_o5')" :option6="__('q29_o6')"
                        :option7="__('q29_o7')" :option8="__('q29_o8')"
                        value1="family_issues" value2="transportation" value3="health_issues" value4="location" value5="education"
                        value6="experience" value7="qualifications" value8="no_barriers"
                        weighted_score1="" weighted_score2="" weighted_score3="" competency="readiness" :error="error"
                        :btnText="__('next')"></readiness>


                        <evaluation class="wow fadeInRight" :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="30" v-if="step == 30"
                        :question="__('q30')" questionForDb="I possess sufficient resources to achieve my academic goals."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>


                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="31" v-if="step == 31"
                        :question="__('q31')" questionForDb="I complete assigned work effectively and on time."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="32" v-if="step == 32"
                        :question="__('q32')" questionForDb="I am able to clearly identify areas where I can improve."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="33" v-if="step == 33"
                        :question="__('q33')" questionForDb="I am able to accurately describe a situation in writing."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="34" v-if="step == 34"
                        :question="__('q34')" questionForDb="I am able to verbally articulate my thoughts and ideas."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"> </evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="35" v-if="step == 35"
                        :question="__('q35')" questionForDb="I am willing to learn from my peers."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="36" v-if="step == 36"
                        :question="__('q36')" questionForDb="I convey my thoughts to others clearly and respectfully."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>


                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="37" v-if="step == 37"
                        :question="__('q37')" questionForDb="I demonstrate effective listening skills"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="38" v-if="step == 38"
                        :question="__('q38')" questionForDb="I am able to learn from critical reflection."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="39" v-if="step == 39"
                        :question="__('q39')" questionForDb="I am able to think critically and objectively about any given topic or situation."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="40" v-if="step == 40"
                        :question="__('q40')" questionForDb="I take the initiative to discover new academic challenges."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="41" v-if="step == 41"
                        :question="__('q41')" questionForDb="I am able to think critically while a teacher delivers a lesson."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        :btnText="__('next')"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="42" v-if="step == 42"
                        :question="__('q42')" questionForDb="I am able to write a persuasive essay, including a convincing thesis and solid evidence to support my claims."
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="Submit"></evaluation>

                        <competencies class="wow fadeInRight" :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="43" v-if="step == 43"
                        :question="__('q43')" questionForDb="Are you flexible and receptive regarding new ideas and approaches?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Adaptability" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="44" v-if="step == 44"
                        :question="__('q44')" questionForDb="In response to unexpected events and the fluctuating demands of your job, do you adapt easily to plans, goals, and actions?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Adaptability" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="45" v-if="step == 45"
                        :question="__('q45')" questionForDb="Do you cultivate positive relationships?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Collaboration" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="46" v-if="step == 46"
                        :question="__('q46')" questionForDb="How willing are you to learn from others?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Collaboration" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="47" v-if="step == 47"
                        :question="__('q47')" questionForDb="Do you recognize how personal behaviours and emotions impact others?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Collaboration" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="48" v-if="step == 48"
                        :question="__('q48')" questionForDb="Do you convey your thoughts clearly and respectfully?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Communication" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="49" v-if="step == 49"
                        :question="__('q49')" questionForDb="Do you demonstrate effective listening skills?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Communication" :error="error"
                        :btnText="__('next')"></competencies>


                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="50" v-if="step == 50"
                        :question="__('q50')" questionForDb="Are you self-motivated and able to build the trust of others?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Leadership Qualities" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="51" v-if="step == 51"
                        :question="__('q51')" questionForDb="Can you inspire them to work toward a common goal?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Leadership Qualities" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="52" v-if="step == 52"
                        :question="__('q52')" questionForDb="Do you acknowledge the contributions of others?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Leadership Qualities" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="53" v-if="step == 53"
                        :question="__('q53')" questionForDb="Do you have the ability to make decisions for the right/ethical reasons?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Integrity" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="54" v-if="step == 54"
                        :question="__('q54')" questionForDb="Do you practice honesty/integrity when fulfilling your work responsibilities?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Integrity" :error="error"
                        :btnText="__('next')"></competencies>

                        <!-- <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="55" v-if="step == 55"
                        question="Do you promote an inclusive environment by showing respect for differences in lifestyle, viewpoint, race, nationality, ethnicity, religion, belief, sexual orientation, disability, and age? "
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Inclusivity" :error="error"
                        :btnText="__('next')"></competencies> -->

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="55" v-if="step == 55"
                        :question="__('q55')" questionForDb="Are you accessible to others?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Responsiveness" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="56" v-if="step == 56"
                        :question="__('q56')" questionForDb="Do you reach out in a timely and responsive manner?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Responsiveness" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="57" v-if="step == 57"
                        :question="__('q57')" questionForDb="Are you diplomatic, courteous, and welcoming?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Responsiveness" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="58" v-if="step == 58"
                        :question="__('q58')" questionForDb="Do you identify goals that are aligned with the organization's strategic direction and achieve results accordingly?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Results" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="59" v-if="step == 59"
                        :question="__('q59')" questionForDb="Do you persist through significant difficulties to achieve those goals?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Results" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="60" v-if="step == 60"
                        :question="__('q60')" questionForDb="Do you anticipate needs, solve problems, and take action, all without explicit instructions?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Initiative" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="61" v-if="step == 61"
                        :question="__('q61')" questionForDb="Do you take the initiative to discover new work challenges and to help shape events that lead to the organization's success?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Initiative" :error="error"
                        :btnText="__('next')"></competencies>

                         <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="62" v-if="step == 62"
                        :question="__('q62')" questionForDb="Are you committed to improving your knowledge and skills?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Development" :error="error"
                        :btnText="__('next')"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="63" v-if="step == 63"
                        :question="__('q63')" questionForDb="What steps do you take to improve and develop your skills?"
                        :option1="__('very_confident')"
                        :option2="__('confident')" :option3="__('neutral')" :option4="__('not_confident')"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Development" :error="error"
                        :btnText="__('next')"></competencies>

                        <!-- <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="64" v-if="step == 64"
                        question="What are your major accomplishments during this review period?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Accomplishments" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="65" v-if="step == 65"
                        question="Identify areas for development and improvement that you can accomplish in the next review period."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Growth" :error="error"
                        btnText="Submit"></competencies> -->

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
import Readiness from '../Pages/Readiness'
import Evaluation from '../Pages/Evaluation'
import Competencies from '../Pages/Competencies'

    export default {
        components: {
            Layout,
            Readiness,
            Evaluation,
            Competencies
        },
        mixins: [require('../base')],
        props: {
            jobSeekerId: String
        },
        data(){
            return{
                readinessPart: true,
                evaluationPart: false,
                competenciesPart: false,
                applicationAccepted: false,
                applicationRejected: false,
                readinessAssessment: [],
                answer: '',
                step: 1,
                error: '',
                answerSelected: false,
                partNo: 'Part 1',
                testPhase: 'Readiness Test',
                testDescription: 'This will identify Motivation, Attitude, Work Ethic, Commitment and Availability based on a series of questions.',
                hideProgressBar: true,
                hideProcess: true,
                showLoader: false,
                progressBarPercentage: '1'
            }
        },
        methods: {
            updateAnswer({question, value, weightedScore, competency}){

                this.answerSelected = true;
                this.error = '';

                if(typeof weightedScore !== undefined){

                    this.readinessAssessment.push({
                    question: question,
                    answer: value,
                    weightedScore: weightedScore,
                    competency: competency
                });

                }


            },
            submitAnswer: function(stepVal){
                if(!this.answerSelected){
                    this.error = 'Please select any option.';
                    // swal(
                    //     'Error',
                    //     'Please select any answer!',
                    //     'error'
                    // )
                    return;
                }
                stepVal++;
                this.progressBarPercentage = Math.floor((this.step / 63) * 100, 2);
                this.step = stepVal;

                if(this.step == 30){
                    this.showLoader = true;
                    axios.post('/save-readiness', {readinessAssessment: this.readinessAssessment, jobSeekerId: this.jobSeekerId})
                    .then(response => {
                        console.log(response);
                        if(response.data.success){
                            this.readinessPart = false;
                            this.evaluationPart = true;
                            this.readinessAssessment = [];
                            this.partNo = 'Part 2';
                            this.testPhase = 'Evaluation Test';
                            this.testDescription = 'Completing a Self- evaluation is a pro-active way to articulate what you’ve accomplished and identify where you would like to grow.';
                        }
                        this.showLoader = false;

                    }).catch(error => {
                        this.showLoader = false;
                        console.log(error);
                    });
                }

                if(this.step == 43){
                    this.showLoader = true;
                    axios.post('/save-evaluation', {readinessAssessment: this.readinessAssessment, jobSeekerId: this.jobSeekerId})
                    .then(response => {
                        console.log(response);
                        if(response.data.success){
                            this.evaluationPart = false;
                            this.competenciesPart = true;
                            this.readinessAssessment = [];
                            this.partNo = 'Part 3';
                            this.testPhase = 'Competencies Test';
                            this.testDescription = 'This will highlight the competence you excel at and identify competencies you can build on.';
                        }
                        this.showLoader = false;

                    }).catch(error => {
                        this.showLoader = false;
                        console.log(error);
                    });
                }

                if(this.step == 64){
                    this.showLoader = true;
                    axios.post('/save-competencies', {readinessAssessment: this.readinessAssessment, jobSeekerId: this.jobSeekerId})
                    .then(response => {
                        console.log(response);
                        if(response.data.success){
                            this.competenciesPart = false;
                            this.applicationAccepted = true;
                            setTimeout(() => {
                                this.step = 100;
                            }, 1000);

                            this.hideProgressBar = false;
                            this.hideProcess = false;

                        }
                        this.showLoader = false;

                    }).catch(error => {
                        this.showLoader = false;
                        console.log(error);
                    });
                }

                this.answerSelected = false;
                this.error = '';


            }
        }
    }
</script>
