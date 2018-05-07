<template>
    <div>
        <div class="form-group">
            <router-link :to="{name:'companies_index'}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-home"></i>Home</router-link>
        </div>
        <div class="panel-heading center">Add New Company</div>
        <div class="panel-body">
            <form v-on:submit.prevent="createCompany">
                <div :class="{'form-group':true, 'has-error':errors.has('name')}">
                    <label for="name">Copmany Name</label>
                    <input v-model="company.name" id="name" v-validate  ="'required'" data-vv-rules ="check-unique" name="name" class="form-control" >
                    <span v-if="errors.has('name')">{{ errors.first('name') }}</span>
                </div>
                <div :class="{'form-group':true, 'has-error':errors.has('address')}">
                    <label for="address">Copmany Address</label>
                    <input v-model="company.address" v-validate ="'required'" id="address" class="form-control" name="address">
                    <span v-if="errors.has('address')">{{ errors.first('address') }}</span>
                </div>
                <div :class="{'form-group':true, 'has-error':errors.has('website')}">
                    <label for="website">Copmany Website</label>
                    <input v-model="company.website" id="website" class="form-control" v-validate ="'required|url'" name="website">
                    <span v-if="errors.has('website')">{{ errors.first('website') }}</span>
                </div>
                <div :class="{'form-group':true, 'has-error':errors.has('email')}">
                    <label for="email">Copmany Email</label>
                    <input v-model="company.email" v-validate ="'required|email'" id="email" class="form-control" name="email">
                    <span v-if="errors.has('email')">{{ errors.first('email') }}</span>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-xs">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                company:{name:'', address:'', website:'',email:''},

            }

        },
        methods:{
            createCompany(){
                const dictionary={
                  'al':{
                      attributes:{
                          name:'-Company Name-',
                          address:'-Company Address-',
                          website:'-Company Website-',
                          email:'-Company Email-',

                      }
                  }
                };
                this.$validator.localize('uk',dictionary.al);

                /*валідація unique-field*/
                /*const checkUnique = {
                    getMessage(field) {
                        return`${field} вже існує.`

                    },
                    validate(value) {
                        if(value) {
                            return axios.get('admin/companies', {params: { name: value }}).then(function (response) {
                                return {
                                    valid: response.data.valid
                                }
                            })
                        } else {
                            return false;
                        }
                    }
                };

                this.$validator.extend('check-unique', checkUnique);*/



                let self= this;
                    let uri = 'admin/companies';
                    this.$validator.validateAll().then(res=>{
                        axios.post(uri,this.company).then(function(res){
                            alert('New Company is added');
                            self.$router.push('/');

                        }).catch(function (res) {
                            console.log(res);
                            alert('Errror! Could not add company!')
                        })
                    })


            }
        }
    }
</script>