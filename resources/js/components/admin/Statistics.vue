<template>
    <div>
        <h1>Statistics</h1>

        <div class="picture">
            <h4>User statistics</h4>
            <hr class="my-2">
            <div class="row gx-2">
                <div class="col-3">
                    <h6>Amount of users: {{ CANT_USERS }}</h6>
                </div>

                <div class="col-3">
                    <h6>Percentage of dark mode: {{ percentage.dark_mode + '%' }} of {{ CANT_USERS }} users</h6>
                    <div class="progress text-white">
                        <div class="progress-bar bg-primary" role="progressbar" :style="'width:' + percentage.dark_mode + '%'" >{{ percentage.dark_mode + '% Dark' }}</div>
                        <div class="progress-bar bg-danger" role="progressbar" :style="'width:' + (100 - percentage.dark_mode) + '%'" >{{ (100 - percentage.dark_mode) + '% Light' }}</div>
                    </div>
                </div>

                <div class="col-3">
                    <h6>Percentage of users online: {{ percentage.status.online + '%' }} and {{ percentage.status.offline + '%' }} are offline of {{ CANT_USERS }} users</h6>
                    <div class="progress text-white">
                        <div class="progress-bar bg-success" role="progressbar" :style="'width:' + percentage.status.online + '%'" >{{ percentage.status.online + '% Online' }}</div>
                        <div class="progress-bar bg-secondary text-black" role="progressbar" :style="'width:' + (percentage.status.offline) + '%'" >{{ (percentage.status.offline) + '% Offline' }}</div>
                        <div class="progress-bar bg-danger" role="progressbar" :style="'width:' + (percentage.status.busy) + '%'" >{{ (percentage.status.busy) + '% Busy' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Store from '../Store';

    export default {
        name: 'Statistics',
        data(){
            return {
                CANT_USERS: 0,

                percentage: {
                    dark_mode: 0,
                    status: {
                        offline: 0,
                        online: 0,
                        busy: 0,
                    },
                }
            }
        },
        created(){
            this.getStatistics();
        },
        methods: {
            getStatistics(){
                axios.get('admin/statistics').then((res) => {
                    this.CANT_USERS = res.data.CANT_USERS;

                    // Dark mode
                    this.percentage.dark_mode = res.data.PERC_DARK_MODE;

                    // Status
                    this.status.offline = res.data.status.PERC_USERS_ONLINE;
                    this.status.online = res.data.status.PERC_USERS_OFFLINE;
                    this.status.busy = res.data.status.PERC_USERS_BUSY;
                });
            },
        }
    }
</script>