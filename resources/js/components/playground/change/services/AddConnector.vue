<template>
    <div>
        <p-dynamic-form :schema="metaFormSchema" v-model="metaForm">

        </p-dynamic-form>

        <p-dynamic-form :schema="connector.settings" v-model="form.settings">

        </p-dynamic-form>

        <p-button variant="info" @click="saveNewConnection">Save Connection</p-button>
    </div>
</template>

<script>
    export default {
        name: "AddConnector",

        props: {
            connector: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                metaForm: {
                    name: '',
                    description: ''
                },
                form: {
                    alias: this.connector.alias,
                    settings: {}
                }
            }
        },

        created() {
            this.form.settings = this.model;
        },

        methods: {
            saveNewConnection() {
                this.$httpBasic.post('/connection', {
                    name: this.metaForm.name,
                    description: this.metaForm.description,
                    alias: this.form.alias,
                    settings: this.form.settings
                })
                    .then(response => {
                        this.$notify.success('Connection established');
                        this.$emit('newConnection', response.data);
                    })
                    .catch(error => this.$notify.alert('Could not create connection: ' + error.message));
            }
        },

        computed: {
            defaultName() {
                return 'My ' + this.connector.name + ' connection';
            },
            model() {
                return this.connector.settings.model;
            },
            metaFormSchema() {
                return this.$tools.generator.form.newForm()
                    .withGroup(this.$tools.generator.group.newGroup()
                        .withField(this.$tools.generator.field.text('name')
                            .label('Connection Name')
                            .hint('A name for the connection')
                            .required(true)
                            .value(this.defaultName)
                        ).withField(this.$tools.generator.field.textArea('description')
                            .label('Description')
                            .hint('A description for the connection to help you identify it in the future.')
                        )
                    )
                    .generate()
                    .asJson()
            }
        }
    }
</script>

<style scoped>

</style>
