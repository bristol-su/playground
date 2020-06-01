<template>
    <div role="tablist">
        <b-card no-body class="mb-1" v-for="event of events" :key="event.id">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle="'accordion-' + event.id" variant="info">{{event.created_at | datetime}}</b-button>
            </b-card-header>
            <b-collapse :id="'accordion-' + event.id" accordion="fired-event-accordian" role="tabpanel">
                <b-card-body>
                    <b-card-text>
                        <b-table :fields="fields" :items="transformData(event.data)"></b-table>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: "EventDetails",

        props: {
            firedEvents: {
                required: false,
                type: Array,
                default: function() {
                    return [];
                }
            }
        },

        data() {
            return {
                fields: [
                    {key: 'key', label: 'Key'},
                    {key: 'value', label: 'Value'}
                ]
            }
        },

        methods: {
            transformData(data) {
                let transformedData = []
                for(let key of Object.keys(data)) {
                    transformedData.push({key: key, value: data[key]});
                }
                return transformedData;
            }
        },

        filters: {
            datetime(val) {
                return moment(val).format('DD/MM/YYYY HH:mm:ss');
            }
        },

        computed: {
            events() {
                return this.firedEvents.reverse();
            }
        }
    }
</script>

<style scoped>

</style>
