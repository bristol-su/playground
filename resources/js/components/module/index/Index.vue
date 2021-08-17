<template>
    <div>
        <b-row>
            <b-col style="text-align: center;">
                <h3>Choose a module</h3>
            </b-col>
        </b-row>
        <b-row v-for="portalModule in modules"
            :key="portalModule.alias">
            <b-col style="padding: 10px">
                <module-card
                    :portal-module="portalModule">

                </module-card>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    import ModuleCard from './ModuleCard';
    export default {
        name: "Index",
        components: {ModuleCard},
        data() {
            return {
                modules: []
            }
        },

        created() {
            this.$basicHttp.get('/api/module')
                .then(response => this.modules = response.data)
                .catch(error => this.$notify.alert('Could not load modules'));
        },

    }
</script>

<style scoped>

</style>
