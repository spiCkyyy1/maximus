<template>
<div class="wrap">

<div id="employer-form-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times"></i>
				</button>
				<h2 class="modal-title">{{__('employer_form_heading')}}</h2>
			</div>

            <div class="alert alert-success" v-if="success">{{ success }}</div>

            <div v-if="$page.props.flash.success" class="alert alert-success" id="successMessage">
                {{ $page.props.flash.success }}
            </div>

            <form @submit.prevent="employerForm">
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label class="custom-label">{{__('employer_your_name')}}</label>
                            <input type="text" class="form-control" v-model="form.name">
                            <div class="form-text small text-danger" v-if="errors.name">{{ errors.name }}</div>
                        </div>
                        <div class="form-group">
                            <label class="custom-label">{{__('employer_company_name')}}</label>
                            <input type="text" class="form-control" v-model="form.companyName">
                            <div class="form-text small text-danger" v-if="errors.companyName">{{ errors.companyName }}</div>
                        </div>

                        <div class="form-group">
                            <label class="custom-label">{{__('employer_employment_Sector')}}</label>
                            <input type="text" class="form-control" v-model="form.employmentSector">
                            <div class="form-text small text-danger" v-if="errors.employmentSector">{{ errors.employmentSector }}</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">{{__('employer_email')}}</label>
                                    <input type="email" class="form-control" v-model="form.email">
                                    <div class="form-text small text-danger" v-if="errors.email">{{ errors.email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">{{__('employer_hq')}}</label>
                                    <input type="text" class="form-control" v-model="form.hqLocation">

                                    <div class="form-text small text-danger" v-if="errors.hqLocation">{{ errors.hqLocation }}</div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">{{__('employer_mobile_no')}}</label>
                                    <input type="text" class="form-control" v-model="form.mobileNumber">
                                    <div class="form-text small text-danger" v-if="errors.mobileNumber">{{ errors.mobileNumber }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label class="custom-label">{{__('employer_region')}}</label>
                                <div class="select-option">
                                    <select class="form-control" v-model="form.region">
                                        <option v-for="(region, k) in regions" :key="k" :value="region.value">{{region.text}}</option>
                                    </select>
                                    <div class="form-text small text-danger" v-if="errors.region">{{ errors.region }}</div>
                                </div>
                            </div>
                        </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">{{__('employer_expected_vac')}}</label>
                                    <input type="text" class="form-control" v-model="form.expectedVacancies">
                                    <div class="form-text small text-danger" v-if="errors.expectedVacancies">{{ errors.expectedVacancies }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">{{__('employer_city')}}</label>
                                        <div class="select-option">
                                            <select class="form-control" v-model="form.city">
                                                <option v-for="(city, k) in cities" :key="k" :value="city.value">{{city.text}}</option>
                                            </select>
                                            <div class="form-text small text-danger" v-if="errors.city">{{ errors.city }}</div>
                                        </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{__('employer_cancel')}}</button>
                    <button type="submit" class="btn btn-primary btn-sm" :disabled="form.processing">{{__('employer_apply')}}</button>
                </div>
            </form>
		</div>
	</div>
</div>
<header id="header" class="header" v-if="route().current() == 'landing'">
	<div class="container">
		<div class="row">
			<div class="col">
				<nav class="navbar navbar-expand-lg">
					<div class="p-rel">
						<inertiaLink :href="route('landing')" class="navbar-brand">
							<img src="/images/logo-white.png" class="img-fluid" alt="">
						</inertiaLink>
						<language-selector></language-selector>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item active">
                                <InertiaLink :href="route('landing')" class="nav-link">{{__('header_home')}}</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#about-us">{{__('header_about')}}</a>
							</li>
							<li class="nav-item mr-0">
                                <InertiaLink :href="route('jobSeeker')" class="nav-link nav-btn btn-primary ">{{__('header_jobseeker')}}</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-btn btn-secondary active" href="#employer">{{__('header_employer')}}</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<header id="header" class="header header-static" v-if="route().current() != 'assessmentTest' && route().current() != 'landing'">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<nav class="navbar navbar-expand-lg">
					<div class="p-rel">
						<inertiaLink :href="route('landing')" class="navbar-brand">
							<img src="/images/logo.png" class="img-fluid" alt="">
						</inertiaLink>
						<language-selector></language-selector>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item active">
                                <InertiaLink :href="route('landing')" class="nav-link">{{__('header_home')}}</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="javascript:;" @click="redirectToAbout">{{__('header_about')}}</a>
							</li>
							<li class="nav-item mr-0">
                                <InertiaLink :href="route('jobSeeker')" class="nav-link nav-btn btn-primary ">{{__('header_jobseeker')}}</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-btn btn-secondary active" href="javascript:;" @click="redirectToEmployer">{{__('header_employer')}}</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<main>

<slot></slot>
<div class="th-loader loader-page" id="frontEndloader" style="display: none">
    <svg class="spinner-container" viewBox="0 0 52 52">
    <circle class="path" cx="26px" cy="26px" r="20px" fill="none" />
    </svg>
</div>


				<footer id="footer" v-if="route().current() != 'assessmentTest'">
					<div class="content-box p-0">
						<div class="container-fluid">
							<div class="row align-items-center">
								<div class="col-sm">
									<ul class="links">
										<li><a class="nav-link" href="javascript:;" @click="redirectToAbout">{{__('footer_about')}}</a></li>
                                        <li><inertiaLink :href="route('privacyPolicy')">{{__('footer_privacy')}}</inertiaLink></li>
										<li><inertiaLink :href="route('termsCondition')">{{__('footer_terms')}}</inertiaLink></li>
                                        <li><a href="https://www.maximusgulf.com/en/services" target="_blank">{{__('footer_services')}}</a></li>
                                        <li><a href="https://www.maximusgulf.com/en/impact" target="_blank">{{__('footer_impact')}}</a></li>
									</ul>
									<p class="mb-0">{{__('footer_copyright')}}</p>
								</div>
								<div class="col-sm-auto">
									<ul class="social-icons">
										<li><a href="https://www.youtube.com/user/MAXIMUScorporate" target="_blank"><i class="fab fa-youtube"></i></a></li>
										<li><a href="https://twitter.com/MAXIMUS_news" target="_blank"><i class="fab fa-twitter"></i></a></li>
										<li><a href="https://www.linkedin.com/company/maximus/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</footer>

			</main>

			<div id="scroll-to-top" title="Go to top" @click="topFunction">
				<img src="/images/icons/arrow.png">
			</div>

</div>
</template>

<script>
import languageSelector from '../Shared/LanguageSelector'
export default {
    components:{
        languageSelector
    },
    mixins: [require('../base')],
    data(){
        return{
            form: this.$inertia.form({
                name: '',
                region: 'pakistan',
                companyName: '',
                email: '',
                mobileNumber: '',
                employmentSector: '',
                hqLocation: '',
                city: '',
                expectedVacancies: ''
            })
        }
    },
    props: {
            errors: Object,
            success: Object,
            regions: Object,
            cities: Object
        },
    methods: {
        topFunction(){
            $('body,html').animate({
                    scrollTop : 0
                }, 500);
        },
        employerForm: function(){
            this.form
                    .post(this.route('employerForm'), {
                        preserveScroll: true,
                        onSuccess: (response) => {

                            if(this.$page.props.flash.success != ''){
                                this.form.reset();
                                setTimeout(() => {
                                    $("#employer-form-modal").modal('hide');
                                    $("#successMessage").css("display", "none");
                                }, 2000);


                            }

                        }
                    })
        },
        redirectToEmployer: function(){
            var base_url = window.location.origin;
            window.location.href = base_url+'#employer';
        },
        redirectToAbout: function(){
            var base_url = window.location.origin;
            window.location.href = base_url+'#about-us';
        }
    }
}
</script>
