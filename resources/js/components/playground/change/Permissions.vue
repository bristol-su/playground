<template>
    <div>

        <b-tabs content-class="mt-3">
            <b-tab title="Participant" active>
                <b-list-group>
                    <permission
                        v-for="permission in participantPermissions"
                        :key="permission.ability"
                        :permission="permission"
                        :value="getValueFor(permission.ability)"
                        :id="getIdFor(permission.ability)"
                        @newPermission="permissions.push($event)"
                        @updatePermission="updatePermission"></permission>
                </b-list-group>
            </b-tab>
            <b-tab title="Admin">
                <b-list-group>
                    <permission
                        v-for="permission in adminPermissions"
                        :key="permission.ability"
                        :permission="permission"
                        :value="getValueFor(permission.ability)"
                        :id="getIdFor(permission.ability)"
                        @newPermission="permissions.push($event)"
                        @updatePermission="updatePermission"></permission>
                </b-list-group>
            </b-tab>
        </b-tabs>

    </div>
</template>

<script>
    import Permission from './Permission';

    export default {
        name: "Permissions",
        components: {Permission},
        props: {
            permissionsOfModule: {
                required: true,
                type: Array,
                default: function () {
                    return [];
                }
            }
        },

        data() {
            return {
                permissions: [],
            }
        },

        created() {
            this.loadPermissions();
        },

        methods: {
            loadPermissions() {
                this.$http.get('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/permission')
                    .then(response => {this.permissions = response.data})
                    .catch(error => this.$notify.alert('Could not load permissions'));
            },
            getValueFor(ability) {
                let p = this.permissions.filter(per => per.ability === ability);
                if(p.length > 0) {
                    return p[0].result;
                }
                return true;
            },
            getIdFor(ability) {
                let p = this.permissions.filter(per => per.ability === ability);
                if(p.length > 0) {
                    return p[0].id;
                }
                return null;
            },
            updatePermission(permission) {
                let p = this.permissions.filter(per => per.id === permission.id)[0];
                this.permissions.splice(this.permissions.indexOf(p), 1, permission);
            }
        },

        computed: {
            participantPermissions() {
                return this.permissionsOfModule.filter(permission => permission.module_type === 'participant');
            },
            adminPermissions() {
                return this.permissionsOfModule.filter(permission => permission.module_type === 'administrator');
            },
        }
    }
</script>

<style scoped>

</style>
