import Vue from 'vue';
import VueRouter from 'vue-router';
import ListComponent from './components/ListComponent'

Vue.use(VueRouter)




export default new VueRouter({
    routes:[
        {path: '/', component: ListComponent}
    ],
    //for old browsers
    mode:'history'
})
