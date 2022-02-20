<template>
    <a @click.prevent="send"><slot></slot></a>
</template>

<script>
import axios from "axios";

export default {
    props: ['id'],

    methods: {
        send() {
            axios.get("/Api/Requests/Update/" + id)
        }
    }
}
</script>

<style>

</style>