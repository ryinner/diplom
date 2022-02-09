<template>
    <form class="column">
        <div class="form-controll center m-c-10">
            <input type="text" v-model="login" class="width-80" placeholder="Ваш логин" required>
        </div>
        <div class="errors center" v-if="loginError.class">
            <span class="errors__text">{{ loginError.error }}</span>
        </div>
        <div class="form-controll center m-c-10">
            <input type="password" v-model="password" class="width-80" placeholder="Ваш пароль" required>
        </div>
        <div class="errors center" v-if="passwordError.class">
            <span class="errors__text">{{ passwordError.error }}</span>
        </div>
        <div class="form-controll center m-c-10">
            <input type="checkbox" v-model="checkbox" value="true" id="save">
            <label for="save" class="width-30">
                <span>Запомнить меня</span>
            </label>
        </div>
        <div class="form-controll center m-c-10">
            <button type="submit" @click.prevent="loginUser">Войти</button>
        </div>
        <div class="form-controll center">
            <span>Нет аккаунта? <a href="/Users/Create" class="a__show">Создайте прямо сейчас</a></span>
        </div>
    </form>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            login: null,
            password: null,
            checkbox: false,
            loginError: {class: false, error:null}, 
            passwordError: {class: false, error:null}
        }
    },
    methods: {
        loginUser() {
            if (this.login !== null) {
                this.login = this.login.trim()
                this.loginError = {class: false, error: null}
            } else {
                this.loginError = {class: true, error: 'Заполните поле'}
            }

            if (this.password !== null) {
                this.password = this.password.trim()
                this.passwordError = {class: false, error: null}
            } else {
                this.passwordError = {class: true, error: 'Заполните поле'}
            }

            if (this.login  && this.password) {
                this.sendData()
            }
        },

        sendData() {
            axios.post('/Api/Users/Login', {username: this.login, password: this.password, remember: this.checkbox})

            .then((response) => {
                if (response.data.success === true) {
                    window.location.href=window.location.href
                } else {
                    this.loginError = {class: true, error: response.data.errors.loginError};
                }
            })

            .catch(function(error) {
                console.log(error)
            })
        }
    },
}
</script>

<style lang="scss">
.errors {
    &__text {
        color: var(--red);
    }

    &__input {
        border: 2px solid var(--red) !important;
    }
}
</style>