<template>
    <div>
        <p-table :busy="$isLoading('load-module-instances')" :items="moduleInstances" :columns="columns" :viewable="true" :deletable="true" @view="openModuleInstance($event)" @delete="openModuleInstance($event)">
            <template #cell(updated_at)="{row}">
                {{row.updated_at | datetime }}
            </template>
        </p-table>
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
                columns: [
                    {key: 'name', label: 'Name'},
                    {key: 'updated_at', label: 'Last Modified'}
                ]
            }
        },

        filters: {
            datetime(datetime) {
                return moment(datetime).format('ddd Do MMM, h:mm:ss a')
            }
        },

        created() {
            this.$httpBasic.get('/module/' + this.portalModule.alias + '/module-instance', {name: 'load-module-instances'})
                .then(response => this.moduleInstances = response.data)
                .catch(error => this.$notify.alert('Could not load saved modules'));
        },

        methods: {
            openModuleInstance(moduleInstance) {
                window.location.href = '/p/' + moduleInstance.activity.slug + '/' + moduleInstance.slug;
            },

            deleteModuleInstance(moduleInstance) {
                this.$ui.confirm.delete('Delete ' + moduleInstance.name + '?', 'Are you sure you want to delete the ' + moduleInstance.alias + ' module?')
                    .then(() => {
                        this.$httpBasic.delete('/module/' + this.portalModule.alias + '/module-instance/' + moduleInstance.id)
                            .then(response => {
                                this.$notify.success('Deleted module ' + moduleInstance.name);
                                this.moduleInstances.splice(this.moduleInstances.indexOf(moduleInstance), 1);
                            })
                            .catch(error => this.$notify.warning('Could not delete module instance'));
                    })
            }
        },

        computed: {}
    }
</script>

<style scoped>

</style>
