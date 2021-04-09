require('./bootstrap');
import Vue from 'vue';

import appBus from './custom/js/EventListener';
import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

import VModal from 'vue-js-modal';
import {Form, HasError, AlertError} from 'vform';
import VueProgressBar from 'vue-progressbar';
import moment from 'moment';
import Swal from 'sweetalert2';

window.Form = Form;
window.moment = require('moment');
window.appBus = new appBus;
window.cash = require('cash-dom');
window.Swal = Swal;

Vue.use(VueProgressBar, {
    color: 'rgb(11, 172, 11)',
    failedcolor: 'red',
    height: '4px'
});

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VModal);
Vue.component(HasError.name, HasError);
Vue.component(HasError.name, HasError);

Vue.filter('upText', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDateDate', function (created) { return moment(created).format('DD MMMM YYYY');});

const app = document.getElementById('app');
new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
