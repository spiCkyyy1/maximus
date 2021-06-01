<template>
<div class="wrap">

<div id="employer-form-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times"></i>
				</button>
				<h2 class="modal-title">Employer</h2>
			</div>

            <div class="alert alert-success" v-if="success">{{ success }}</div>

            <div v-if="$page.props.flash.success" class="alert alert-success" id="successMessage">
                {{ $page.props.flash.success }}
            </div>

            <form @submit.prevent="employerForm">
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label class="custom-label">Your Name</label>
                            <input type="text" class="form-control" v-model="form.name">
                            <div class="form-text small text-danger" v-if="errors.name">{{ errors.name }}</div>
                        </div>
                        <div class="form-group">
                            <label class="custom-label">Company Name</label>
                            <input type="text" class="form-control" v-model="form.companyName">
                            <div class="form-text small text-danger" v-if="errors.companyName">{{ errors.companyName }}</div>
                        </div>

                        <div class="form-group">
                            <label class="custom-label">Employment Sector</label>
                            <input type="text" class="form-control" v-model="form.employmentSector">
                            <div class="form-text small text-danger" v-if="errors.employmentSector">{{ errors.employmentSector }}</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Email</label>
                                    <input type="email" class="form-control" v-model="form.email">
                                    <div class="form-text small text-danger" v-if="errors.email">{{ errors.email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Head Quater (HQ) Location</label>
                                    <input type="text" class="form-control" v-model="form.hqLocation">

                                    <div class="form-text small text-danger" v-if="errors.hqLocation">{{ errors.hqLocation }}</div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Mobile #</label>
                                    <input type="text" class="form-control" v-model="form.mobileNumber">
                                    <div class="form-text small text-danger" v-if="errors.mobileNumber">{{ errors.mobileNumber }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label class="custom-label">Region</label>
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
                                    <label class="custom-label">No. of expected Vacancies</label>
                                    <input type="text" class="form-control" v-model="form.expectedVacancies">
                                    <div class="form-text small text-danger" v-if="errors.expectedVacancies">{{ errors.expectedVacancies }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">City</label>
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
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm" :disabled="form.processing">Apply</button>
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
						<ul class="lang-rtl">
							<li class="lang_switcher">

									<a class="icon-lang" href="?lang=arb">
										<span>AR</span>Lang
									</a>
									<!-- <a class="icon-lang" href="?lang=eng">
										<span>EN</span>Lang
									</a> -->
							</li>
						</ul>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item active">
                                <InertiaLink :href="route('landing')" class="nav-link">Home</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#about-us">About</a>
							</li>
							<li class="nav-item mr-0">
                                <InertiaLink :href="route('jobSeeker')" class="nav-link nav-btn btn-primary ">Job Seeker</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-btn btn-secondary active" href="#employer">Employer</a>
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
						<ul class="lang-rtl">
							<li class="lang_switcher">

									<a class="icon-lang" href="?lang=arb">
										<span>AR</span>Lang
									</a>
									<!-- <a class="icon-lang" href="?lang=eng">
										<span>EN</span>Lang
									</a> -->
							</li>
						</ul>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item active">
                                <InertiaLink :href="route('landing')" class="nav-link">Home</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="javascript:;" @click="redirectToAbout">About</a>
							</li>
							<li class="nav-item mr-0">
                                <InertiaLink :href="route('jobSeeker')" class="nav-link nav-btn btn-primary ">Job Seeker</InertiaLink>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-btn btn-secondary active" href="javascript:;" @click="redirectToEmployer">Employer</a>
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


				<footer id="footer" v-if="route().current() != 'assessmentTest'">
					<div class="content-box p-0">
						<div class="container-fluid">
							<div class="row align-items-center">
								<div class="col-sm">
									<ul class="links">
										<li><a class="nav-link" href="javascript:;" @click="redirectToAbout">About OJT</a></li>
                                        <li><inertiaLink :href="route('privacyPolicy')">Privacy Policy</inertiaLink></li>
										<li><inertiaLink :href="route('termsCondition')">Terms & Conditions</inertiaLink></li>
                                        <li><a href="https://www.maximusgulf.com/en/services" target="_blank">Our Services</a></li>
                                        <li><a href="https://www.maximusgulf.com/en/impact" target="_blank">Our Impact</a></li>
									</ul>
									<p class="mb-0">Copyright © Maximus 2021. All right reserved.</p>
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
export default {
    // mounted(){
    //     let file = document.createElement('link');
    //   file.rel = 'text/javascript';
    //   file.href = 'js/custom.js';
    //   document.head.appendChild(file);
    // },
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
