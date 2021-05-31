<template>
    <admin-layout>
        <div>
            <div class="card-body" v-if="employers.length > 0">
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
														<tr v-for="(employer, k) in employers" :key="k">
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
            <div v-else class="d-flex justify-content-center"><h3>Sorry, no employers found.</h3></div>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout'
export default {
    components:{
        AdminLayout
    },
    props:{
        employers: Object
    }
}
</script>
