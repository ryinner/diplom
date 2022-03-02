<template>
    <button @click="changeTheme">Сменить тему</button>
</template>

<script>
import axios from "axios";

export default {
    methods: {
        changeTheme() {
            axios.get('/Cookies/ChangeTheme')
            if (document.querySelector('html').getAttribute('data-theme-style') == 'master') {
                document.querySelector('html').setAttribute('data-theme-style', 'dark')
            } else {
                document.querySelector('html').setAttribute('data-theme-style', 'master')
            }
        }
    }
}
</script>

<style>

</style>