<template>
    <div>

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Module Tools <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" @click.prevent="show('settings-modal')">
                    Settings
                </a>

                <a class="dropdown-item" href="#" @click.prevent="show('permissions-modal')">
                    Permissions
                </a>

                <a class="dropdown-item" href="#" @click.prevent="show('services-modal')">
                    Services
                </a>

                <a class="dropdown-item" :href="oppositeUrl">
                    Go to {{(aorp==='a'?'Participant':'Admin')}}
                </a>
            </div>
        </li>

        <b-modal id="settings-modal" hide-backdrop content-class="shadow" title="Settings">
            <settings :module-settings="portalModule.settings"></settings>
        </b-modal>

        <b-modal id="permissions-modal" hide-backdrop content-class="shadow" title="Permissions">
            <permissions :permissions-of-module="portalModule.permissions"></permissions>
        </b-modal>

        <b-modal id="services-modal" hide-backdrop content-class="shadow" title="Services">
            <services :optional="optional" :required="required"></services>
        </b-modal>
    </div>
</template>

<script>
    import Settings from './change/Settings';
    import Permissions from './change/Permissions';
    import Services from './change/Services';

    export default {
        name: "Playground",

        components: {
            Permissions,
            Settings,
            Services
        },

        props: {},

        data() {
            return {
                portalModule: {},
                refreshable: [
                    'settings-modal', 'permissions-modal', 'services-modal'
                ]
            }
        },

        created() {
            this.loadModuleInformation();
        },

        mounted() {
            this.$root.$on('bv::modal::hidden', (bvEvent, modalId) => {
                if(this.refreshable.indexOf(modalId) !== -1) {
                    window.location.reload(true);
                }
            })
        },

        methods: {
            show(id) {
                this.$bvModal.show(id);
            },

            loadModuleInformation() {
                this.$http.get('/api/module/' + portal.ALIAS)
                .then(response => this.portalModule = response.data)
                .catch(error => this.$notify.alert('Could not load module data'));
            }
        },

        computed: {
            aorp() {
                return portal.A_OR_P;
            },

            oppositeUrl() {
                let aorp = this.aorp;
                if(aorp === 'a') {
                    aorp = 'p'
                } else {
                    aorp = 'a';
                }
                return portal.APP_URL + '/' + aorp + '/' + portal.ACTIVITY_SLUG + '/' + portal.MODULE_INSTANCE_SLUG + '/' + portal.ALIAS;
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
