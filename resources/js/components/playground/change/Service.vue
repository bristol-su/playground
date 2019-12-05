<template>
    <b-list-group-item class="flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{service}}</h5>

                <test-connector v-if="value !== null" :connection-id="value"></test-connector>
                <b-button @click="addConnection" size="sm"><i class="fa fa-plus"/> Add</b-button>
            </div>
            <p class="mb-1">
                <b-select :options="connectionOptions" @input="serviceChanged" :value="value">
                    <template v-slot:first>
                        <option :value="null" selected>-- No Connection --</option>
                    </template>
                </b-select>
            </p>
        <b-modal :id="'add-connection-' + service" :title="'Add new ' + service">
            <add-service :service="service" @newConnection="newConnection"></add-service>
        </b-modal>
    </b-list-group-item>
</template>

<script>
    import AddService from './AddService';
    import TestConnector from './TestConnector';
    export default {
        name: "Service",
        components: {TestConnector, AddService},
        props: {
            service: {
                required: true,
                type: String
            },
            value: {
                required: false,
                default: null
            },
            id: {
                required: false,
                default: null,
            }
        },

        data() {
            return {
                connections: []
            }
        },

        created() {
            this.$http.get('/api/service/' + this.service + '/connection')
                .then(response => this.connections = response.data)
                .catch(error => this.$notify.alert('Could not load connections: ' + error.message));
        },

        methods: {
            addConnection() {
                this.$bvModal.show('add-connection-' + this.service);
            },

            newConnection(connection) {
                this.connections.push(connection);
                this.$bvModal.hide('add-connection-' + this.service);
            },

            serviceChanged(value) {
                if(value !== null) {
                    if(this.id === null) {
                        this.createService(value);
                    } else {
                        this.updateService(value);

                    }
                } else if(this.id !== null) {
                    this.deleteService();
                }
            },

            updateService(connectionId) {
                this.$http.patch('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/service/' + this.id, {
                    connection_id: connectionId
                })
                    .then(response => {
                        this.$emit('updateService', response.data);
                        this.$notify.success('Service updated');
                    })
                    .catch(error => this.$notify.alert('Could not update the service'));
            },

            createService(connectionId) {
                this.$http.post('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/service', {
                    service: this.service,
                    connection_id: connectionId
                })
                    .then(response => {
                        this.$emit('newService', response.data);
                        this.$notify.success('Service updated');
                    })
                    .catch(error => this.$notify.alert('Could not update the service'));
            },

            deleteService() {
                this.$http.delete('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/service/' + this.id)
                    .then(response => {
                        this.$emit('deleteService');
                        this.$notify.success('Service deleted');
                    })
                .catch(error => this.$notify.alert('Could not delete the service'));
            }

        },

        computed: {
            connectionOptions() {
                return this.connections.map(connection => {
                    return {
                        value: connection.id, text: connection.name
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>
