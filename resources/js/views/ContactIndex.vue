<template>
    <div>
        <ContactList endpoint="/api/contacts" />
    </div>
</template>

<script>
    import ContactList from "../components/ContactList";
    export default {
        name: "ContactIndex",
        components: {ContactList},
    }
</script>

<style scoped>

</style>
