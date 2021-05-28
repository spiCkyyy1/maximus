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
                            <div style="color: white; fone-wight: bold" v-if="errors.name">{{ errors.name }}</div>
                        </div>
                        <div class="form-group">
                            <label class="custom-label">Region</label>
                            <div class="select-picker">
                                <select class="form-control" v-model="form.region">
                                    <option value="pakistan">Pakistan</option>
                                    <option value="india">India</option>
                                    <option value="japan">Japan</option>
                                </select>
                                <div style="color: white; fone-wight: bold" v-if="errors.region">{{ errors.region }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="custom-label">Company Name</label>
                            <input type="text" class="form-control" v-model="form.companyName">
                            <div style="color: white; fone-wight: bold" v-if="errors.companyName">{{ errors.companyName }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Email</label>
                                    <input type="email" class="form-control" v-model="form.email">
                                    <div style="color: white; fone-wight: bold" v-if="errors.email">{{ errors.email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Mobile #</label>
                                    <input type="text" class="form-control" v-model="form.mobileNumber">
                                    <div style="color: white; fone-wight: bold" v-if="errors.mobileNumber">{{ errors.mobileNumber }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Employment Sector</label>
                                    <input type="text" class="form-control" v-model="form.employmentSector">
                                    <div style="color: white; fone-wight: bold" v-if="errors.employmentSector">{{ errors.employmentSector }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">Head Quater (HQ) Location</label>
                                    <input type="text" class="form-control" v-model="form.hqLocation">

                                    <div style="color: white; fone-wight: bold" v-if="errors.hqLocation">{{ errors.hqLocation }}</div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">City</label>
                                    <input type="text" class="form-control" v-model="form.city">
                                    <div style="color: white; fone-wight: bold" v-if="errors.city">{{ errors.city }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="custom-label">No. of expected Vacancies</label>
                                    <input type="text" class="form-control" v-model="form.expectedVacancies">
                                    <div style="color: white; fone-wight: bold" v-if="errors.expectedVacancies">{{ errors.expectedVacancies }}</div>
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

<header id="header" class="header">
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
								<a class="nav-link" href="index.php#about-us">About</a>
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
<main>

<slot></slot>


				<footer class="section section-auto section-footer" id="footer">
					<div class="content-box p-0">
						<div class="footer-bottom">
							<div class="row align-items-center">
								<div class="col-sm">
									© Copyright 2020 <a href="index.php" class="th-text">Maximus</a> Company.
								</div>
								<div class="col-sm-auto">
									<ul class="social-icons">
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-youtube"></i></a></li>
										<li><a href="#"><i class="fab fa-instagram"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</footer>

			</main>

			<div id="scroll-to-top" title="Go to top" onclick="topFunction()">
				<img src="/images/icons/arrow.png">
			</div>

</div>
</template>

<script>
export default {
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
        },
    methods: {
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
        }
    }
}
</script>
