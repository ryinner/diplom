<template>
    <button @click="goToMain">Перейти на главную</button>
</template>

<script>
export default {
    data() {
        return {

        }
    },

    methods: {
        goToMain() {
            location.href = '/'
        }
    }
}
</script>

<style>

</style>