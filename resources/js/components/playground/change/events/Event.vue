<template>
    <div>
        <b-row>
            <b-col>
                <h3>{{event.name}}</h3>
            </b-col>
        </b-row>
        <b-row>
            <b-col>
                {{event.description}}
            </b-col>
        </b-row>
        <b-row>
            <b-col>
                <event-details :fired-events="event.fired"></event-details>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    import EventDetails from './EventDetails';
    export default {
        name: "Event",
        components: {EventDetails},
        props: {
            event: {
                required: true,
                type: Object
            }
        },

        data() {
            return {}
        },

        methods: {},

        computed: {}
    }
</script>

<style scoped>

</style>
