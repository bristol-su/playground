<template>
    <div>
        <div>
            <p-select id="completion_condition" v-model="selectedConditionAlias" :select-options="conditionOptions" label="Select a completion condition to test" :required="true"></p-select>
        </div>
        <div v-if="selectedCondition.hasOwnProperty('alias')" style="padding-top: 15px;">
            <h3>Condition Settings</h3>
            <p-dynamic-form :schema="selectedCondition.options" v-model="currentSettings">

            </p-dynamic-form>

            <div style="width: 100%">
                <p-button variant="secondary" @click="test">{{testButtonText}}</p-button>
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
                    this.currentSettings = this.selectedCondition.options;
                }
            }
        },

        methods: {
            test() {
                this.testing = true;
                this.$httpBasic.post('/module-instance/' + window.portal.module_instance.slug + '/completion-condition', {
                    alias: this.selectedConditionAlias,
                    settings: this.currentSettings
                })
                    .then(response => {
                        this.$httpBasic.get('/module-instance/' + window.portal.module_instance.slug + '/completion-condition/test', {
                            params: {activity_instance_id: window.portal.activity_instance.id}
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
                    return {id: condition.alias, value: condition.name}
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
