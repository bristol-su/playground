require('./bootstrap');
import Vue from 'vue';
import Toolkit from '@bristol-su/frontend-toolkit';

import Playground from './components/playground/Playground';
import ModuleIndex from './components/module/index/Index';

global.Toolkit = Toolkit;
global.Vue = Vue;

Vue.use(Toolkit);

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
