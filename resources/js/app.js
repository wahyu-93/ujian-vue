
require('./bootstrap');

window.Vue = require('vue');

import router from './router.js'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('aside-component', require('./components/AsideComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
