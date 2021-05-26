<template>
    <div class="container">
				<div class="row">
					<div class="col">

						<div class="form">
							<div class="header d-flex align-items-center">
								<div class="logo">
									<InertiaLink :href="route('landing')" class="logo-img"></InertiaLink>
								</div>
							</div>
							<div class="body">
								<form>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Your Name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email Address">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group mb-2">
										<button type="submit" class="btn btn-primary btn-block">Register</button>
									</div>
									<div class="text-center small">
										Already have an Account? <InertiaLink :href="route('login')">Login Now</InertiaLink>
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
    components: {
        AdminLayout
    }
}
</script>
