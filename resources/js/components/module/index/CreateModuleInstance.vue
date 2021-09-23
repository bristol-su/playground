<template>
    <div>
        <p-api-form :schema="form" @submit="createModule" :busy="$isLoading('creating-module')">

        </p-api-form>
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

        methods: {
            createModule(data) {
                this.$httpBasic.post('/module/' + this.portalModule.alias + '/module-instance', {
                    name: data.name, activity_for: data.activityFor
                }, {name: 'creating-module'})
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
            },
            form() {
                let activityForField = this.$tools.generator.field.select('activityFor')
                    .label('Who is the module to be used by?')
                    .hint('This defines what group of people would normally work together to complete it.')
                    .required(true)
                    .value('user');

                this.activityForOptions.forEach(option => activityForField.withOption(option.value, option.text));

                return this.$tools.generator.form.newForm()
                    .withGroup(this.$tools.generator.group.newGroup()
                        .withField(this.$tools.generator.field.text('name')
                            .label('Name the module')
                            .value('New ' + this.portalModule.name + ' Module')
                            .required(true)
                            .hint('This will help you identify it later')
                        )
                        .withField(activityForField)
                    )
            }
        }
    }
</script>

<style scoped>

</style>
