
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
var VueResource = require('vue-resource');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//for table
Vue.component('tr-data-project', require('./table/DataProject.vue'));

//for modal
Vue.component('modal-form-project', require('./modal/FormProject.vue'));

Vue.component('ajax-table', require('./components/AjaxTable.vue'));
Vue.component('sorter', require('./components/Sorter.vue'));
Vue.component('vue-dropzone',vue2Dropzone);
Vue.use(VueResource);

window.eventHub = new Vue();
window.app = new Vue({
    el: '#app',
    data: {
        base_path: base_path,
        base_url: base_url,
        csrf_token: $("meta[name='csrf-token']").attr("content"),
        params: {
        },
        rowparams: {},
    },
});
