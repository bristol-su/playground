<template>
    <div>
        <div v-if="eventTypeToView === null">
            <p-table
                :items="eventOptions"
                :columns="columns.eventType"
                :viewable="true"
                @view="eventTypeToView = $event">
            </p-table>
        </div>
        <div v-else-if="eventToView === null">
            <p-button @click="eventTypeToView = null">< Back</p-button>
            Instances of {{ eventTypeToView.name }}
            <p-table
                :items="eventTypeToView.fired"
                :columns="columns.events"
                :viewable="true"
                @view="eventToView = $event">

            </p-table>
        </div>
        <div v-else>
            <p-button @click="eventToView = null">< Back</p-button>

            <p-table :items="firedDataAsItems" :columns="columns.event">

            </p-table>
        </div>
    </div>
</template>

<script>

export default {
    name: "Events",

    props: {},

    data() {
        return {
            events: [],
            columns: {
                eventType: [
                    {label: 'Name', key: 'name'},
                    {label: 'Description', key: 'description'},
                    {label: '# Fired', key: 'fired_count'}
                ],
                events: [
                    {label: 'Fired At', key: 'created_at'}
                ],
                event: [
                    {label: 'Key', key: 'key'},
                    {label: 'Value', key: 'value'}
                ],
            },
            eventTypes: [],
            eventTypeToView: null,
            eventToView: null
        }
    },

    created() {
        this.loadEvents();
        this.loadEventTypes();
    },

    methods: {
        loadEvents() {
            this.$httpBasic.get('/module-instance/' + window.portal.module_instance.slug + '/event')
                .then(response => this.events = response.data)
                .catch(error => this.$notify.alert('Could not load events: ' + error.message));
        },
        loadEventTypes() {
            this.$httpBasic.get('/module/' + portal.module_instance.alias + '/event')
                .then(response => this.eventTypes = response.data)
                .catch(error => this.$notify.alert('Could not load event types: ' + error.message));
        }
    },

    computed: {
        eventOptions() {
            return this.eventTypes.map(eventType => {
                eventType.fired = _.cloneDeep(this.events.filter(event => event.event === eventType.event));
                eventType.fired.reverse();
                eventType.fired_count = eventType.fired.length;
                return eventType;
            })
        },
        firedDataAsItems() {
            if(this.eventToView === null) {
                return [];
            }

            return Object.entries(this.eventToView.data).map(([key, value]) => {
                return { key: key, value: value };
            })
        }
    }
}
</script>

<style scoped>

</style>
