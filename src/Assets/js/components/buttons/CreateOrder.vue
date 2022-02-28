<template>
    <div class="form-controll">
        <button @click.prevent="createOrder" :disabled="disabled">Сделать заявку</button>
        <div class="server-answer">{{ answer }}</div>
        <div class="not-auth" v-if="notAuth">
            Пожалуйста авторизируйтесь
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        house: {
            required: true,
        },
        user: {
            required: true,
        },
        manager: {
            required: true,
        },
    },

    data() {
        return {
            answer: "",
            disabled: false,
            notAuth: ''
        };
    },

    methods: {
        createOrder() {
            const formData = new FormData();

            formData.append("house_id", this.house);
            formData.append("user_id", this.user);
            formData.append("manager_id", this.manager);
            axios.post("/Api/Orders/Create", formData).then((response) => {
                if (response.data.success === true) {
                    this.answer = "Заявка принята"
                    this.disabled = true
                } else {
                    this.answer = "Что пошло не так, повторите попытку позже"
                }
            });
        },

        checkUser() {
            if (!Number.isInteger(this.user)) {
                this.notAuth = true;
                this.disabled = true;
            }
        }
    },

    created() {
        this.checkUser()
    }
};
</script>

<style>
</style>