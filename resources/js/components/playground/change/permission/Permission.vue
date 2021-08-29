<template>
    <div>
        <p-switch
            :id="permission.ability"
            :label="permission.name"
            :hint="permission.description"
            :value="value"
            @input="updatePermission($event)">

        </p-switch>
    </div>
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
                    this.$httpBasic.patch('/module-instance/' + window.portal.module_instance.slug + '/permission/' + this.id, {
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
                this.$httpBasic.post('/module-instance/' + window.portal.module_instance.slug + '/permission', {
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
