<template>
    <div>
        <div v-if="loading">
            Loading ...
        </div>
        <div v-else>
            <div v-if="contacts.length === 0">
                <p>You haven't contacts yet. Lets <router-link class="text-blue-600" to="/contacts/create">create a new one</router-link> now!</p>
            </div>
            <div v-else>
                <div v-for="contact in contacts">
                    <router-link :to="'/contacts/' + contact.data.contact_id" class="flex items-center border-b
                    border-gray-400 p-4 hover:bg-gray-100">
                        <UserCircle :name="contact.data.name" />
                        <div class="p-4">
                            <p class="text-blue-400 font-bold">{{ contact.data.name }}</p>
                            <p class="text-gray-600 font-bold">{{ contact.data.company }}</p>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserCircle from "./UserCircle";
    export default {
        name: "ContactList",
        data: function() {
            return {
              loading: true,
              contacts: null,
            };
        },
        components: {
            UserCircle,
        },
        props: [
          'endpoint',
        ],
        mounted() {
            axios.get(this.endpoint).
            then(response => {
                this.contacts = response.data.data;
                this.loading = false;
            }).
            catch(err => {
                this.loading = false;
                alert('We cant reload the contacts.');
            });
        },
    }
</script>

<style scoped>

</style>
