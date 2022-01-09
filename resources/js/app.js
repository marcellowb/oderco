import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue' //Importing
import router from './routes'

import money from  'vuejs-money'

window.Vue = require('vue').default;

Vue.component('template-app', require('./App.vue').default);

Vue.use(BootstrapVue, {
    primary: {variant: 'red'}
})
Vue.use(BootstrapVueIcons)
Vue.use(money)

const app = new Vue({
    el: '#app',
    router,
});
