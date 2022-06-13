<template>
    <span v-if="status == 0" @click="changeMenu" :class="{link__active: classActive}">
        <slot></slot>
        <div v-show="isMenuOpen" class="pos-absolute request-dropper">
            <div class="d-flex top-left request-question pos-relative">
                <button class="btn-success" @click="send">Решено</button>
                <button class="btn-danger">Не Решено</button>
            </div>
        </div>
    </span>
    <span v-else><slot></slot></span>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            classActive: this.status,
            isMenuOpen: false,
        }
    },

    props: ['id', 'status'],

    methods: {
        send() {
            axios.get("/Api/Requests/Update/" + this.id)
            this.classActive = false
        },

        changeMenu() {
            this.isMenuOpen = !this.isMenuOpen
        }
    }
}
</script>

<style>
    .request-dropper {
        margin-top: 6px;
        z-index: 0;
    }

    .request-dropper::before {
        top: 0;
        right: 0;
        z-index: -1;
        content: "\25BC";
        margin-top: -16px;
        position: absolute;
        color: var(--text-color);
    }

    .request-question {
        z-index: 6;
        padding: 12px;
        border: 1px solid var(--text-color);
        background: var(--background-color);
    }
</style>