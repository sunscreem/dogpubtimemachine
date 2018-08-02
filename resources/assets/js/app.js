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

import smoothscroll from 'smoothscroll-polyfill';

smoothscroll.polyfill();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('beer', require('./components/Beer.vue'));
Vue.component('bar', require('./components/Bar.vue'));

Vue.component('time-machine', require('./components/TimeMachine.vue'));
Vue.component('system-status', require('./components/Status.vue'));

require('es6-promise').polyfill();

const bugsnag = require('bugsnag-js');
const bugsnagClient = bugsnag({
  apiKey: '4d09d16b6b67a9f95de6eb75fffe2125',
  releaseStage: window.releaseStage,
  notifyReleaseStages: ['production']
});

const bugsnagVue = require('bugsnag-vue');

bugsnagClient.use(bugsnagVue(Vue));

const app = new Vue({
  el: '#app',
});


function scrollIntoView(eleID) {
  var e = document.getElementById(eleID);
  if (!!e && e.scrollIntoView) {
    e.scrollIntoView({behavior: 'smooth' });
  }
}
