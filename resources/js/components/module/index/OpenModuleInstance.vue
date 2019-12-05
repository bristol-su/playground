<template>
    <div>
        <b-table :items="moduleInstances" :fields="fields">
            <template v-slot:cell(actions)="data">
                <b-button size="sm" variant="info" @click="openModuleInstance(data.item)">Open</b-button>
                <b-button size="sm" variant="danger" @click="deleteModuleInstance(data.item)">Delete</b-button>
            </template>

            <template v-slot:cell(updated_at)="data">
                {{data.item.updated_at | datetime }}
            </template>
        </b-table>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        name: "OpenModuleInstance",

        props: {
            portalModule: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                moduleInstances: [],
                fields: [
                    {key: 'name', label: 'Name'},
                    {key: 'updated_at', label: 'Last Modified'},
                    {key: 'actions', label: ''}
                ]
            }
        },

        filters: {
            datetime(datetime) {
                return moment(datetime).format('ddd Do MMM, h:mm:ss a')
            }
        },

        created() {
            this.$http.get('/api/module/' + this.portalModule.alias + '/module-instance')
                .then(response => this.moduleInstances = response.data)
                .catch(error => this.$http.alert('Could not load saved modules'));
        },

        methods: {
            openModuleInstance(moduleInstance) {
                window.location.href = '/p/' + moduleInstance.activity.slug + '/' + moduleInstance.slug;
            },

            deleteModuleInstance(moduleInstance) {
                this.$http.delete('/api/module/' + this.portalModule.alias + '/module-instance/' + moduleInstance.id)
                    .then(response => {
                        this.$notify.success('Deleted module ' + moduleInstance.name);
                        this.moduleInstances.splice(this.moduleInstances.indexOf(moduleInstance), 1);
                    })
                    .catch(error => this.$notify.warning('Could not delete module instance'));
            }
        },

        computed: {}
    }
</script>

<style scoped>

</style>
