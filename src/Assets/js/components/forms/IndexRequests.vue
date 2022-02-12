<template>
    <form class="d-flex center width-80">
        <div class="container">
            <div class="column">
                <h2 class="text-center">Всегда на связи</h2>
                <div class="width-100 border-2px-negative m-c-10"></div>
                <span class="width-100 text-center"
                    >Отправьте свой вопрос, предложение или жалобу, через форму
                    обратной связи, наш специалист свяжиться с вами в течение 15
                    минут</span
                >
                <div class="width-100 border-2px-negative m-c-10"></div>
            </div>

            <div class="forn-controll m-c-10">
                <input
                    type="text"
                    class="width-100"
                    v-model="username"
                    :class="{ errors__input: usernameError.class }"
                    placeholder="Ваше имя"
                />
            </div>

            <div class="errors center" v-if="usernameError.class">
                <span class="errors__text">{{ usernameError.error }}</span>
            </div>

            <div class="forn-controll m-c-10">
                <input
                    type="text"
                    class="width-100"
                    v-model="phone"
                    :class="{ errors__input: phoneError.class }"
                    @input="onlyNumbers"
                    placeholder="Ваше номер"
                />
            </div>

            <div class="errors center" v-if="phoneError.class">
                <span class="errors__text">{{ phoneError.error }}</span>
            </div>

            <div class="forn-controll m-c-10">
                <textarea
                    class="width-100"
                    placeholder="Ваш комментарий"
                    v-model="message"
                    :class="{ errors__input: messageError.class }"
                ></textarea>
            </div>
            <div class="errors center" v-if="messageError.class">
                <span class="errors__text">{{ messageError.error }}</span>
            </div>

            <div class="btn-container width-100 center">
                <button @click="makeRequest">Отправить</button>
            </div>
        </div>
    </form>
</template>

<script>
import Validator from "./../../plugins/Validator";
import axios from "axios";

export default {
    data() {
        return {
            username: null,
            phone: null,
            message: null,
            usernameError: { class: false, message: "" },
            phoneError: { class: false, message: "" },
            messageError: { class: false, message: "" },
            valid: null,
        };
    },

    methods: {
        makeRequest() {
            this.check();
            if (this.valid == true) {
                this.sendData;
            }
        },

        check() {
            this.valid = true;
            this.usernameError = { class: false, message: "" }
            this.phoneError = { class: false, message: "" }
            this.messageError = { class: false, message: "" }

            if (Validator.validUsername(this.username)) {
                this.username.trim();
            } else {
                this.usernameError = { class: true, message: "Заполните имя" };
                this.valid = false;
            }

            if (!Validator.validPhone(this.phone)) {
                this.phoneError = { class: true, message: "Заполните номер" };
                this.valid = false;
            }

            if (this.message !== null) {
                this.message.trim();
            } else {
                this.messageError = {
                    class: true,
                    message: "Заполните комментарий",
                };
                this.valid = false;
            }
        },

        sendData() {
            axios
                .post("/Api/Requests/Create", {
                    username: this.username,
                    phone: this.phone,
                    message: this.message,
                })
                .then((response) => {})

                .catch((error) => {
                    console.log(error);
                });
        },

        onlyNumbers() {
            this.phone = Validator.onlyNumbers(this.phone);
        },
    },
};
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