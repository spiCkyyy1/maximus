<template>
   <div class="card-footer">
      <div class="card-pagination">
         <div class="row align-items-center">
            <div class="col">
               <div class="card-pagination-count">
                  Showing {{metaData.from}} to {{metaData.per_page}} of {{metaData.total}} entries
               </div>
            </div>
            <div class="col-auto">
               <ul class="pagination justify-content-end">
                  <li class="page-item" :class="metaData.current_page == 1 ? 'disabled' : ''">
                     <a href="javascript:;" @click="$emit('getPaginatedDataByUrl', metaData.first_page_url)" class="page-link" tabindex="-1">First</a>
                  </li>
                  <li>
                     <a :class="metaData.prev_page_url == null ? 'disable-anchor' : ''" href="javascript:;" @click="$emit('getPaginatedDataByUrl', metaData.prev_page_url)" class="page-link">
                     <i class="icon-arrow-left small"></i></a>
                  </li>
                  <li class="page-item" :class="metaData.current_page == currentPage ? 'active' : ''"
                     v-for="currentPage in metaData.last_page" :key="currentPage">
                     <a href="javascript:;" class="page-link" @click="$emit('getPaginatedData', currentPage)" >{{currentPage}}</a>
                  </li>
                  <li>
                     <a :class="metaData.next_page_url == null ? 'disable-anchor' : ''" href="javascript:;" @click="$emit('getPaginatedDataByUrl', metaData.next_page_url)" class="page-link">
                     <i class="icon-arrow-right small"></i>
                     </a>
                  </li>
                  <li class="page-item" :class="metaData.current_page == metaData.last_page ? 'disabled' : ''">
                     <a href="javascript:;" class="page-link" @click="$emit('getPaginatedDataByUrl', metaData.last_page_url)">Last</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
export default {
    props:{
        metaData: Object,
        currentPage: Number,
    }

}
</script>
