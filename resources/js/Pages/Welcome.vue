<template>
<layout>

    <div class="section section-banner bg-1" id="home">
		<div class="content-box">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-xl-6">
						<div class="info-block wow fadeInUp mt-5">
							<div class="figure mb-5">
                                <!-- <img src="/images/logo-white.png" class="img-fluid" alt="..."> -->
                                <h1 class="white-text">
                                    <span class="th-text">{{__('landing_heading1')}}</span>
							    </h1>
							</div>
							<h1 class="white-text">
                                {{__('landing_join')}} <span class="th-text">{{__('landing_heading_orange')}} </span> {{__('landing_heading_white')}}.
							</h1>
							<div class="btn-action mt-5">
								<inertiaLink :href="route('jobSeeker')" class="btn btn-primary">{{__('landing_apply_now')}}<span class="icon"><i class="icon-arrow-right"></i></span></inertiaLink>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="/images/banners/1.png" alt="" class="img-block wow fadeInDown">
	</div>

	<!--Icons Boxes-->
	<div class="section section-auto bgc-1">
		<div class="content-box p-0">
			<div class="icon-boxes wow fadeInUp">
				<ul>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-organization"></i>
							</div>
							<div class="col">{{__('landing_point_1')}}</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-support"></i>
							</div>
							<div class="col">{{__('landing_point_2')}}</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-layers"></i>
							</div>
							<div class="col">{{__('landing_point_3')}}</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-list"></i>
							</div>
							<div class="col">{{__('landing_point_4')}}</div>
						</div>
					</li>
					<li>
						<div class="form-row align-items-center">
							<div class="col-auto">
								<i class="icon-notebook"></i>
							</div>
							<div class="col">{{__('landing_point_5')}}</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!--About Us-->
	<div class="section section-about" id="about-us">
		<div class="content-box">
			<div class="container">

				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="img-block">
							<img src="/images/banners/img1.png" alt="" class="img-fluid img-1 wow fadeInDown">
							<img src="/images/banners/img2.png" alt="" class="img-fluid img-2 wow fadeInUp">
							<div class="img-3 d-flex align-items-center wow fadeInUp">
								<div>
									<i class="icon-trophy"></i>
									<p class="mb-0">{{__('about_us_trophy')}}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="info-block">
							<div class="sec-title">
								<p class="sub-title">{{__('about_us')}}</p>
								<h1 class="title">{{__('about_us_title')}}</h1>
							</div>
							<p class="font-md">
								{{__('about_us_body')}}
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Services-->
	<div class="section section-services section-auto secondary-bg" id="services">
		<div class="content-box">
			<div class="container-fluid">

				<div class="services">
					<div class="sec-title text-center wow fadeInUp">
						<h1 class="title white-text">{{__('eligibility_criteria')}}</h1>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="icon-box">
								<i class="icon-user-female"></i>
								<div class="meta">
									<div class="heading white-text">{{__('eligibility_point_1')}}</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="icon-box">
								<i class="icon-graduation"></i>
								<div class="meta">
									<div class="heading white-text">{{__('eligibility_point_2')}}</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="icon-box">
								<i class="icon-briefcase"></i>
								<div class="meta">
									<div class="heading white-text">{{__('eligibility_point_3')}}</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Employer-->
	<div class="section section-auto section-js-e primary-bg" id="employer">
		<div class="content-box">
			<div class="container">
				<div class="row justify-content-center mt-5">
					<div class="col">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="card" data-eqh>
									<div class="icon">
										<img src="/images/icons/job-seeker.png" alt="" class="img-fluid">
									</div>
									<div class="text-center">
                                        <InertiaLink :href="route('jobSeeker')" as="buton" class="btn btn-primary">{{__('job_seeker')}}</InertiaLink>
									</div>
									<p class="mb-0">
                                        {{__('job_seeker_desc')}}
									</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card" data-eqh>
									<div class="icon">
										<img src="/images/icons/boss.png" alt="" class="img-fluid">
									</div>
									<div class="text-center">
										<button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#employer-form-modal">{{__('employer')}}</button>
									</div>
									<p class="mb-0">
                                        {{__('employer_desc')}}
									</p>
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
        mixins: [require('../base')],
        components: {
            Layout
        }
    }
</script>
