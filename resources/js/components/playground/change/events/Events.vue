<template>
    <div>
        <b-list-group>
            <b-list-group-item :key="eventType.event"
                               class="flex-column align-items-start"
                               href="#"
                               v-for="eventType of eventOptions"
                                @click="showEventDetails(eventType)">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{eventType.name}}</h5>
                    <small>Events Fired: {{eventType.fired.length}}</small>
                </div>

                <p class="mb-1">
                    {{eventType.description}}
                </p>

                <small>Click to see more information</small>
            </b-list-group-item>
        </b-list-group>

        <b-modal id="event-details-modal">
            <event :event="this.eventToView" v-if="eventToView !== null"></event>
            <span v-else>No event selected. Please try again.</span>
        </b-modal>
    </div>
</template>

<script>
    import Event from './Event';

    export default {
        name: "Events",

        props: {},

        components: {
            Event
        },

        data() {
            return {
                events: [],
                eventTypes: [],
                eventToView: null
            }
        },

        created() {
            this.loadEvents();
            this.loadEventTypes();
        },

        methods: {
            loadEvents() {
                this.$basicHttp.get('/api/module-instance/' + window.portal.module_instance.slug + '/event')
                    .then(response => this.events = response.data)
                    .catch(error => this.$notify.alert('Could not load events: ' + error.message));
            },
            loadEventTypes() {
                this.$basicHttp.get('/api/module/' + portal.module_instance.alias + '/event')
                    .then(response => this.eventTypes = response.data)
                    .catch(error => this.$notify.alert('Could not load event types: ' + error.message));
            },
            showEventDetails(event) {
                this.eventToView = event
                this.$bvModal.show('event-details-modal')
            }
        },

        computed: {
            eventOptions() {
                return this.eventTypes.map(eventType => {
                    eventType.fired = this.events.filter(event => event.event === eventType.event);
                    return eventType;
                })
            }
        }
    }
</script>

<style scoped>

</style>
