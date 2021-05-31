<template>
<div class="wrap">
   <div id="assessment-modal" :show="show" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <button type="button" class="close" v-on:click="$emit('closeAssessmentModal')" aria-label="Close">
            <i class="icon-close"></i>
            </button>
            <div class="modal-body">
               <div class="modal-title">
                  <i class="icon-notebook"></i>{{title}}
               </div>
               <ul class="accordion mcqs-list th-list number drag-drop" id="faqs-list">
                  <li class="card mb-3" v-for="(data, k) in assessment" :key="k">
                     <div class="card-header">
                        <div class="row align-items-center">
                           <div class="col">
                              <div class="title">
                                 {{data.question}}
                              </div>
                           </div>
                           <div class="col-auto">
                              <div class="drag-cursor"></div>
                           </div>
                        </div>
                     </div>
                     <div id="card-1">
                        <div class="card-body">
                           <div class="check_radio style-2 mb-2">
                              <div class="radio">
                                 <input type="radio" class="cr-r1" :name="'radio'+k" checked>
                                 <label class="custom-label" :for="'cr-r1'+k">{{data.answer}}</label>
                              </div>
                           </div>
                           <!-- <div class="check_radio style-2 mb-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r2" name="radio1" checked>
                                 <label class="custom-label" for="cr-r2">Two</label>
                              </div>
                           </div>
                           <div class="check_radio style-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r3" name="radio1">
                                 <label class="custom-label" for="cr-r3">Two</label>
                              </div>
                           </div> -->
                        </div>
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
        assessment: Object,
        show: Boolean,
        title: String
    },
    mounted(){
        if(this.assessment != '' || this.assessment.length != 0){
            $("#assessment-modal").modal('show');
        }

        console.log(this.assessment);
    }
}
</script>
