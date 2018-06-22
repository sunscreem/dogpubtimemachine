
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));


const bugsnag = require('bugsnag-js');
const bugsnagClient = bugsnag({
    apiKey: '4d09d16b6b67a9f95de6eb75fffe2125',
    releaseStage: window.releaseStage,
    notifyReleaseStages: ['production']
});

const bugsnagVue = require('bugsnag-vue');

bugsnagClient.use(bugsnagVue(Vue));

const app = new Vue({
    el: '#app'
});

