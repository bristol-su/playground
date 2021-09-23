<template>
    <div>
        Required:
        <service
            v-for="service in required"
            :key="service"
            :service="service"
            :value="getValueFor(service)"
            :id="getIdFor(service)"
            @updateService="updateService"
            @deleteService="deleteService(service)"
            @newService="moduleInstanceServices.push($event)"></service>
        Optional:
        <service
            v-for="service in optional"
            :key="service"
            :service="service"
            :value="getValueFor(service)"
            :id="getIdFor(service)"
            @updateService="updateService"
            @deleteService="deleteService(service)"
            @newService="moduleInstanceServices.push($event)"></service>

    </div>
</template>

<script>
    import Service from './Service';

    export default {
        name: "Services",
        components: {Service},

        props: {
            required: {
                required: false,
                type: Array,
                default: function() {
                    return [];
                }
            },

            optional: {
                required: false,
                type: Array,
                default: function() {
                    return [];
                }
            },

        },

        data() {
            return {
                moduleInstanceServices: []
            }
        },

        created() {
            this.$httpBasic.get('/module-instance/' + window.portal.module_instance.slug + '/service')
                .then(response => this.moduleInstanceServices = response.data)
                .catch(error => this.$notify.alert('Could not load services'));
        },

        methods: {
            updateService(service) {
                let s = this.moduleInstanceServices.filter(ser => ser.id === service.id)[0];
                this.moduleInstanceServices.splice(this.moduleInstanceServices.indexOf(s), 1, service);
            },

            deleteService(serviceName) {
                this.moduleInstanceServices = this.moduleInstanceServices.filter(ser => ser.service !== serviceName);
            },

            getValueFor(serviceName) {
                let s = this.moduleInstanceServices.filter(ser => ser.service === serviceName);
                if(s.length > 0) {
                    return s[0].connection_id;
                }
                return null;
            },
            getIdFor(serviceName) {
                let s = this.moduleInstanceServices.filter(ser => ser.service === serviceName);
                if(s.length > 0) {
                    return s[0].id;
                }
                return null;
            },
        }

    }
</script>

<style scoped>

</style>
