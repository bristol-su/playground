<template>
    <div>
        <p-dynamic-form :schema="moduleSettings" v-model="currentModel">
        </p-dynamic-form>

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
                return {}
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
        this.$basicHttp.get('/api/module-instance/' + window.portal.module_instance.slug + '/setting')
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
                if (settings.length > 0) {
                    return this.$basicHttp.patch(
                        '/api/module-instance/' + window.portal.module_instance.slug + '/setting/' + settings[0].id,
                        {value: this.currentModel[key]});
                }
                return this.$basicHttp.post('/api/module-instance/' + window.portal.module_instance.slug + '/setting',
                    {key: key, value: this.currentModel[key]});
            }))
                .then(responses => window.location.reload(true))
                .catch(error => this.$notify.alert('There was a problem saving some settings'));
        },


        updateModel() {
            let settings = {};
            let self = this;
            Object.keys(this.currentModel).forEach(key => {
                settings[key] = self.currentModel[key];
            });
            this.settings.forEach(setting => settings[setting.key] = setting.value);
            this.currentModel = settings;
        }
    },

}
</script>

<style scoped>

</style>
