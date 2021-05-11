require('./bootstrap');

const options = {
  color: '#bffaf3',
  failedColor: '#874b4b',
  thickness: '10px',
  transition: {
    speed: '0.01s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'left',
  inverse: false,
  autoFinish: true
}

window.Vue = require('vue').default;
import Swal from 'sweetalert2';
import VueProgressBar from 'vue-progressbar';



window.swal = Swal;

window.toastMixin = Swal.mixin({
    toast: true,
    animation: false,
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
      // toast.addEventListener('mouseenter', Swal.stopTimer)
      // toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });


Vue.use(VueProgressBar);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('product-component', require('./components/ProductComponent.vue').default);


const app = new Vue({
    el: '#app',
});
