require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';

/*підключаемо модулі*/
Vue.use(VueRouter,VueAxios,Axios);

import uk from 'vee-validate/dist/locale/uk'
import VeeValidate, { Validator } from 'vee-validate';
Validator.localize('uk', uk);
Vue.use(VeeValidate);


/* імпортуємо компоненти виду*/
import CompaniesIndex from './components/companies/CompaniesIndex.vue';
import CompaniesCreate from './components/companies/CompaniesCreate.vue';
import CompaniesEdit from './components/companies/CompaniesEdit.vue';

const routes=[
    {
        name:'companies_index',
        path:'/',
        component:CompaniesIndex

    },
    {
        name:'companies_create',
        path:'/companies/create',
        component:CompaniesCreate

    },
    {
        name:'companies_edit',
        path:'/companies/edit/:id/',
        component:CompaniesEdit

    }
];

const router = new VueRouter({routes:routes});

const app = new Vue({
    router:router
}).$mount("#app");



