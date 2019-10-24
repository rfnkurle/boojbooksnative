
import Vue from 'vue';
import router from './router';
import App from './components/App';

require('./bootstrap');



// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    components: {
        App 
    },
    router
});
