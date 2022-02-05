<template>
    <form class="column">
        <div class="form-controll center m-c-10">
            <input type="text" v-model="login" class="width-80" placeholder="Ваш логин" required>
        </div>
        <div class="form-controll center m-c-10">
            <input type="password" v-model="password" class="width-80" placeholder="Ваш пароль" required>
        </div>
        <div class="form-controll center m-c-10">
            <button type="submit" @click.prevent="loginUser">Войти</button>
        </div>
        <div class="form-controll center">
            <a href="/Users/Create">Нет аккаунта? Создайте прямо сейчас</a>
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
        loginUser() {
            this.login = this.login.trim()
            this.password = this.password.trim()

            axios.post('/Users/Login', {login: this.login, password: this.password})

            .then(function (response) {

            })

            .catch(function(error) {

            })
        }
    },
}
</script>

<style>

</style>