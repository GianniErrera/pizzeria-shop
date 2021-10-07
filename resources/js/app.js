require('./bootstrap');


window.Vue = require('vue').default;




new Vue({
    el: '#app',

    mounted() {
        console.log("I'm working");
    }
})
