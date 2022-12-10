require('./bootstrap');

window.Vue = require('vue').default;
import { global } from './mixins'
import store from "./store/store"
import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
import MaskedInput from "vue-masked-input";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/src/sweetalert2.scss';
import VueHtmlToPaper from 'vue-html-to-paper';
import VueFusionCharts from 'vue-fusioncharts';
import FusionCharts from 'fusioncharts';
import Charts from 'fusioncharts/fusioncharts.charts';
import loading from 'vuejs-loading-screen'
import Vue from 'vue';

const options = {
    confirmButtonColor: '#2563EB',
    cancelButtonColor: '#EF4444',
};

const printoptions = {
    name: '_blank',
    specs: [
      'fullscreen=yes',
      'titlebar=yes',
      'scrollbars=yes'
    ],
    styles: [
      'https://cdn.tailwindcss.com',
      'https://unpkg.com/kidlat-css/css/kidlat.css'
    ],
    timeout: 1000, // default timeout before the print window appears
    autoClose: true, // if false, the window will not close after printing
    windowTitle: window.document.title, // override the window title
}

Vue.component('dashboard', require('./components/dashboard/index.vue').default);

Vue.component('students', require('./components/students/index.vue').default);
Vue.component('student-form', require('./components/students/register/index.vue').default);
Vue.component('student-view', require('./components/students/view.vue').default);
Vue.component('student-edit', require('./components/students/edit.vue').default);
Vue.component('student-pay-tuition', require('./components/students/paytuition.vue').default);

Vue.component('utility', require('./components/utilities/index.vue').default);
Vue.component('utility-form', require('./components/utilities/form.vue').default);

Vue.component('payment', require('./components/payment/index.vue').default);

Vue.component('user', require('./components/users/index.vue').default);
Vue.component('user-form', require('./components/users/form.vue').default);

Vue.component('report', require('./components/reports/index.vue').default);

Vue.component('notification', require('./components/notification/index.vue').default);

Vue.component('logs', require('./components/logs.vue').default);

Vue.component('enrollment-application', require('./components/enrollment/application.vue').default);
Vue.component('enrollment-payment-form', require('./components/enrollment/form.vue').default);
Vue.component('re-enroll-form', require('./components/enrollment/reenroll.vue').default);

Vue.component('branches', require('./components/branch/index.vue').default);
Vue.component('branch-form', require('./components/branch/form.vue').default);
Vue.component('branch-view', require('./components/branch/view.vue').default);
Vue.component('branch-pay', require('./components/branch/pay.vue').default);

Vue.component('reset-password', require('./components/resetpassword.vue').default);
Vue.component('settings', require('./components/Settings.vue').default);

Vue.component('sweet-modal', SweetModal);
Vue.component('sweet-modal-tab', SweetModalTab);
Vue.component('masked-input', MaskedInput);

//portal
Vue.component('student-dashboard', require('./components/portal/student/dashboard').default);
Vue.component('student-profile', require('./components/portal/student/profile').default);
Vue.component('student-account', require('./components/portal/student/account').default);
Vue.component('branch-dashboard', require('./components/portal/branch/dashboard').default);
Vue.component('branch-account', require('./components/portal/branch/account').default);


Vue.use(VueSweetalert2, options)
Vue.use(VueHtmlToPaper, printoptions);
Vue.use(VueFusionCharts, FusionCharts, Charts);
Vue.use(loading, {
  bg: 'rgba(60, 131, 246, 0.7)',
  icon: 'refresh',
  slot: `
    <div class="px-5 py-3 bg-red-500 rounded">
      <h3 class="text-3xl text-white text-center"><i class="fas fa-spinner fa-spin"></i>Do not close this tab and make sure you have stable internet connection.<br>We are processing your request...</h3>
    </div>
  `,
  size: 3,
  icon_color: 'white',
})

Vue.mixin(global)

var converter = require('number-to-words');

Vue.filter('toWords', function (value) {
  if (!value) return '';
  return converter.toWords(value);
})

const app = new Vue({
    el: '#app',
    store
});
