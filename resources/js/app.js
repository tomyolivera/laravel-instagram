require('./bootstrap');

window.Vue = require('vue').default;

// Tasks
Vue.component('Task', require('./components/tasks/Task.vue').default);
Vue.component('Tasks', require('./components/tasks/Tasks.vue').default);
Vue.component('NewTask', require('./components/tasks/NewTask.vue').default);
Vue.component('DeleteAllTasks', require('./components/tasks/DeleteAllTasks.vue').default);

Vue.component('Categories', require('./components/tasks/categories/Categories.vue').default);
Vue.component('NewCategory', require('./components/tasks/categories/NewCategory.vue').default);

const app = new Vue({
    el: '#app',
});