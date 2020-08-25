<template>
    <div>
        <form @submit.prevent="submitForm">

            <InputField name="name" label="contact name" placeholder="contact name" type="text" @update:field="form.name = $event" :errors="errors" />
            <InputField name="email" label="Contact Email" placeholder="email@email.email" type="email"  @update:field="form.email = $event" :errors="errors" />
            <InputField name="company" label="Comany Name" placeholder="example"  type="text" @update:field="form.company = $event" :errors="errors" />
            <InputField name="birth_day" label="Birthday" placeholder="mm/DD/YYYY"  type="date" @update:field="form.birth_day = $event" :errors="errors" />

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">
                    Cancel
                </button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">
                    Add new
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../components/InputField";
    export default {
        name: "ContactCreate",
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
                axios.post('/api/contacts', this.form)
                .then(response => {
                    this.$router.push(response.data.links.link)
                })
                .catch(err => {
                    this.errors = err.response.data.errors;
                });
            }
        }

    }
</script>

<style scoped>

</style>
