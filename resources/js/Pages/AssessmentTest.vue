<template>
   <layout>
      <div class="section section-qa section-custom section-custom-right secondary-bg">
         <div class="feature-background">
            <div class="fb-fill d-flex align-items-center bg-2" style="background-image: url('/images/banners/bg2.png');">
               <div class="feature-content w-100 px-5">
                  <img src="/images/banners/2.png" alt="" class="img-fluid hiring-img wow fadeInDown">
                  <div class="sec-title wow fadeInLeft">
                     <p class="sub-title white-text">{{partNo}}</p>
                     <h1 class="title white-text">{{testPhase}}</h1>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-box">
            <div class="feature-foreground wow fadeInRight">
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
                                 <div class="col title">{{step}} out of 66</div>
                                 <div class="col-auto sub-title">{{step}}%</div>
                              </div>
                           </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" :style="{'width': step+'%'}" :aria-valuenow="step" aria-valuemin="0" aria-valuemax="66"></div>
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
                           </div>
                        </div>
                        <div class="card" v-if="applicationRejected">
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
                        <readiness class="wow fadeInRight" :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" v-if="step == 1"
                        question="Do you have a recent work history?" option1="Never worked" step="1"
                        option2="Not worked within the last 6 months" option3="worked within the last 6 months"
                        value1="never_worked" value2="not_worked_within_six_months" value3="worked_within_six_months"
                        weighted_score1="0.5" weighted_score2="0" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="2" v-if="step == 2"
                        question="Can you start work in the next 30 days? When are you available to start work?" option1="No"
                        option2="Maybe" option3="Yes"
                        value1="no" value2="maybe" value3="yes"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="3" v-if="step == 3"
                        question="Are you limited by the number of hours that you can work? What are your prefered working hous?" option1="Limit to hours and days"
                        option2="I can work a standard week" option3="Would also consider evening shifts or weekends"
                        value1="hours_and_days" value2="week" value3="weekends"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="4" v-if="step == 4"
                        question="Do you have caring responsibilities that make it difficult to find work ( I.E Childcare/ Elderly person/ Disabled person)"
                        option1="Significant Responsibilities"
                        option2="Some Responsibilities" option3="None"
                        value1="significant_responsibilities" value2="some_responsibilities" value3="none"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="5" v-if="step == 5"
                        question="Do you need support with a current health condition to enable you to work?"
                        option1="Cannot work"
                        option2="Could work with support" option3="No support needed"
                        value1="cannot_work" value2="work_with_support" value3="no_support_needed"
                        weighted_score1="0" weighted_score2="0" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="6" v-if="step == 6"
                        question="Are your family supportive of you working?"
                        option1="Not Supportive"
                        option2="Neutral" option3="Very Supportive"
                        value1="not_supportive" value2="neutral" value3="very_supportive"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="7" v-if="step == 7"
                        question="Are you able to arrange your own transportation to work?"
                        option1="No Transport"
                        option2="Access to Transport" option3="Own Transport"
                        value1="no_transport" value2="access_to_transport" value3="own_transport"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="8" v-if="step == 8"
                        question="Would you work in a mixed working environment?"
                        option1="Not Willing"
                        option2="Don't Mind" option3="Yes Willing"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="9" v-if="step == 9"
                        question="Would you consider working in a role other than that of your qualification or experience?"
                        option1="Not Willing"
                        option2="Don't Mind" option3="Yes Willing"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="10" v-if="step == 10"
                        question="Do you have an up to date CV?"
                        option1="Don't have a CV"
                        option2="Needs updating" option3="Up to date"
                        value1="no_cv" value2="needs_updating" value3="yes_cv"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="11" v-if="step == 11"
                        question="Do you need support with job interviews?"
                        option1="A lot of support"
                        option2="A little bit of support" option3="No support"
                        value1="lot_of_support" value2="little_bit_of_support" value3="no_support"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="12" v-if="step == 12"
                        question="Are you willing to work as part of a team?"
                        option1="Not Willing"
                        option2="Don't Mind" option3="Yes Willing"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="13" v-if="step == 13"
                        question="Are you confident in using Microsoft office?"
                        option1="Not at all"
                        option2="Little confidence" option3="Very Confident"
                        value1="not_at_all" value2="little_confidence" value3="very_confident"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="14" v-if="step == 14"
                        question="Are you confident in working with numbers?"
                        option1="Not at all"
                        option2="Little confidence" option3="Very Confident"
                        value1="not_at_all" value2="little_confidence" value3="very_confident"
                        weighted_score1="0.5" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="15" v-if="step == 15"
                        question="Can you speak in English?"
                        option1="No English"
                        option2="Some English" option3="Fluent English"
                        value1="no_english" value2="some_english" value3="fluent_english"
                        weighted_score1="0.5" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="16" v-if="step == 16"
                        question="Can you read and write in English?"
                        option1="No English"
                        option2="Some English" option3="Fluent English"
                        value1="no_english" value2="some_english" value3="fluent_english"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="17" v-if="step == 17"
                        question="Do your living arrangements make it difficult for you to find work?"
                        option1="Very Difficult"
                        option2="Somewhat difficult" option3="Not at all difficult"
                        value1="very_difficult" value2="somewhat_difficult" value3="not_at_all_difficult"
                        weighted_score1="0.5" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="18" v-if="step == 18"
                        question="Are you willing to travel for 30 minutes or more to get to your work location?"
                        option1="Not at all"
                        option2="Willing" option3="Very willing"
                        value1="not_at_all" value2="willing" value3="very_willing"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="19" v-if="step == 19"
                        question="How difficult is it for you to get support with your caring responsibilities to enable you to work?"
                        option1="Very Difficult"
                        option2="Somewhat difficult" option3="Not at all difficult"
                        value1="very_difficult" value2="somewhat_difficult" value3="not_at_all_difficult"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="20" v-if="step == 20"
                        question="Are you confident you will find a job?"
                        option1="Not at all"
                        option2="Somewhat confidence" option3="Very Confident"
                        value1="not_at_all" value2="somewhat_confidence" value3="very_confident"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="21" v-if="step == 21"
                        question="How confident are you with using a computer and/ or smartphone?"
                        option1="Not at all"
                        option2="Little confidence" option3="Very Confident"
                        value1="not_at_all" value2="little_confidence" value3="very_confident"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="22" v-if="step == 22"
                        question="Do you believe you have any skills gaps in relation to your job goals/ preferences?"
                        option1="Yes"
                        option2="No" option3=""
                        value1="yes" value2="no" value3=""
                        weighted_score1="0.5" weighted_score2="1" weighted_score3="" competency="readiness" :error="error"
                        btnText="next"></readiness>

                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="23" v-if="step == 23"
                        question="Are you willing to move cities to secure a job?"
                        option1="Not willing"
                        option2="Somewhat willing" option3="Very willing"
                        value1="not_willing" value2="somewhat_willing" value3="very_willing"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="24" v-if="step == 24"
                        question="Are you often late for appointments and deadlines?"
                        option1="Often"
                        option2="Occassionally" option3="Never"
                        value1="often" value2="occassionally" value3="never"
                        weighted_score1="0" weighted_score2="0.5" weighted_score3="1" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="25" v-if="step == 25"
                        question="Do you have clear job goals?"
                        option1="Not clear"
                        option2="Somewhat clear" option3="Very clear"
                        value1="not_clear" value2="somewhat_clear" value3="very_clear"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="26" v-if="step == 26"
                        question="How many jobs have you applied for in the last 3 months?"
                        option1="0-5"
                        option2="6-10" option3="11+"
                        value1="0-5" value2="6-10" value3="11+"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="27" v-if="step == 27"
                        question="How many interviews have you had in the last three months?"
                        option1="0-5"
                        option2="6-10" option3="11+"
                        value1="0-5" value2="6-10" value3="11+"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="28" v-if="step == 28"
                        question="How willing would you be to work in a customer facing role?"
                        option1="Not willing"
                        option2="Don't mind" option3="Yes willing"
                        value1="not_willing" value2="dont_mind" value3="yes_willing"
                        weighted_score1="0" weighted_score2="1" weighted_score3="1.25" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <readiness :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="29" v-if="step == 29"
                        question="If we have the perfect vacancy, what do you believe is your number one barrier stopping you from Starting this tomorrow?"
                        option1="Family issues"
                        option2="Transportation" option3="Health Issues"
                        value1="family_issues" value2="transportation" value3="health_issues"
                        weighted_score1="" weighted_score2="" weighted_score3="" competency="readiness" :error="error"
                        btnText="next"></readiness>


                        <evaluation class="wow fadeInRight" :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="30" v-if="step == 30"
                        question="I possess sufficient resources to achieve my academic goals."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>


                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="31" v-if="step == 31"
                        question="I complete assigned work effectively and on time"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="32" v-if="step == 32"
                        question="I am able to clearly identify areas where I can improve."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="33" v-if="step == 33"
                        question="I am able to accurately describe a situation in writing."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="34" v-if="step == 34"
                        question="I am able to verbally articulate my thoughts and ideas."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"> </evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="35" v-if="step == 35"
                        question="I am willing to learn from my peers"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="36" v-if="step == 36"
                        question="I convey my thoughts to others clearly and respectfully."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>


                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="37" v-if="step == 37"
                        question="I demonstrate effective listening skills"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="38" v-if="step == 38"
                        question="I am able to learn from critical reflection."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="39" v-if="step == 39"
                        question="I am able to think critically and objectively about any given topic or situation."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="40" v-if="step == 40"
                        question="I take the initiative to discover new academic challenges."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="41" v-if="step == 41"
                        question="I am able to think critically while a teacher delivers a lesson."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="next"></evaluation>

                        <evaluation :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="42" v-if="step == 42"
                        question="I am able to write a persuasive essay, including a convincing thesis and solid evidence to support my claims."
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="evaluation" :error="error"
                        btnText="Submit"></evaluation>

                        <competencies class="wow fadeInRight" :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="43" v-if="step == 43"
                        question="Are you flexible and receptive regarding new ideas and approaches?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Adaptability" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="44" v-if="step == 44"
                        question="In response to unexpected events and the fluctuating demands of your job, do you adapt easily to plans, goals, and actions?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Adaptability" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="45" v-if="step == 45"
                        question="Do you cultivate positive relationships? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Collaboration" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="46" v-if="step == 46"
                        question="How willing are you to learn from others?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Collaboration" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="47" v-if="step == 47"
                        question="Do you recognize how personal behaviors and emotions impact others?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Collaboration" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="48" v-if="step == 48"
                        question="Do you convey your thoughts clearly and respectfully? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Communication" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="49" v-if="step == 49"
                        question="Do you demonstrate effective listening skills?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Communication" :error="error"
                        btnText="Next"></competencies>


                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="50" v-if="step == 50"
                        question="Are you self-motivated and able to build the trust of others?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Leadership Qualities" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="51" v-if="step == 51"
                        question="Can you inspire them to work toward a common goal?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Leadership Qualities" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="52" v-if="step == 52"
                        question="Do you acknowledge the contributions of others?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Leadership Qualities" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="53" v-if="step == 53"
                        question="Do you have the ability to make decisions for the right/ethical reasons? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Integrity" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="54" v-if="step == 54"
                        question="Do you practice honesty/integrity when fulfilling your work responsibilities?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Integrity" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="55" v-if="step == 55"
                        question="Do you promote an inclusive environment by showing respect for differences in lifestyle, viewpoint, race, nationality, ethnicity, religion, belief, sexual orientation, disability, and age? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Inclusivity" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="56" v-if="step == 56"
                        question="Are you accessible to others?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Responsiveness" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="57" v-if="step == 57"
                        question="Do you reach out in a timely and responsive manner? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Responsiveness" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="58" v-if="step == 58"
                        question="Are you diplomatic, courteous, and welcoming?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Responsiveness" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="59" v-if="step == 59"
                        question="Do you identify goals that are aligned with the organization’s strategic direction and achieve results accordingly ?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Results" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="60" v-if="step == 60"
                        question="Do you persist through significant difficulties to achieve those goals?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Results" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="61" v-if="step == 61"
                        question="Do you anticipate needs, solve problems, and take action, all without explicit instructions? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Initiative" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="62" v-if="step == 62"
                        question="Do you take the initiative to discover new work challenges and to help shape events that lead to the organization’s success?"
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Initiative" :error="error"
                        btnText="Next"></competencies>

                         <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="63" v-if="step == 63"
                        question="Are you committed to improving your knowledge and skills? What steps do you take to improve and develop your skills? "
                        option1="Very Confident"
                        option2="Fairly Confident" option3="Not Very Confident" option4="Not Confident"
                        value1="very_confident" value2="fairly_confident" value3="not_very_confident" value4="not_confident"
                        weighted_score1="1" weighted_score2="0.75" weighted_score3="0.5" weighted_score4="0.25" competency="Development" :error="error"
                        btnText="Next"></competencies>

                        <competencies :value="answer" v-on:updateAnswer="updateAnswer" v-on:submitAnswer="submitAnswer" step="64" v-if="step == 64"
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
                        btnText="Submit"></competencies>

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
                hideProgressBar: true,
                hideProcess: true
            }
        },
        methods: {
            updateAnswer({question, value, weightedScore, competency}){

                this.answerSelected = true;
                this.error = '';

                this.readinessAssessment.push({
                    question: question,
                    answer: value,
                    weightedScore: weightedScore,
                    competency: competency
                });
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
                this.step = stepVal;

                if(this.step == 30){
                    axios.post('/save-readiness', {readinessAssessment: this.readinessAssessment, jobSeekerId: this.jobSeekerId})
                    .then(response => {
                        if(response.data.success){
                            this.readinessPart = false;
                            this.evaluationPart = true;
                            this.readinessAssessment = [];
                            this.partNo = 'Part 2';
                            this.testPhase = 'Evaluation Test';
                        }

                    });
                }

                if(this.step == 43){
                    axios.post('/save-evaluation', {readinessAssessment: this.readinessAssessment, jobSeekerId: this.jobSeekerId})
                    .then(response => {
                        if(response.data.success){
                            this.evaluationPart = false;
                            this.competenciesPart = true;
                            this.readinessAssessment = [];
                            this.partNo = 'Part 3';
                            this.testPhase = 'Competencies Test';

                        }

                    });
                }

                if(this.step == 66){
                    axios.post('/save-competencies', {readinessAssessment: this.readinessAssessment, jobSeekerId: this.jobSeekerId})
                    .then(response => {
                        if(response.data.success){
                            this.competenciesPart = false;
                            this.applicationAccepted = true;
                            this.step = 100;
                            this.hideProgressBar = false;
                            this.hideProcess = false;
                        }

                    });
                }

                this.answerSelected = false;
                this.error = '';


            },
            created() {
            var self = this;
            window.onbeforeunload = function (e) {
                if(self.$route.path  == "/page3") {
                    e = e || window.event;
                    //old browsers
                    if (e) {e.returnValue = 'Changes you made may not be saved';}
                    //safari, chrome(chrome ignores text)
                    return 'Changes you made may not be saved';
                } else {
                    return null;
                }
        };
        if (performance.navigation.type == 1) {
            if(this.$route.path == '/page3') {
                this.$router.push({path: '/page1'})
                } else {
                console.log('reload page without redirect');
            }
        }
  }
        }
    }
</script>
