<template>
    <div>
        <form @submit.prevent="submitForm">
            <a href="#" @click="$router.back()" class="text-blue-400">
                < Back
            </a>
            <InputField name="name" label="contact name" placeholder="contact name"
                        type="text" @update:field="form.name = $event" :errors="errors" :data="form.name" />
            <InputField name="email" label="Contact Email" placeholder="email@email.email" type="email"
                        @update:field="form.email = $event" :errors="errors" :data="form.email" />
            <InputField name="company" label="Comany Name" placeholder="example"
                        type="text" @update:field="form.company = $event" :errors="errors" :data="form.company" />
            <InputField name="birth_day" label="Birthday" placeholder="mm/DD/YYYY"
                        type="date" @update:field="form.birth_day = $event" :errors="errors" :data="form.birth_day" />

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">
                    Cancel
                </button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">
                    Save
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../components/InputField";
    export default {
        name: "ContactEdit",
        components: {
            InputField,
        },
        data: function() {
            return {
                form : {
                    name: '',
                    company: '',
                    email: '',
                    birth_day: '',
                },
                errors: null,
            }
        },
        methods: {
            submitForm: function () {
                axios.patch('/api/contacts/'+this.$route.params.id, this.form)
                .then(response => {
                    this.$router.push(response.data.links.link)
                })
                .catch(err => {
                    this.errors = err.response.data.errors;
                });
            }
        },
        mounted() {
            axios.get('/api/contacts/'+this.$route.params.id)
                .then(response => {
                    this.form = response.data.data;
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
