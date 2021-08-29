<template>
    <div>
        <div v-if="addingService === false">

            <p-select
                :id="'service_' + this.service"
                @input="serviceChanged"
                :label="service"
                :hint="'Select a connection to use for ' + service"
                :value="value"
                :select-options="connectionOptions"
                null-label="-- No Connection --">

            </p-select>

            <test-connector v-if="value !== null" :connection-id="value"></test-connector>
            <p-button @click="addingService = true"><i class="fa fa-plus"/> Add</p-button>
        </div>
        <div v-else>
            <p-button @click="addingService = false">< Back</p-button>
            <add-service :service="service" @newConnection="newConnection"></add-service>
        </div>
    </div>
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
            connections: [],
            addingService: false
        }
    },

    created() {
        this.$httpBasic.get('/service/' + this.service + '/connection')
            .then(response => this.connections = response.data)
            .catch(error => this.$notify.alert('Could not load connections: ' + error.message));
    },

    methods: {
        newConnection(connection) {
            this.connections.push(connection);
            this.addingService = false;
        },

        serviceChanged(value) {
            if (value !== null) {
                if (this.id === null) {
                    this.createService(value);
                } else {
                    this.updateService(value);

                }
            } else if (this.id !== null) {
                this.deleteService();
            }
        },

        updateService(connectionId) {
            this.$httpBasic.patch('/module-instance/' + window.portal.module_instance.slug + '/service/' + this.id, {
                connection_id: connectionId
            })
                .then(response => {
                    this.$emit('updateService', response.data);
                    this.$notify.success('Service updated');
                })
                .catch(error => this.$notify.alert('Could not update the service'));
        },

        createService(connectionId) {
            this.$httpBasic.post('/module-instance/' + window.portal.module_instance.slug + '/service', {
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
            this.$httpBasic.delete('/module-instance/' + window.portal.module_instance.slug + '/service/' + this.id)
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
                    id: connection.id, value: connection.name
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
