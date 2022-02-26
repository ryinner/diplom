<template>
    <select @change="changeRole" v-model="pickedRole">
        <option v-for="role in JSON.parse(roles)" :key="role.id" :value="role.id">
            {{ role.role }}
        </option>
    </select>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            pickedRole: this.userrole,
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
            let formData = new FormData
            formData.append('role_id', this.pickedRole)
            axios.post("/Cms/Roles/Change/" + this.userid, formData)
        },
    },
};
</script>

<style>
</style>