<template>
    <button class="btn-danger" @click.prevent="decline">Отказать</button>
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
        decline() {
            axios.post('/Cms/Orders/Decline/' + this.order)
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