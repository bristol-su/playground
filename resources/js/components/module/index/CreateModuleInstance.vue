<template>
    <div>
        <b-form @submit.prevent="createModule">
            <b-form-group id="name-group" label="Name:" label-for="name">
                <b-form-input
                    id="name"
                    placeholder="Enter name for the module"
                    required
                    v-model="name"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="activity-for-group" label="For:" description="Who is the module to be used by - users, groups or roles?" label-for="activity-for">
                <b-form-select id="activity-for" :options="activityForOptions" v-model="activityFor" required></b-form-select>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "CreateModuleInstance",

        props: {
            portalModule: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                name: '',
                activityFor: null
            }
        },

        methods: {
            createModule() {
                this.$basicHttp.post('/api/module/' + this.portalModule.alias + '/module-instance', {
                    name: this.name, activity_for: this.activityFor
                })
                    .then(response => {
                        window.location.href = '/p/' + response.data.activity.slug + '/' + response.data.slug;
                    })
                    .catch(error => this.$notify.alert('Could not create module'));
            }
        },

        computed: {
            activityForOptions() {
                let options = [];

                if(this.portalModule.for === 'role') {
                    options.push({value: 'role', text: 'Roles'});
                } else if(this.portalModule.for === 'group') {
                    options.push({value: 'group', text: 'Groups'});
                    options.push({value: 'role', text: 'Roles'});
                } else if(this.portalModule.for === 'user') {
                    options.push({value: 'user', text: 'Users'});
                    options.push({value: 'group', text: 'Groups'});
                    options.push({value: 'role', text: 'Roles'});
                }

                return options;
            }
        }
    }
</script>

<style scoped>

</style>
