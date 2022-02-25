<template>
    <span v-if="status == 0" @click.prevent="send" :class="{link__active: classActive}"><slot></slot></span>
    <span v-else><slot></slot></span>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            classActive: this.status,
        }
    },

    props: ['id', 'status'],

    methods: {
        send() {
            axios.get("/Api/Requests/Update/" + this.id)
            this.classActive = false
        }
    }
}
</script>

<style>

</style>