<template>
    <div class="relative pb-4">
        <label class="absolute uppercase text-blue-500 pt-2 text-xs font-bold" :for="name">{{label}}</label>
        <input class="w-full pt-8 text-gray-900 border-b pb-2 focus:outline-none focus:border-blue-400"
               :name="name" :id="name" :placeholder="placeholder" :class="newClassError()"
               :type="type" v-model="value" @input="updateField()"/>


        <p class="text-red-600 text-sm font-bold" v-text="errorMessages()">
            Error in this field
        </p>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: [
            'name', 'label', 'placeholder', 'type', 'errors', 'data'
        ],
        data: function () {
            return {
                value: '',

            }
        },
        computed: {
            hasError: function () {
                return this.errors && this.errors[this.name];
            }

        },
        methods: {
            updateField: function() {
                this.clearError();
                this.$emit('update:field', this.value);
                // it act as a new input event
                // it also act as lisner for value

            },
            errorMessages: function() {
                if(this.hasError)
                    return this.errors[this.name][0];

            },
            clearError: function() {
                if(this.hasError)
                    this.errors[this.name] = null;
            },
            newClassError: function () {
                return {
                  'err-css': this.hasError,
                };
            }
        },
        watch: {
            data: function(val) {
                this.value = val;
            }
        }
    }
</script>

<style scoped>
.err-css {
    @apply .border-red-500 .border-b-2
}
</style>
