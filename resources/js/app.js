/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue').default

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
require('./import.js')
/*MIXINS*/
require('./mixin/helper')
require('./helpers/browse_guest_helper')
/*END MIXINS*/
//GUEST COMPONENTS
    require('./app/guest.js')
//END GUEST COMPONENTS
Vue.component('example-component', require('./components/ExampleComponent.vue').default)
Vue.component('dashboard-menu', require('./components/dashboard/menu.vue').default)
// Vue.component('mentor-registration', require('./\components/mentor/registration/index.vue').default)
// Vue.component('startup-register', require('./components/startup/registration/index.vue').default)
// Vue.component('investor-registration', require('./components/investor/registration/index.vue').default)
Vue.component('user-registration', require('./components/registration/index.vue').default)
Vue.component('browse-index', require('./components/browse/index.vue').default)
Vue.component('browse-startups', require('./components/browse/startups.vue').default)
Vue.component('browse-investors', require('./components/browse/investors.vue').default)
Vue.component('browse-mentors', require('./components/browse/mentors.vue').default)
Vue.component('filter-list', require('./components/browse/filter.vue').default)
Vue.component('choose-side', require('./components/choose_side/index.vue').default)
Vue.component('create-startup', require('./components/startup/registration/index.vue').default)
Vue.component('create-investor', require('./components/investor/registration/index.vue').default)
Vue.component('create-mentor', require('./components/mentor/registration/index.vue').default)
Vue.component('startup-dashboard', require('./components/startup/dashboard/index.vue').default)
Vue.component('startup-cards', require('./components/startup/dashboard/cards.vue').default)
// STARTUP MY_ACCOUNT
    Vue.component('startup-account-menu', require('./components/startup/my_account/menu.vue').default)
    Vue.component('my-account', require('./components/startup/my_account/index.vue').default)
    Vue.component('general-info', require('./components/startup/my_account/general.vue').default)
    Vue.component('additional-info', require('./components/startup/my_account/additional_info.vue').default)
    Vue.component('team-info', require('./components/startup/my_account/team.vue').default)

// INVESTOR DASHBOARD
    Vue.component('investor-dashboard', require('./components/investor/index.vue').default)
    Vue.component('investor-account', require('./components/investor/account.vue').default)
    Vue.component('investor-startup-cards', require('./components/investor/card.vue').default)
// MENTOR
    Vue.component('mentor-dashboard', require('./components/mentor/index.vue').default)

// ADMIN
    require('./app/admin.js')
// END ADMIN
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
})
