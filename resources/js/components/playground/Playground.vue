<template>
    <div>
        <b-button pill v-b-toggle.playground-sidebar>Toggle Playground Tools</b-button>
        <b-sidebar id="playground-sidebar"
                   title="Playground Tools"
                   shadow
                   right
                   no-header
                   backdrop-variant="dark"
                   backdrop
                    @hidden="refreshPage">

            <template #default="{ hide }">
                <div class="p-3 d-flex justify-content-between">
                    <b-button pill
                              v-if="active !== null"
                              class="px-1"
                              variant="outline-secondary"
                              aria-label="Back to tools"
                              @click="active = null"><i class="fa fa-arrow-circle-left" aria-hidden="true"/></b-button>
                    <h4 class="px-1">Playground Tools</h4>
                    <b-button pill
                              class="px-1"
                              variant="outline-secondary"
                              aria-label="Close playground tools"
                              @click="hide"><i class="fa fa-times-circle" aria-hidden="true"/></b-button>
                </div>


                <div v-show="active === 'settings'">
                    <settings :module-settings="portalModule.settings"></settings>
                </div>
                <div v-show="active === 'permissions'">
                    <permissions :permissions-of-module="portalModule.permissions"></permissions>
                </div>
                <div v-show="active === 'services'">
                    <services :optional="optional" :required="required"></services>
                </div>
                <div v-show="active === 'completion-conditions'">
                    <completion-conditions :conditions="portalModule.completionConditions"></completion-conditions>
                </div>
                <div v-show="active === 'events'">
                    <events></events>
                </div>
                <div v-show="active === null">
                    TESTING
                    <b-list-group>
                        <b-list-group-item href="#" @click.prevent="show('settings')">Settings</b-list-group-item>
                        <b-list-group-item href="#" @click.prevent="show('permissions')">Permissions</b-list-group-item>
                        <b-list-group-item href="#" @click.prevent="show('services')">Services</b-list-group-item>
                        <b-list-group-item href="#" @click.prevent="show('completion-conditions')">Completion Conditions</b-list-group-item>
                        <b-list-group-item href="#" @click.prevent="show('events')">Events</b-list-group-item>
                        <b-list-group-item :href="oppositeUrl">
                            Go to {{(aorp==='a'?'Participant':'Admin')}}
                        </b-list-group-item>
                        <b-list-group-item variant="success" href="#" @click="refreshPage">
                            Apply new configuration
                        </b-list-group-item>
                    </b-list-group>
                </div>
            </template>

        </b-sidebar>

    </div>
</template>

<script>
    import Settings from './change/settings/Settings';
    import Permissions from './change/permission/Permissions';
    import Services from './change/services/Services';
    import CompletionConditions from './change/completion/CompletionConditions';
    import Events from './change/events/Events';

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

        mounted() {
            // this.$root.$on('bv::modal::hidden', (bvEvent, modalId) => {
            //     if(this.refreshable.indexOf(modalId) !== -1) {
            //         window.location.reload(true);
            //     }
            // })
        },

        methods: {
            show(id) {
                this.active = id;
            },

            loadModuleInformation() {
                this.$http.get('/api/module/' + window.portal.module_instance.alias)
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
