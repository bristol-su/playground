<template>
    <div>
        <p-card
            v-for="portalModule in modules"
            :key="portalModule.alias"
            :title="portalModule.name"
            :subtitle="portalModule.description"
        >
            <p-button type="secondary" @click="openModule(portalModule)">Continue</p-button>
        </p-card>

        <p-modal id="manageModule" :title="currentModuleTitle" @hide="currentModule = null">
            Create a new module, or open an existing one
            <p-button variant="primary" @click="$ui.modal.show('new-module')">New</p-button>
            <p-button variant="secondary" @click="$ui.modal.show('open-module')">Open</p-button>
        </p-modal>

        <p-modal id="new-module" :title="'Create a new ' + currentModuleTitle + ' module'">
            <create-module-instance
                v-if="currentModule"
                :portal-module="currentModule"></create-module-instance>
        </p-modal>

        <p-modal id="open-module" :title="'Open an existing ' + currentModuleTitle + ' module'">
            <open-module-instance
                v-if="currentModule"
                :portal-module="currentModule"></open-module-instance>
        </p-modal>

    </div>
</template>

<script>
import CreateModuleInstance from './CreateModuleInstance';
import OpenModuleInstance from './OpenModuleInstance';

export default {
    name: "Index",
    components: {
        CreateModuleInstance,
        OpenModuleInstance
    },
    data() {
        return {
            modules: [],
            currentModule: null
        }
    },

    created() {
        this.$httpBasic.get('/module')
            .then(response => this.modules = response.data)
            .catch(error => this.$notify.alert('Could not load modules'));
    },

    methods: {
        openModule(module) {
            this.currentModule = module;
            this.$ui.modal.show('manageModule');
        }
    },

    computed: {
        currentModuleTitle() {
            return this.currentModule !== null ? this.currentModule.name : '';
        }
    }

}
</script>

<style scoped>

</style>
