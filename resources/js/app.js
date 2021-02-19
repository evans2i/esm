require('./bootstrap');
import Vue from 'vue';

import appBus from './custom/js/EventListener';
import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import vSelect from 'vue-select'

import VModal from 'vue-js-modal';
import {Form, HasError, AlertError} from 'vform';
import VueProgressBar from 'vue-progressbar';
import Swal from 'sweetalert2';
import moment from 'moment';
// import dayjs from 'dayjs';
import Role from "./Roles/Role";
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';



window.Form = Form;
window.Swal = Swal;
window.moment = require('moment');
window.dayjs = require('dayjs');
window.appBus = new appBus;


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
Vue.prototype.$moment = moment;
Vue.prototype.$dayjs = dayjs;

Vue.use(VueProgressBar, {
  color: 'rgb(11, 172, 11)',
  failedcolor: 'red',
  height: '4px'
})

Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VModal);
Vue.component(HasError.name, HasError);
Vue.component(HasError.name, HasError);
Vue.component('v-select', vSelect);
Vue.component('v-date', DatePicker);


Vue.filter('upText', function (text) {
  // if (!text) return ''
  // text = text.toString()
  return text.charAt(0).toUpperCase() + text.slice(1)
  //return text.toUpperCase();
})

Vue.filter('myDate', function (created) {  return moment(created).format('MMMM Do YYYY, h:mm:ss a');})
Vue.filter('myHour', function (created) { return moment(created).format('h:mm A'); })
Vue.filter('myDateF', function (created) { return moment(created).format('MMMM Do YYYY'); })
Vue.filter('myDateFS', function (created) { return moment(created).format('MMMM dd YYYY'); })
Vue.filter('myDateDate', function (created) { return moment(created).format('DD MMMM YYYY'); })
Vue.filter('myDateFN', function (created) { return moment(created).format('MM/DD/YYYY'); })
Vue.filter('myDateFND', function (created) { return moment(created).format('DD/MM/YYYY'); })
Vue.filter('myDateY', function (createdYear) { return moment(createdYear).format('YYYY'); });

const app = document.getElementById('app');
const appCurrent = JSON.parse(app.dataset.page);
Vue.prototype.$role = new Role(appCurrent.props.user)
// // "@inertiajs/inertia": "^0.1.9",
//"@inertiajs/inertia": "^0.8.2",
//customer js plugin
import './appsrc';
new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
