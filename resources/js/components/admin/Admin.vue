<template>
    <div class="container">
        <h1 class="mb-4">Admin</h1>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-3 mb-3">
                <div class="list-group sticky-top z-0">
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action active" data-bs-toggle="list" href="#list-admin-roles">Roles</a>
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action" data-bs-toggle="list" href="#list-admin-users">Users</a>
                    <strong>Site</strong>
                    <a class="list-group-item list-group-item-dark-mod list-group-item-action" data-bs-toggle="list" href="#list-admin-statistics">Statistics</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list-admin-roles"><Roles /></div>
                    <div class="tab-pane fade" id="list-admin-users"> <admin-users /> </div>
                    <div class="tab-pane fade" id="list-admin-statistics"> <admin-statistics /> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../Store';

    export default {
        name: 'Admin',
    }
</script>

<style scoped>
    strong{
        background-color: rgb(32, 22, 22);
        border-top: 1px dashed gray;
        border-bottom: 1px dashed gray;
        padding:6px 12px;
    }
</style>