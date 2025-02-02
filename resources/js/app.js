require('./bootstrap');

window.Vue = require('vue').default;

// Modals
Vue.component('Modal', require('./components/modals/Modal.vue').default);

// Tasks
Vue.component('Task', require('./components/tasks/Task.vue').default);
Vue.component('Tasks', require('./components/tasks/Tasks.vue').default);
Vue.component('NewTask', require('./components/tasks/NewTask.vue').default);
Vue.component('DeleteAllTasks', require('./components/tasks/DeleteAllTasks.vue').default);

// Category Tasks
Vue.component('Categories', require('./components/tasks/categories/Categories.vue').default);
Vue.component('NewCategory', require('./components/tasks/categories/NewCategory.vue').default);

// User
Vue.component('User', require('./components/user/User.vue').default);
Vue.component('user-status', require('./components/user/Status.vue').default);
Vue.component('user-roles', require('./components/user/Roles.vue').default);
Vue.component('user-preferences', require('./components/user/Preferences.vue').default);
Vue.component('user-data', require('./components/user/Data.vue').default);
Vue.component('user-delete', require('./components/user/Delete.vue').default);
Vue.component('form-edit-user', require('./components/user/UserForm.vue').default);

// Roles
// Vue.component('Roles', require('./components/admin/roles/Roles.vue').default);
// Vue.component('Permissions', require('./components/admin/roles/Permissions.vue').default);
// Vue.component('Role', require('./components/admin/roles/Role.vue').default);
// Vue.component('role-has-permissions', require('./components/admin/roles/RoleHasPermissions.vue').default);

// Admin
// Vue.component('Admin', require('./components/admin/Admin.vue').default);
// Vue.component('admin-users', require('./components/admin/users/Users.vue').default);
// Vue.component('admin-users-edit', require('./components/admin/users/Edit.vue').default);
// Vue.component('admin-stats', require('./components/admin/stats/Stats.vue').default);
// Vue.component('admin-stats-user', require('./components/admin/stats/Users.vue').default);
// Vue.component('admin-stats-publications', require('./components/admin/stats/Publications.vue').default);

// Dashboard
Vue.component("dashboard-users", require('./components/dashboard/users/Users.vue').default);

const app = new Vue({
    el: '#app',
});