<template>
    <div v-if="isShow">
        <orderaccept @success="isShow = false"></orderaccept>
        <orderdecline @success="isShow = false"></orderdecline>
    </div>
    <div v-else>
        Решение вынесено
    </div>
</template>

<script>
import orderaccept from "./buttons/AcceptOrder.vue";
import orderdecline from "./buttons/DeclineOrder.vue";

export default {
    components: {
        orderaccept,
        orderdecline,
    },

    props: {
        order: {
            required: true,
        }
    },

    emits: ['accepted'],

    data() {
        return {
            isShow: true,
        }
    }
}
</script>

<style>

</style>