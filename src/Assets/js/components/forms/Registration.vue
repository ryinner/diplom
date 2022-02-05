<template>
    <form class="column">
        <h2 class="text-center">Создай аккаунт</h2>
        <h3 class="text-center">И пользуйся всем функционалом сайта, уже сейчас</h3>

        <div class="form-control center m-c-10">
            <input type="text" v-model="login" class="width-30" placeholder="Ваш логин" required>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="email" class="width-30" placeholder="Ваша почта" required>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="firstname" class="width-30" placeholder="Ваше имя" required>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="lastname" class="width-30" placeholder="Ваше фамилия" required>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="phone" class="width-30" placeholder="Ваш телефон" required>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="password" class="width-30" placeholder="Ваш пароль" required>
        </div>

        <div class="form-control center m-c-10">
            <input type="text" v-model="repeatedPassrord" class="width-30" placeholder="Повтор пароля" required>
        </div>

        <div class="form-control center m-c-10 xy-center">
            <input type="checkbox" id="agreement" value="true" v-model="checkbox" required>
            <label for="agreement" class="width-30">
                <span>Я согласен с условиями политики <a href="/files/Персональные данные.docx" download class="a__show">персональных данных</a></span>
            </label>
        </div>

        <div class="form-control center m-c-10">
            <button @click.prevent="registration">Создать аккаунт</button>
        </div>
    </form>
</template> 

<script>
export default {
    data() {
        return {
            login: null,
            email: null,
            firstname: null,
            lastname: null,
            phone: null,
            password: null,
            repeatedPassrord: null,
            checkbox: null,
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

        },

        check () {

        }, 
        
        validEmail(email) {
            const regular = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regular.test(email);
        }
    }
}
</script>

<style>

</style>