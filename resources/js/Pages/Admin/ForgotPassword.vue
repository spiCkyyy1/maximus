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
										<input type="email" class="form-control" placeholder="Email Address">
									</div>
									<div class="form-group mb-2">
										<button type="submit" class="btn btn-primary btn-block">Get New Password</button>
									</div>
									<div class="text-center small">
										Back to <InertiaLink :href="route('login')">Login</InertiaLink> your Account
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
    components:{
        AdminLayout
    }

}
</script>
