<template>
    <div>
        <b-card
            :header="portalModule.name">
            <b-card-text>{{portalModule.description}}</b-card-text>
            <b-button variant="secondary" v-b-modal="'new-' + this.portalModule.alias">New</b-button>
            <b-button variant="secondary" v-b-modal="'open-' + this.portalModule.alias">Open</b-button>
        </b-card>


        <b-modal :id="'new-' + this.portalModule.alias" title="Create a new module">
            <create-module-instance
                :portal-module="this.portalModule"></create-module-instance>
        </b-modal>

        <b-modal :id="'open-' + this.portalModule.alias" title="Open a new module">
            <open-module-instance
                :portal-module="this.portalModule"></open-module-instance>
        </b-modal>



    </div>
</template>

<script>
    import CreateModuleInstance from './CreateModuleInstance';
    import OpenModuleInstance from './OpenModuleInstance';

    export default {
        name: "ModuleCard",

        components: {
            CreateModuleInstance, OpenModuleInstance
        },

        props: {
            portalModule: {
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
