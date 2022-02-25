<template>
    <select @change="changeRole" v-model="pickedRole">
        <option v-for="(role, key) in JSON.parse(roles)" :key="key" :value="key">
            {{ role }}
        </option>
    </select>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            pickedRole: this.userRole,
        };
    },

    props: {
        roles: {
            required: true,
        },
        userrole: {
            required: true,
        },
        userid: {
            required: true,
        },
    },

    methods: {
        changeRole() {
            axios.post("/Cms/Roles/Change/" + this.userId, {
                role_id: this.pickedRole,
            });
        },
    },
};
</script>

<style>
</style>