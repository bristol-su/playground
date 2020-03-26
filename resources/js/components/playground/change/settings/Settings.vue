<template>
    <div>
        <vue-form-generator :schema="moduleSettings.schema" :model="currentModel" :options="moduleSettings.options">
        </vue-form-generator>

        <b-button style="width: 90%; margin: auto;" variant="primary" @click="update">Update Settings</b-button>
    </div>
</template>

<script>
    import VueFormGenerator from 'vue-form-generator'
    import axios from 'axios';

    export default {
        name: "Settings",

        props: {
            moduleSettings: {
                required: true,
                type: Object,
                default: function () {
                    return {
                        model: {},
                        options: {},
                        schema: {}
                    }
                }
            }
        },

        data() {
            return {
                settings: [],
                currentModel: {}
            }
        },

        created() {
            this.$http.get('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/setting')
                .then(response => {
                    this.settings = response.data;
                    this.updateModel();
                })
                // .catch(error => this.$notify.alert('Could not load settings'));

        },

        methods: {
            update() {
                axios.all(Object.keys(this.currentModel).map(key => {
                    let settings = this.settings.filter(setting => setting.key === key);
                    if(settings.length > 0) {
                        return this.$http.patch(
                            '/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/setting/' + settings[0].id,
                            {value: this.currentModel[key]});
                    }
                    return this.$http.post('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/setting',
                        {key: key, value: this.currentModel[key]});
                }))
                .then(responses => window.location.reload(true))
                .catch(error => this.$notify.alert('There was a problem saving some settings'));
            },


            updateModel() {
                let settings = {};
		Object.keys(this.currentModel).forEach(key => {
                    settings[key] = this.currentModel[key].value;
                });
		this.settings.forEach(setting => settings[setting.key] = setting.value);
                this.currentModel = VueFormGenerator.schema.createDefaultObject(this.moduleSettings.schema, settings);
            }
        },

    }
</script>

<style scoped>

</style>
