<template>

<div class="container">
				<div class="row">
					<div class="col">

						<div class="form">
							<div class="header d-flex align-items-center">
								<div class="logo">
									<InertiaLink href="#" class="logo-img"></InertiaLink>
                                    <!-- :href="route('landing')" -->
								</div>
							</div>
							<div class="body">
								<form @submit.prevent="submit">
                                    <div class="alert alert-success" v-if="success">{{ success }}</div>
                                    <div class="alert alert-danger" v-if="invalid_credentials">{{ invalid_credentials }}</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email Address" v-model="form.email">
                                            <div class="error-messages" v-if="errors.email">{{ errors.email }}</div>
									</div>
									<div class="form-group mb-2">
										<input type="password" class="form-control" placeholder="Password" v-model="form.password">
                                        <div class="error-messages" v-if="errors.password">{{ errors.password }}</div>
									</div>
									<div class="form-group">
										<div class="form-row align-items-center justify-content-between">
											<div class="col-auto mr-auto">
												<div class="custom-control custom-switch">
													<input type="checkbox" class="custom-control-input" id="switch1xs" v-model="form.remember">
													<label class="custom-control-label" for="switch1xs"></label>
												</div>
											</div>
											<div class="col-auto">
												<InertiaLink :href="route('forgotPassword')" class="small">Forget Password?</InertiaLink>
											</div>
										</div>
									</div>
									<div class="form-group mb-2">
										<button type="submit"  class="btn btn-primary btn-block" :disabled="form.processing">Login</button>
									</div>
									<div class="text-center small">
										Don't have an Account yet? <InertiaLink :href="route('register')">Register Now</InertiaLink>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>


</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
    export default {

        props: {
            errors: Object,
            success: Object,
            invalid_credentials: Object,
        },

        components: {
            AdminLayout
        },


        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('verifyLogin'), {
                        onFinish: () => this.form.reset('password'),
                        onSuccess: () => console.log(this.form.success),
                    })
            }
        }
    }
</script>
