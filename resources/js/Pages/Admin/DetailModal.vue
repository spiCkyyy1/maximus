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
               <div class="container">
                   <div class="row">
                       <div class="col">
                           <h4>Email</h4>
                       </div>
                       <div class="col">
                            <span v-if="jobSeeker.email != null">{{jobSeeker.email}}</span>
                           <span v-else>N/A</span>
                       </div>
                       <div class="col">
                           <h4>Number</h4>
                       </div>
                       <div class="col">
                           <span v-if="jobSeeker.mobile != null">{{jobSeeker.mobile}}</span>
                           <span v-else>N/A</span>
                       </div>
                   </div>
                   <div class="row">
                        <div class="col">
                           <h4>City</h4>
                        </div>
                        <div class="col">
                            <span v-if="jobSeeker.city != null">{{jobSeeker.city}}</span>
                           <span v-else>N/A</span>
                       </div>
                       <div class="col">
                           <h4>Region</h4>
                       </div>
                       <div class="col">
                           <span v-if="jobSeeker.region != null">{{jobSeeker.region}}</span>
                           <span v-else>N/A</span>
                       </div>
                    </div>
                   <div class="row">
                       <div class="col">
                           <h4>NIN</h4>
                       </div>
                       <div class="col">
                           <span v-if="jobSeeker.nin != null">{{jobSeeker.nin}}</span>
                           <span v-else>N/A</span>
                       </div>
                       <div class="col">
                           <h4>Date of birth</h4>
                       </div>
                       <div class="col">
                            <span v-if="jobSeeker.dob != null">{{jobSeeker.dob}}</span>
                           <span v-else>N/A</span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <h4>Application Status</h4>
                       </div>
                       <div class="col">
                           <span class="badge badge-success text-bold" v-if="jobSeeker.status == 1">Accepted</span>
                           <span class="badge badge-danger text-bold" v-if="jobSeeker.status == 0">Rejected</span>
                       </div>
                   </div>
               </div>
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
