<template>
    <div>
        <div v-if="connectors.length === 0">
            Loading...
        </div>
        <div v-else-if="!connector.hasOwnProperty('alias')">
            <b-row :key="c.alias" v-for="c in connectors" style="padding: 5px; width: 100%; text-align: center;">
                <b-col>
                    <b-button @click="connector = c"
                              variant="outline-info">
                        <p>{{c.name}}</p>
                        <p><small>{{c.description}}</small></p>
                    </b-button>
                </b-col>
            </b-row>
        </div>
        <div v-else>
            <add-connector :connector="connector" @newConnection="$emit('newConnection', $event)"></add-connector>
        </div>
    </div>
</template>

<script>
    import AddConnector from './AddConnector';

    export default {
        name: "AddService",
        components: {AddConnector},
        props: {
            service: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                connectors: [],
                connector: {}
            }
        },

        created() {
            this.$http.get('/api/service/' + this.service + '/connector')
                .then(response => this.connectors = response.data)
                .catch(error => this.$notify.alert('Could not load connectors.'));
        }
    }
</script>

<style scoped>

</style>
