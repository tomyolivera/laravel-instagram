require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('Task', require('./components/tasks/Task.vue').default);
Vue.component('Tasks', require('./components/tasks/Tasks.vue').default);
Vue.component('CategoryTask', require('./components/tasks/CategoryTask.vue').default);

const app = new Vue({
    el: '#app',
});