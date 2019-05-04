
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('Search', require('./components/Search.vue'));

const app = new Vue({
    el: '#app',
    methods: {
        onPageChange : function(page) {
            window.scrollTo(0, 450);
        }
    }
});

const app2 = new Vue({
    el: '#appli'
});

const app3 = new Vue({
    el: '#applic'
});

const app4 = new Vue({
    el: '#home'
});
