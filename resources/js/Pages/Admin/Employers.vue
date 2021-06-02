<template>
    <admin-layout>
        <div class="card table-card" v-if="dataLoaded && employers.data.length > 0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="title"><i class="icon-people"></i>Employers</div>
                    </div>
                    <div class="col-auto">
                        <a href="javascript:;" class="btn btn-primary ml-1" @click="excelDownload"><i class="icon-doc fa-lg fa-r"></i>Export</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="55px">#</th>
                                <th width="150px">Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Employment Sector</th>
                                <th>Head Quater Location</th>
                                <th>City</th>
                                <th>Expected Vacancies</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(employer, k) in employers.data" :key="k">
                                <td>{{employer.id}}</td>
                                <td class="strong">{{employer.name}} </td>
                                <td >{{employer.company_name}}</td>
                                <td >{{employer.email}}</td>
                                <td >{{employer.number}}</td>
                                <td >{{employer.employment_sector}}</td>
                                <td >{{employer.hq_location}}</td>
                                <td >{{employer.city}}</td>
                                <td >{{employer.expected_vacancies}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <pagination :metaData="employers" v-on:getPaginatedData="getPaginatedData"
                v-on:getPaginatedDataByUrl="getPaginatedDataByUrl"></pagination>
        </div>
        <div v-else><not-found></not-found></div>
    </admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
import NotFound from '../Admin/NotFound'
import Pagination from '../Admin/TablePagination'
export default {
    components:{
        AdminLayout,
        Pagination,
        NotFound
    },
    mounted(){
        this.getPaginatedData(this.currentPage);
    },
    data(){
        return{
            dataLoaded: false,
            employers: {},
            getEmployersUrl: '/admin/get-employers',
            currentPage: 1
        }
    },
    methods: {
        getPaginatedData: function(page){
            $("#loader").css("display", "block");
            axios.post(this.getEmployersUrl+'?page='+page)
            .then(response => {
                console.log(response);
                if(response.data.success){
                    $("#loader").css("display", "none");
                    this.employers = response.data.success;
                    this.dataLoaded = true;
                }

            });
        },
        getPaginatedDataByUrl: function(url){
            $("#loader").css("display", "block");
            axios.post(url)
            .then(response => {
                if(response.data.success){
                    $("#loader").css("display", "none");
                    this.employers = response.data.success;
                    this.dataLoaded = true;
                }
            })
        },
        excelDownload: function(){

            $("#loader").css("display", "block");
            axios.get('/admin/download/employers', {responseType:'blob'}).
            then(result => {
                $("#loader").css("display", "none");
                const url = window.URL.createObjectURL(new Blob([result.data], {type:'application/vnd.ms-excel'}));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'employers.xlsx');
                    document.body.appendChild(link);
                    link.click();
            });
        },
    }
}
</script>
