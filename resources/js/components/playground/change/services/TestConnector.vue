<template>
    <div>
        <b-button :variant="variant" @click="testConnection" size="sm">
            <i :class="icon" class="fa"></i> Test
        </b-button>
    </div>
</template>

<script>
    export default {
        name: "TestConnector",

        props: {
            connectionId: {
                required: true
            }
        },

        data() {
            return {
                testResult: null
            }
        },

        watch: {
            connectionId: {
                handler: function() {
                    this.testResult = null;
                }
            }
        },
        methods: {
            testConnection() {
                this.$basicHttp.get('/api/connection/' + this.connectionId + '/test')
                    .then(response => {this.testResult = response.data.result})
                    .catch(error => this.$notify.alert('Testing could not be completed: ' + error.message));
            }
        },

        computed: {
            variant() {
                if (this.testResult === true) {
                    return 'outline-success';
                } else if (this.testResult === false) {
                    return 'outline-danger';
                } else {
                    return 'outline-info';
                }
            },
            icon() {
                if (this.testResult === true) {
                    return 'fa-check';
                } else if (this.testResult === false) {
                    return 'fa-times';
                } else {
                    return 'fa-question';
                }
            }
        }
    }
</script>

<style scoped>

</style>
