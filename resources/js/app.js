require('./bootstrap');

import Vue from 'vue';
import axios from 'axios';
import AWN from "awesome-notifications";
import VueFormGenerator from 'vue-form-generator'

import Toolkit from '@bristol-su/frontend-toolkit';
import Playground from './components/playground/Playground';

import ModuleIndex from './components/module/index/Index';

Vue.prototype.$notify = new AWN({position: 'top-right'});
global.Toolkit = Toolkit;
global.Vue = Vue;

Vue.use(Toolkit);
Vue.use(VueFormGenerator);

window.Vue = Vue;

new Vue({
    el: '#playground',
    components: {
        ModuleIndex
    }
});

new Vue({
    el: '#header-vue-root'
})

new Vue({
    el: '#header-playground',
    components: {
        ModuleIndex,
        Playground
    }
});
