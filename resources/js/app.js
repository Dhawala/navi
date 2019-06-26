
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
     el: '#app',
    //el: '#wrapper',
    created(){
        Echo.channel('demo').listen('EventTrigger',(e)=>{
            console.log(e);
        })
        // Echo.channel('allocation').listen('AllocationEvent',(e)=>{
        //     console.log(e);
        //     allocationChannel(e);
        // })
        console.log(`allocation.`+this.$userId);
        Echo.private('allocation.'+this.$userId)
            .listen('AllocationEvent', (e) => {
                console.log(e);
                console.log(this.$userId);
                allocationChannel(e);
            });
    }
});
