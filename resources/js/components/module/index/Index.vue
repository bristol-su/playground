<template>
    <div>
        <p-dynamic-form :schema="form">

        </p-dynamic-form>
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
        computed: {
            form() {
                let schema = this.$tools.generator.form.newForm('Upload a new file')
                    .withGroup(
                        this.$tools.generator.group.newGroup()
                            .withField(
                                this.$tools.generator.field.text('title')
                                    .label('Name of the document')
                                    .required(true)
                                    .value(this.defaultDocumentTitle)
                            )
                            .withField(
                                this.$tools.generator.field.text('description')
                                    .label('A description for the document')
                                    .required(false)
                            )
                            .withField(
                                this.$tools.generator.field.file('file')
                                    .label('The file(s) to upload')
                                    .required(true)
                                    .hint('You can upload files of the type aaa')
                            )
                    )
                    .generate()
                    .asJson();
                console.log(schema);
                return schema;
            }
        }
    }
</script>

<style scoped>

</style>
