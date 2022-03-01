<template>
    <button @click.prevent="accept">Принять</button>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            order: this.$parent.order
        }
    },
    emits: {
        success: null
    },
    methods: {
        accept() {
            axios.post('/Cms/Orders/Accept/' + this.order)
            .then((response) => {
                if (response.data.success === true) {
                    this.$emit('success', false)
                }
            })
        }
    }
}
</script>

<style>

</style>