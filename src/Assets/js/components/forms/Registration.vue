<template>
    <form class="column">
        <h2 class="text-center">Создай аккаунт</h2>
        <h3 class="text-center">И пользуйся всем функционалом сайта, уже сейчас</h3>

        <div class="form-control center m-c-10">
            <input type="text" v-model="username" class="width-30" placeholder="Ваш логин" :class="{errors__input:usernameError.class}" required>
        </div>
        <div class="errors center" v-if="usernameError.class">
                <span class="errors__text">{{ usernameError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="email" class="width-30" placeholder="Ваш емейл" :class="{errors__input:emailError.class}" required>
        </div>
        <div class="errors center" v-if="emailError.class">
            <span class="errors__text">{{ emailError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="firstname" class="width-30"  placeholder="Ваше имя" :class="{errors__input:firstnameError.class}" required>
        </div>
        <div class="errors center" v-if="firstnameError.class">
            <span class="errors__text">{{ firstnameError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="lastname" class="width-30" placeholder="Ваше фамилия" :class="{errors__input:lastnameError.class}" required>
        </div>
        <div class="errors center">
            <span class="errors__text" v-if="lastnameError.class">{{ lastnameError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="phone" class="width-30" @input="onlyNumbers" placeholder="Ваш телефон" :class="{errors__input:phoneError.class}" required>
        </div>
        <div class="errors center"  v-if="phoneError.class">
            <span class="errors__text">{{ phoneError.message }}</span>
        </div>


        <div class="form-control center m-c-10">
            <input type="password" v-model="password" class="width-30" placeholder="Ваш пароль" :class="{errors__input:passwordError.class}" required>
        </div>
        <div class="errors center"  v-if="passwordError.class">
            <span class="errors__text">{{ passwordError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="password" v-model="repeatedPassword" class="width-30" placeholder="Повтор пароля" :class="{errors__input:repeatedPasswordError.class}" required>
        </div>
        <div class="errors center" v-if="repeatedPasswordError.class">
            <span class="errors__text">{{ repeatedPasswordError.message }}</span>
        </div>

        <div class="form-control center m-c-10 xy-center">
            <input type="checkbox" id="agreement" value="true" v-model="checkbox" required>
            <label for="agreement" class="width-30 width-mobile-100">
                <span>Я согласен с условиями политики <a href="/files/Персональные данные.docx" download class="a__show">персональных данных</a></span>
            </label>
        </div>
        <div class="errors center" v-if="checkboxError.class">
            <span class="errors__text">{{ checkboxError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <button @click.prevent="registration" type="submit">Создать аккаунт</button>
        </div>
        <div class="success center">
            <span>{{ successMessage.message }}</span>
        </div>
    </form>
</template> 

<script>
import Validator from './../../plugins/Validator'
import axios from "axios"

export default {
    data() {
        return {
            username: '',
            email: '',
            firstname: '',
            lastname: '',
            phone: '',
            password: '',
            repeatedPassword: '',
            checkbox: false,

            usernameError: {class: false, message: ''},
            emailError: {class: false, message: ''},
            firstnameError: {class: false, message: ''},
            lastnameError: {class: false, message: ''},
            phoneError: {class: false, message: ''},
            passwordError: {class: false, message: ''},
            repeatedPasswordError: {class: false, message: ''},
            checkboxError: {class: false, message: ''},

            valid: '',
            data: {message: ''},
            successMessage: {message: ''},
            showModal: false,
        }
    },

    methods: {
        registration () {
            this.username = this.username.trim()
            this.email = this.email.trim()
            this.firstname = this.firstname.trim()
            this.lastname = this.lastname.trim()
            this.phone = this.phone.trim()
            this.password = this.password.trim()
            this.repeatedPassword = this.repeatedPassword.trim()

            this.check ()
        },

        check () {
            this.valid = true

            this.usernameError = {class: false}
            this.emailError = {class: false}
            this.firstnameError = {class: false}
            this.lastnameError = {class: false}
            this.phoneError = {class: false}
            this.passwordError = {class: false}
            this.repeatedPasswordError = {class: false}
            this.checkboxError = {class: false}

            if (!Validator.validUsername(this.username)) {
                this.usernameError = {class:true, message: 'Введите только английские буквы и точки в логине'}
                this.valid = false
            }

            if (!Validator.validEmail(this.email)) {
                this.emailError = {class:true, message: 'Введите почту в формате me@smtp.domen'}
                this.valid = false
            }
            
            if (!Validator.validName(this.firstname)) {
                this.firstnameError = {class:true, message: 'Введите ваше имя на русском языке'}
                this.valid = false
            }
            
            if(!Validator.validName(this.lastname)) {
                this.lastnameError = {class:true, message: 'Введите вашу фамилию на русском языке'}
                this.valid = false
            }
            
            if (!Validator.validPhone(this.phone)) {
                this.phoneError = {class:true, message: 'Введите ваш номер'}
                this.valid = false
            }

            if (!Validator.mediumPasswordDifficult(this.password)) {
                this.passwordError = {class:true, message: 'Ваш пароль слишком прост, попробуйте добавить букв, цифр, специальных символов'}
                this.valid = false
            }

            if (this.password !== this.repeatedPassword || this.repeatedPassword == null) {
                this.repeatedPasswordError = {class:true, message: 'Ваши пароли не совпадают'}
                this.valid = false
            }

            if (!this.checkbox) {
                this.checkboxError = {class:true, message: 'Для регистрации нужно согласие с условиями'}
                this.valid = false
            }

            if (this.valid == true) {
                this.tryCreateUser()
            }
        },

        onlyNumbers () {
            this.phone = Validator.onlyNumbers(this.phone)
        }, 

        tryCreateUser() {
            axios.post('/Api/Users/Create', {
                username: this.username,
                email: this.email,
                first_name: this.firstname,
                last_name: this.lastname,
                phone: this.phone,
                password: this.password,
            })
            .then( (response) => {
                if (response.data.success == false ) {
                    this.usernameError = {class:true, message: response.data.errors.usernameError}
                } else {
                    this.successMessage = {message: response.data.message}
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