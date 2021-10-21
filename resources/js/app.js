require('./bootstrap');
require('@popperjs/core');

window.Vue = require('vue').default;

Vue.component('customers-view', require('./components/CustomersView.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('products-categories', require('./components/ProductsCategories.vue').default);

new Vue({
    el: '#app',

    mounted() {
        console.log("I'm working");
    }
})
