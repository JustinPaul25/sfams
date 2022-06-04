require('./bootstrap');

window.Vue = require('vue').default;
import store from "./store/store"
import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
import MaskedInput from "vue-masked-input";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/src/sweetalert2.scss'

const options = {
    confirmButtonColor: '#2563EB',
    cancelButtonColor: '#EF4444',
};

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/dashboard/index.vue').default);

Vue.component('students', require('./components/students/index.vue').default);
Vue.component('student-form', require('./components/students/register/index.vue').default);
Vue.component('student-view', require('./components/students/view.vue').default);

Vue.component('utility', require('./components/utilities/index.vue').default);
Vue.component('utility-form', require('./components/utilities/form.vue').default);

Vue.component('payment', require('./components/payment/index.vue').default);

Vue.component('user', require('./components/users/index.vue').default);
Vue.component('user-form', require('./components/users/form.vue').default);

Vue.component('report', require('./components/reports/index.vue').default);

Vue.component('sweet-modal', SweetModal);
Vue.component('sweet-modal-tab', SweetModalTab);
Vue.component('masked-input', MaskedInput);

Vue.use(VueSweetalert2, options)

const app = new Vue({
    el: '#app',
    store
});
