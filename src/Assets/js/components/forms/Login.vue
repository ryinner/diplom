<template>
    <form class="column">
        <div class="form-controll center m-c-10">
            <input type="text" :login="login" class="width-80" placeholder="Ваш логин" required>
        </div>
        <div class="form-controll center m-c-10">
            <input type="password" :password="password" class="width-80" placeholder="Ваш пароль" required>
        </div>
        <div class="form-controll center m-c-10">
            <button type="submit" @click.prevent="login">Войти</button>
        </div>
    </form>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            login: null,
            password: null
        }
    },
    methods: {
        login() {
            axios.post('/', {login: this.login, password: this.password});
        }
    },
}
</script>

<style>

</style>