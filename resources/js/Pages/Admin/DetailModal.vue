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

						<div class="text-right" v-if="jobSeeker.email != NULL">{{jobSeeker.email}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Number</div>
						<div class="text-right" v-if="jobSeeker.mobile != NULL">{{jobSeeker.mobile}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Job Role</div>
						<div class="text-right" v-if="jobSeeker.job_role != NULL">{{humanize(jobSeeker.job_role)}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Role</div>
						<div class="text-right" v-if="jobSeeker.role != 'N/A'">{{jobSeeker.role}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Sector</div>
						<div class="text-right" v-if="jobSeeker.sector != 'N/A'">{{jobSeeker.sector}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Education Major</div>
						<div class="text-right" v-if="jobSeeker.education_major != 'N/A'">{{jobSeeker.education_major}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Education Field</div>
						<div class="text-right" v-if="jobSeeker.education_field != 'N/A'">{{jobSeeker.education_field}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">City</div>
						<div class="text-right" v-if="jobSeeker.city != NULL"> {{jobSeeker.city}}</div>
                        <div class="text-right" v-else> N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Region</div>
						<div class="text-right" v-if="jobSeeker.region != NULL">{{jobSeeker.region}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">NIN</div>
						<div class="text-right" v-if="jobSeeker.nin != NULL">{{jobSeeker.nin}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
					<li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Date of Birth</div>
						<div class="text-right" v-if="jobSeeker.dob != NULL">{{jobSeeker.dob}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Marital Status</div>
						<div class="text-right" v-if="jobSeeker.martial_status != NULL">{{humanize(jobSeeker.martial_status)}}</div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <!-- <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">CV</div>
						<div class="text-right" v-if="jobSeeker.cv != NULL">
                            <a :href="storageUrl + jobSeeker.id + '/' + jobSeeker.id+'-'+jobSeeker.cv" download target="_blank">{{jobSeeker.cv}}</a>
                        </div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Degree Certificate</div>
						<div class="text-right" v-if="jobSeeker.degree_certificate != NULL">
                        <a :href="storageUrl + jobSeeker.id + '/' + jobSeeker.id+'-'+jobSeeker.degree_certificate" download target="_blank">{{jobSeeker.degree_certificate}}</a>
                        </div>
                        <div class="text-right" v-else>N/A</div>
					</li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">GOSI Evidence</div>
						<div class="text-right" v-if="jobSeeker.gosi_evidence != NULL">
                            <a :href="storageUrl + jobSeeker.id + '/' + jobSeeker.id+'-'+jobSeeker.gosi_evidence" download target="_blank">{{jobSeeker.gosi_evidence}}</a>
                        </div>
                        <div class="text-right" v-else>N/A</div>
					</li> -->
                    <li class="list-group-item d-flex align-items-center justify-content-between">
						<div class="text-left">Message Sent</div>
						<div class="text-right">
							<div class="badge badge-grd-success" v-if="jobSeeker.message_sent == 1">Success</div>
							<div class="badge badge-grd-danger" v-else>Failed</div>
						</div>
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
    data(){
        return{
            storageUrl: window.location.origin + '/storage/'
        }
    },
    mounted(){
        if(this.jobSeeker != '' || this.jobSeeker.length != 0){
            $("#mcqs-modal").modal('show');
        }
    },
    methods:{
        humanize: function(str) {
            var i, frags = str.split('_');
            for (i=0; i<frags.length; i++) {
                frags[i] = frags[i].charAt(0).toUpperCase() + frags[i].slice(1);
            }
            return frags.join(' ');
        }
    }
}
</script>
