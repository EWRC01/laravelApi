require('./bootstrap');
import Vue from 'vue';

import BootstrapVue from 'bootstrap-vue' //Importing
// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue);


Vue.component('encabezado', require('./components/Header.vue').default);
Vue.component('product', require('./components/Product.vue').default);


const app = new Vue({
        el: '#app'
})



