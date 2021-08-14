<template>
    <b-list-group-item class="flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{permission.name}}</h5>
            <b-form-checkbox :checked="this.value" @input="updatePermission($event)" switch size="lg"/>
        </div>
        <p class="mb-1">
            {{permission.description}}
        </p>
    </b-list-group-item>
</template>

<script>
    export default {
        name: "Permission",

        props: {
            permission: {
                required: true,
                type: Object
            },
            value: {
                required: true,
                type: Boolean,
            },
            id: {
                required: false,
                default: null,
            }
        },

        data() {
            return {

            }
        },


        methods: {
            updatePermission(value) {
                if(this.id === null) {
                    this.createPermission(value);
                } else {
                    this.$http.patch('/api/module-instance/' + window.portal.module_instance.slug + '/permission/' + this.id, {
                        result: value
                    })
                        .then(response => {
                            this.$emit('updatePermission', response.data);
                            this.$notify.success('Permission updated');
                        })
                        .catch(error => this.$notify.alert('Could not update the permission'));
                }
            },

            createPermission(value) {
                this.$http.post('/api/module-instance/' + window.portal.module_instance.slug + '/permission', {
                    ability: this.permission.ability,
                    result: value
                })
                    .then(response => {
                        this.$emit('newPermission', response.data);
                        this.$notify.success('Permission updated');
                    })
                    .catch(error => this.$notify.alert('Could not update the permission'));
            },

        }

    }
</script>

<style scoped>

</style>
