/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueFuse from 'vue-fuse';

Vue.use(VueFuse);

import DataTable from 'laravel-vue-datatable';
import Vuelidate from 'vuelidate';
import VTooltip from 'v-tooltip'

Vue.use(VTooltip)

Vue.use(DataTable);

Vue.use(Vuelidate)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('guests-component', require('./components/client/GuestsComponent.vue').default);
Vue.component('companion-component', require('./components/system/CompanionComponent.vue').default);
Vue.component('my-list-component', require('./components/client/MyListComponent.vue').default);
Vue.component('tables-component', require('./components/client/TablesComponent.vue').default);
Vue.component('clients-online-component', require('./components/system/ClientsOnlineComponent.vue').default);
Vue.component('my-block-list-component', require('./components/client/MyBlockListComponent.vue').default);
Vue.component('my-task-component', require('./components/client/MyTaskComponent.vue').default);
Vue.component('block-component', require('./components/system/BlockComponent.vue').default);
Vue.component('list-component', require('./components/system/ListComponent.vue').default);
Vue.component('task-component', require('./components/system/TaskComponent.vue').default);
Vue.component('quotation-component', require('./components/system/QuotationComponent.vue').default);
Vue.component('calendar-component', require('./components/system/CalendarComponent.vue').default);
Vue.component('statistic-component', require('./components/system/StatisticComponent.vue').default);
Vue.component('admin-list-component', require('./components/system/AdminListComponent.vue').default);
Vue.component('admin-task-component', require('./components/system/AdminTaskComponent.vue').default);
Vue.component('admin-task-client-component', require('./components/client/AdminTasksComponent.vue').default);
Vue.component('tables-editor-component', require('./components/system/TablesEditorComponent.vue').default);

//Web Components
Vue.component('app-component', require('./components/web/AppComponent.vue').default);
Vue.component('navbar-component', require('./components/web/NavbarComponent.vue').default);
// Mensajes
Vue.component('contact-component', require('./components/system/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/system/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/system/ActiveConversationComponent.vue').default);
Vue.component('message-conversation-component', require('./components/system/MessageConversationComponent.vue').default);
Vue.component('messenger-component', require('./components/system/MessengerComponent.vue').default);
// header component
Vue.component('inbox-component', require('./components/system/InboxNotificationComponent.vue').default);
// Perfil cliente
Vue.component('client-profile-component', require('./components/system/ClientProfileComponent.vue').default);
//Galeria cliente
Vue.component('client-gallery-component', require('./components/system/GalleryComponent.vue').default);
    // Notificaciones
    Vue.component('notifications-component', require('./components/system/NotificationsComponent.vue').default);
    Vue.component('indiv-notifications-component', require('./components/system/IndivNotificationComponent.vue').default);
// Colorpicker
Vue.component('colorpicker-component', require('./components/system/ColorpickerComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './routes'

const app = new Vue({
    el: '#app',
    router,
});