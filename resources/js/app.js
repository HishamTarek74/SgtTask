import './bootstrap';

 import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();

import { createApp } from "vue";
import router from './router'
import CompaniesIndex from './components/CompaniesIndex.vue'

createApp({
    components: {
        CompaniesIndex
    }
}).use(router).mount('#app')
