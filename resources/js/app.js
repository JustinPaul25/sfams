require('./bootstrap');

window.Vue = require('vue').default;
import { SweetModal, SweetModalTab } from 'sweet-modal-vue'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/dashboard/index.vue').default);

Vue.component('students', require('./components/students/index.vue').default);
Vue.component('student-form', require('./components/students/form.vue').default);
Vue.component('student-view', require('./components/students/view.vue').default);

Vue.component('utility', require('./components/utilities/index.vue').default);
Vue.component('utility-form', require('./components/utilities/form.vue').default);

Vue.component('payment', require('./components/payment/index.vue').default);

Vue.component('user', require('./components/users/index.vue').default);

Vue.component('report', require('./components/reports/index.vue').default);

Vue.component('sweet-modal', SweetModal);
Vue.component('sweet-modal-tab', SweetModalTab);

const app = new Vue({
    el: '#app',
});
