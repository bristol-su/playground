<template>
    <div>
        <div>
            <b-form-select v-model="selectedConditionAlias" :options="conditionOptions"></b-form-select>
        </div>
        <div v-if="selectedCondition.hasOwnProperty('alias')" style="padding-top: 15px;">
            <h3>Condition Settings</h3>
            <vue-form-generator :schema="selectedCondition.options.schema" :model="currentSettings" :options="selectedCondition.options.options">

            </vue-form-generator>

            <div style="width: 100%">
                <b-button variant="secondary" width="100%" @click="test">{{testButtonText}}</b-button>
            </div>
        </div>
        <div v-if="result !== null" style="padding-top: 10px;">
            <br/><hr/>
            <h3>Result</h3>
            <span v-if="result"><i class="fa fa-check" style="color: green;"/> The module is complete</span>
            <span v-else><i class="fa fa-times" style="color: red;"/> The module is NOT complete. {{percentage}}% complete.</span>
        </div>
    </div>
</template>

<script>
    import VueFormGenerator from 'vue-form-generator';

    export default {
        name: "CompletionConditions",

        props: {
            conditions: {
                required: false,
                type: Array,
                default: function() {
                    return [];
                }
            }
        },

        data() {
            return {
                selectedConditionAlias: null,
                testing: false,
                result: null,
                percentage: null,
                currentSettings: {}
            }
        },

        watch: {
            selectedConditionAlias(val) {
                if(val !== null) {
                    this.currentSettings = VueFormGenerator.schema.createDefaultObject(this.selectedCondition.options.schema);
                }
            }
        },

        methods: {
            test() {
                this.testing = true;
                this.$http.post('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/completion-condition', {
                    alias: this.selectedConditionAlias,
                    settings: this.currentSettings
                })
                    .then(response => {
                        this.$http.get('/api/module-instance/' + portal.MODULE_INSTANCE_SLUG + '/completion-condition/test', {
                            params: {activity_instance_id: portal.activityinstance.id}
                        })
                            .then(response => {
                                this.result = response.data.result;
                                this.percentage = response.data.percentage;
                            })
                            .catch(error => this.$notify.alert('Something went wrong when testing the condition'))
                            .then(this.testing = false);
                    })
                    .catch(error => {
                        this.$notify.alert('Could not save the condition settings');
                        this.testing = false
                    });
            }
        },

        computed: {
            conditionOptions() {
                return this.conditions.map(condition => {
                    return {value: condition.alias, text: condition.name}
                })
            },
            selectedCondition() {
                let conditions = this.conditions.filter(condition => condition.alias === this.selectedConditionAlias);
                if(conditions.length > 0) {
                    return conditions[0];
                }
                return {};
            },
            testButtonText() {
                if(this.testing) {
                    return 'Testing...';
                }
                return 'Test';
            }
        }
    }
</script>

<style scoped>

</style>
