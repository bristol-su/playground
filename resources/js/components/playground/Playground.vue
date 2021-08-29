<template>
    <div>
        <p-button @click="$ui.modal.show('playground-sidebar')">Toggle Playground Tools</p-button>
        <p-modal id="playground-sidebar" title="Edit Module" @hide="refreshPage">
            <p-button :href="oppositeUrl" variant="secondary">Go to {{(aorp==='a'?'Participant':'Admin')}}</p-button>
            <p-tabs>
                <p-tab title="Settings">
                    <settings v-if="Object.keys(portalModule).length > 0" :module-settings="portalModule.settings"></settings>
                </p-tab>
                <p-tab title="Permissions">
                    <permissions :permissions-of-module="portalModule.permissions"></permissions>
                </p-tab>
                <p-tab title="Services">
                    <services :optional="optional" :required="required"></services>
                </p-tab>
                <p-tab title="Completion Conditions">
                    <completion-conditions :conditions="portalModule.completionConditions"></completion-conditions>
                </p-tab>
                <p-tab title="Events">
                    <events></events>
                </p-tab>
            </p-tabs>
        </p-modal>
    </div>
</template>

<script>
    import Settings from './change/Settings';
    import Permissions from './change/permission/Permissions';
    import Services from './change/services/Services';
    import CompletionConditions from './change/CompletionConditions';
    import Events from './change/Events';

    export default {
        name: "Playground",

        components: {
            Events,
            Permissions,
            Settings,
            Services,
            CompletionConditions
        },

        props: {},

        data() {
            return {
                portalModule: {},
                refreshable: [
                    'settings-modal', 'permissions-modal', 'services-modal'
                ],
                active: null
            }
        },

        created() {
            this.loadModuleInformation();
        },

        methods: {
            show(id) {
                this.active = id;
            },

            loadModuleInformation() {
                this.$httpBasic.get('/module/' + window.portal.module_instance.alias)
                .then(response => this.portalModule = response.data)
                .catch(error => this.$notify.alert('Could not load module data'));
            },

            refreshPage() {
                window.location.reload(true);
            }
        },

        computed: {
            aorp() {
                return window.portal.admin ? 'a' : 'p';
            },

            oppositeUrl() {
                let aorp = this.aorp;
                if(aorp === 'a') {
                    aorp = 'p'
                } else {
                    aorp = 'a';
                }
                return window.portal.APP_URL + '/' + aorp + '/' + window.portal.activity.slug + '/' + window.portal.module_instance.slug + '/' + window.portal.module_instance.alias;
            },
            optional() {
                if(this.portalModule.hasOwnProperty('services') && this.portalModule.services.hasOwnProperty('optional')) {
                    return this.portalModule.services.optional;
                }
                return [];
            },
            required() {
                if(this.portalModule.hasOwnProperty('services') && this.portalModule.services.hasOwnProperty('required')) {
                    return this.portalModule.services.required;
                }
                return [];
            }
        }
    }
</script>

<style scoped>

</style>
