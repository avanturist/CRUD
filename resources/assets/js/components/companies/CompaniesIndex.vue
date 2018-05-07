<template>
    <div class="">
        <div class="form-group">
            <router-link :to="{name:'companies_create'}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-arrow-right"></i>Add Company</router-link>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="company in companies">
                        <td>{{ company.name }}</td>
                        <td>{{ company.address }}</td>
                        <td>{{ company.website }}</td>
                        <td>{{ company.email }}</td>
                        <td>
                            <router-link :to="{name:'companies_edit', params:{id:company.id}}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i>Edit</router-link>
                            <a href="#" class="btn btn-xs btn-danger" @click="deleteCompany(company.id)"><i class="glyphicon glyphicon-remove"></i>Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return{
                companies:[]
            }
        },
        created(){
            this.fetchCompanies();
        },
        methods:{
            fetchCompanies(){
                let uri='/admin/companies';
                axios.get(uri).then((response)=>{
                    this.companies = response.data;
                    //console.log(this.companies);
                }).catch(function(error){
                    console.log(error);
                    alert('Помилка завантаження!');
                });
            },
            deleteCompany(id){
                if(confirm('Are you sure?')){
                    let self = this;
                    let uri = '/admin/companies/' + id;
                    axios.delete(uri).then(res=>{
                        alert('Company is removed');
                        this.fetchCompanies();
                    }).catch(function (res) {
                        console.log(res);
                        alert('Something wrong! Could not remove the Company!');
                    });
                }

            }
        }





    }
</script>