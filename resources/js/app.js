require('./bootstrap');
require('./ui-kit');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import axios from 'axios';
import AWN from "awesome-notifications";
import VueFormGenerator from 'vue-form-generator'

import Playground from './components/playground/Playground';
import ModuleIndex from './components/module/index/Index';

const axiosInstance = axios.create({
    baseURL: window.portal.APP_URL
});

axiosInstance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axiosInstance.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

window.axios = Vue.prototype.$http = axiosInstance;
Vue.prototype.$notify = new AWN({position: 'top-right'});
Vue.use(BootstrapVue);
Vue.use(VueFormGenerator);

window.Vue = Vue;

new Vue({
    el: '#playground',
    components: {
        ModuleIndex
    }
});

new Vue({
    el: '#header-playground',
    components: {
        ModuleIndex,
        Playground
    }
});
