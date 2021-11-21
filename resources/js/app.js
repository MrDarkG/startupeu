/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('mentor-registration', require('./components/registration/mentor.vue').default);
Vue.component('investor-registration', require('./components/registration/investor.vue').default);
Vue.component('user-registration', require('./components/registration/index.vue').default);
Vue.component('browse-startups', require('./components/browse/startups.vue').default);
Vue.component('browse-mentors', require('./components/browse/mentors.vue').default);
Vue.component('filter-list', require('./components/browse/filter.vue').default);
Vue.component('choose-side', require('./components/choose_side/index.vue').default);
Vue.component('create-startup', require('./components/choose_side/startup.vue').default);
Vue.component('create-investor', require('./components/choose_side/investor.vue').default);
Vue.component('create-mentor', require('./components/choose_side/mentor.vue').default);
Vue.component('startup-dashboard', require('./components/startup/dashboard/index.vue').default);
Vue.component('startup-cards', require('./components/startup/dashboard/cards.vue').default);
// STARTUP MY_ACCOUNT
    Vue.component('startup-account-menu', require('./components/startup/my_account/menu.vue').default);
    Vue.component('my-account', require('./components/startup/my_account/index.vue').default);
    Vue.component('general-info', require('./components/startup/my_account/general.vue').default);
    Vue.component('additional-info', require('./components/startup/my_account/additional_info.vue').default);
    Vue.component('team-info', require('./components/startup/my_account/team.vue').default);

// INVESTOR DASHBOARD
    Vue.component('investor-dashboard', require('./components/investor/index.vue').default);
    Vue.component('investor-startup-cards', require('./components/investor/card.vue').default);

// INVESTMENT
    Vue.component('investment-register', require('./components/registration/investment.vue').default);

// MENTOR
    Vue.component('mentor-dashboard', require('./components/mentor/index.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
