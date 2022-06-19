<template>
    <button @click.prevent="deleteOrder" class="m-c-10">Отменить</button>
</template>

<script>
import axios from "axios";
export default {
    methods: {
        deleteOrder() {
            axios.post('/Orders/Delete/' + this.order)
            .then((response) => {
                if (response.data.success === true) {
                    document.querySelector('.order[data-order-id="' + this.order + '"]').classList.add('d-none')
                }
            })
        }
    },

    props: {
        order: {
            required: true,
        }
    },
}
</script>

<style>

</style>