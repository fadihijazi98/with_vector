<template>
    <div>
        <ContactList endpoint="/api/birthdays" />
    </div>
</template>

<script>
    import ContactList from "../components/ContactList";
    export default {
        name: "ContactBirthdays",
        components: {ContactList},
    }
</script>

<style scoped>

</style>
