
require('./bootstrap');


window.Vue = require('vue');

//v-form
import { Form, HasError, AlertError } from 'vform';

import moment from 'moment';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
//vform end


import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);



import Swal from 'sweetalert2'
window.Swal = Swal;
// CommonJS
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast;


import VueRouter from 'vue-router'
Vue.use(VueRouter)


Vue.filter('myDate',function(created){
  return moment(created).format('MMMM Do YYYY');
});

Vue.filter('upText', function(text){
  return text.charAt(0).toUpperCase() + text.slice(1)
});


import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })


window.Fire =  new Vue();

Vue.component('pagination', require('laravel-vue-pagination'));



Vue.component('not-found', require('./components/NotFound.vue').default);

  
const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
  ]

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
    

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



// Vue.component('app', require('./components/app.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data:{
      search: ''
  },
  methods:{
    searchit: _.debounce(() => {
        Fire.$emit('searching');
    },1000),

    printme() {
        window.print();
    }
  }
}).$mount('#app');


