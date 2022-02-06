<template>
    <form class="column">
        <h2 class="text-center">Создай аккаунт</h2>
        <h3 class="text-center">И пользуйся всем функционалом сайта, уже сейчас</h3>

        <div class="form-control center m-c-10">
            <input type="text" v-model="login" class="width-30" placeholder="Ваш логин" :class="{errors__input:loginError.class}" required>
        </div>
        <div class="errors center" v-if="loginError.class">
                <span class="errors__text">{{ loginError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="email" class="width-30" placeholder="Ваша почта" :class="{errors__input:emailError.class}" required>
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
            <input type="text" v-model="password" class="width-30" placeholder="Ваш пароль" :class="{errors__input:passwordError.class}" required>
        </div>
        <div class="errors center"  v-if="passwordError.class">
            <span class="errors__text">{{ passwordError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="repeatedPassrord" class="width-30" placeholder="Повтор пароля" :class="{errors__input:repeatedPassrordError.class}" required>
        </div>
        <div class="errors center" v-if="repeatedPassrordError.class">
            <span class="errors__text">{{ repeatedPassrordError.message }}</span>
        </div>

        <div class="form-control center m-c-10 xy-center">
            <input type="checkbox" id="agreement" value="true" v-model="checkbox" required>
            <label for="agreement" class="width-30">
                <span>Я согласен с условиями политики <a href="/files/Персональные данные.docx" download class="a__show">персональных данных</a></span>
            </label>
        </div>
        <div class="errors center" v-if="checkboxError.class">
            <span class="errors__text">{{ checkboxError.message }}</span>
        </div>

        <div class="form-control center m-c-10">
            <button @click.prevent="registration">Создать аккаунт</button>
        </div>
    </form>
</template> 

<script>
import Validator from './../../plugins/Validator'
import axios from "axios"

export default {
    data() {
        return {
            login: '',
            email: '',
            firstname: '',
            lastname: '',
            phone: '',
            password: '',
            repeatedPassrord: '',
            checkbox: false,

            loginError: {class: false, message: ''},
            emailError: {class: false, message: ''},
            firstnameError: {class: false, message: ''},
            lastnameError: {class: false, message: ''},
            phoneError: {class: false, message: ''},
            passwordError: {class: false, message: ''},
            repeatedPassrordError: {class: false, message: ''},
            checkboxError: {class: false, message: ''},

            valid: '',
            data: ''
        }
    },

    methods: {
        registration () {
            this.login = this.login.trim()
            this.email = this.email.trim()
            this.firstname = this.firstname.trim()
            this.lastname = this.lastname.trim()
            this.phone = this.phone.trim()
            this.password = this.password.trim()
            this.repeatedPassrord = this.repeatedPassrord.trim()

            this.check ()
        },

        check () {
            this.valid = true

            this.loginError = {class: false}
            this.emailError = {class: false}
            this.firstnameError = {class: false}
            this.lastnameError = {class: false}
            this.phoneError = {class: false}
            this.passwordError = {class: false}
            this.repeatedPassrordError = {class: false}
            this.checkboxError = {class: false}

            if (!Validator.validLogin(this.login)) {
                this.loginError = {class:true, message: 'Введите только английские буквы и точки в логине'}
                this.valid = false
            }

            if (!Validator.validEmail(this.email)) {
                this.emailError = {class:true, message: 'Введите почту'}
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

            if (this.password !== this.repeatedPassrord) {
                this.repeatedPassrordError = {class:true, message: 'Ваши пароли не совпадают'}
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
                login: this.login,
                email: this.email,
                firstname: this.firstname,
                lastname: this.lastname,
                phone: this.phone,
                password: this.password,
            })
            .then(function (response) {
                data = JSON.parse(response.data)
            })

            .catch(function(error) {
                console.log(error)
            })
        }
    }
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