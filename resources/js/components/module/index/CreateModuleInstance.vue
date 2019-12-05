<template>
    <div>
        <b-form @submit.prevent="createModule">
            <b-form-group id="name-group" label="Name:" label-for="name">
                <b-form-input
                    id="name"
                    v-model="name"
                    required
                    placeholder="Enter name for the module"
                ></b-form-input>
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
                name: ''
            }
        },

        methods: {
            createModule() {
                this.$http.post('/api/module/' + this.portalModule.alias + '/module-instance', {name: this.name})
                    .then(response => {
                        window.location.href = '/p/' + response.data.activity.slug + '/' + response.data.slug;
                    })
                    .catch(error => this.$notify.alert('Could not create module'));
            }
        },

        computed: {}
    }
</script>

<style scoped>

</style>
