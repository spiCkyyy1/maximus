<template>
<div class="wrap">
<div id="mcqs-modal" :show="show" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<button type="button" class="close" v-on:click="$emit('closeModal', show)" aria-label="Close">
				<i class="icon-close"></i>
			</button>
			<div class="modal-body">
				<div class="modal-title">
					<i class="icon-user"></i>Candidate Details
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Email</div>

						<div class="text-right" v-if="jobSeeker.email != null">{{jobSeeker.email}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Number</div>
						<div class="text-right" v-if="jobSeeker.mobile != null">{{jobSeeker.mobile}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">City</div>
						<div class="text-right" v-if="jobSeeker.city != null"> {{jobSeeker.city}}</div>
                        <div class="text-right" v-else> N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Region</div>
						<div class="text-right" v-if="jobSeeker.region != null">{{jobSeeker.region}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">NIN</div>
						<div class="text-right" v-if="jobSeeker.nin != null">{{jobSeeker.nin}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Date of Birth</div>
						<div class="text-right" v-if="jobSeeker.dob != null">{{jobSeeker.dob}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Application Status</div>
						<div class="text-right">
							<div class="badge badge-grd-danger" v-if="jobSeeker.status == 'Rejected'">Rejected</div>
							<div class="badge badge-grd-success" v-if="jobSeeker.status == 'Selected'">Selected</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<script>
export default {
    props:{
        jobSeeker: Object,
        show: Boolean
    },
    mounted(){
        if(this.jobSeeker != '' || this.jobSeeker.length != 0){
            $("#mcqs-modal").modal('show');
        }
    }
}
</script>
