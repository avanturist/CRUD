<template>
    <div>
        <div class="form-group">
            <router-link :to="{name:'companies_index'}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-home"></i>Home</router-link>
        </div>
        <div class="panel-body">
            <form v-on:submit.prevent="editCompany">
                <div class="form-group">
                    <label for="name">Copmany Name</label>
                    <input v-model="company.name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Copmany Address</label>
                    <input v-model="company.address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="website">Copmany Website</label>
                    <input v-model="company.website" id="website" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Copmany Email</label>
                    <input v-model="company.email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-xs">Update</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                company:{id:'', name:'',address:'',website:'',email:''}
            }
        },
        created(){
            let uri= "admin/companies/"+ this.$route.params.id + '/edit';
            axios.get(uri).then(res=>{
                this.company = res.data;
            }).catch(function (error) {
                console.log(error);
                alert('Could not load company for edit')
            })
        },
        methods:{
            editCompany(){
                let self = this;
                let uri= "admin/companies/" + this.company.id ;
                axios.patch(uri, self.company).then(res=>{
                    this.$router.push('/');
                }).catch(function (error) {
                    console.log(error);
                    alert('Could not save company after edit')
                })
            }
        }

    }
</script>