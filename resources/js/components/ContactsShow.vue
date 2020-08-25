<template>
    <div>
        <!-- loading -->
        <div v-if="loading">
            Loading...
        </div>
        <div v-else>
            <!-- top section -->
            <div class="relative flex justify-between">
                <a href="#" @click="$router.back()" class="text-blue-400">
                    < Back
                </a>
                <div class="relative">
                    <router-link :to="'/contacts/' + contact.contact_id + '/edit'" class="px-4 py-2
                text-green-500 rounded border border-green-500 text-sm font-bold mr-2">Edit</router-link>
                    <a href="#" class="px-4 py-2 text-red-500 rounded border
                    border-red-500 text-sm font-bold" @click="model = !model">Delete</a>
                    <!-- delete model for ensure -->
                    <div v-if="model" class="absolute right-0 text-white rounded-lg bg-blue-900 p-8 w-64 mr-6 mt-3 z-20">
                        <p>
                            Are you sure to delete this contact ?
                        </p>
                        <button @click="model = !model">
                            Cancel
                        </button>
                        <button class="px-4 py-2 bg-red-500 rounded text-sm font-bold text-white" @click="destory()">
                            Yes sure
                        </button>
                    </div>

                </div>
            </div>
            <!-- remain section -->
            <div>
                <div class="flex item-center pt-6">
                    <UserCircle :name="contact.name" />
                    <p class="pl-5 text-xl">
                        {{ contact.name }}
                    </p>

                </div>

                <p class="text-gray-600 pt-6 font-bold uppercase">Contact</p>
                <p>
                    {{ contact.name }}
                </p>
                <p class="text-gray-600 pt-6 font-bold uppercase">Company</p>
                <p>
                    {{ contact.company }}
                </p>
                <p class="text-gray-600 pt-6 font-bold uppercase">Birthday</p>
                <p>
                    {{ contact.birth_day }}
                </p>

            </div>
            <!-- bg gray with lettel opacity just -->
            <div v-if="model" class="absolute opacity-25 top-0 bottom-0 right-0 left-0 bg-gray-900 z-10"></div>
        </div>
    </div>
</template>

<script>
    import UserCircle from './UserCircle';
    export default {
        name: "ContactsShow",
        data: function() {
            return {
                loading: true,
                model: false,
                contact: null,
            };
        },
        components: {
            UserCircle,
        },
        methods: {
            destory: function() {
                axios.delete('/api/contacts/'+this.contact.contact_id)
                .then(response => {
                    this.$router.push('/contacts/');
                })
                .catch(err => {
                    alert("I can't Delete this contact :(");
                });
            }
        },
        mounted() {
            axios.get('/api/contacts/'+this.$route.params.id)
            .then(response => {
                this.contact = response.data.data;
                this.loading = false;
            })
            .catch(err => {
                this.loading = false;
                if(err.response.status===404)
                    this.$router.push('/contacts/');
            });
        }
    }
</script>

<style scoped>

</style>
