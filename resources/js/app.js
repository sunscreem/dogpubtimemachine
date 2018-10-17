/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

import VTooltip from 'v-tooltip';

Vue.use(VTooltip);

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import smoothscroll from 'smoothscroll-polyfill';

smoothscroll.polyfill();

var slug = require('slugify');

Vue.prototype.$slug = slug;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('beers', require('./components/Beers.vue'));
Vue.component('beer', require('./components/Beer.vue'));
Vue.component('bars', require('./components/Bars.vue'));
Vue.component('bar', require('./components/Bar.vue'));

Vue.component('headers', require('./components/Headers.vue'));
Vue.component('time-machine', require('./components/TimeMachine.vue'));
Vue.component('system-status', require('./components/Status.vue'));

Vue.component('date-change', require('./components/DateChange.vue'));

Vue.filter('formatDate',function formatDate(date) {
  // this could be done better
  const formattedDate = ('0' + date.getDate()).slice(-2) + '/'
    + ('0' + (date.getMonth() + 1)).slice(-2) + '/'
    + date.getFullYear()
  return formattedDate
});

Vue.prototype.$filters = Vue.options.filters;

require('es6-promise').polyfill();

const bugsnag = require('bugsnag-js');
const bugsnagClient = bugsnag({
  apiKey: '4d09d16b6b67a9f95de6eb75fffe2125',
  releaseStage: window.releaseStage,
  notifyReleaseStages: ['production']
});

const bugsnagVue = require('bugsnag-vue');

bugsnagClient.use(bugsnagVue(Vue));


const router = new VueRouter({mode: 'history',
                              base: '/',
                              fallback: true,
                              routes: [],
                            });

const app = new Vue({
  router,
  el: '#app',
});


function scrollIntoView(eleID) {
  var e = document.getElementById(eleID);
  if (!!e && e.scrollIntoView) {
    e.scrollIntoView({behavior: 'smooth' });
  }
}
