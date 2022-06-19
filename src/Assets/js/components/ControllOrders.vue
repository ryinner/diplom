<template>
    <select v-model="order_status" @change="changeStatus">
        <option v-for="item in statuses" :key="item.id" :value="item.id">{{item.status}}</option>
    </select>
</template>

<script>
import axios from 'axios'


export default {
    props: {
        order: {
            required: true,
        },
        status: {
            required: true
        }
    },


    data() {
        return {
            items: {},
            statuses: '',
            order_status: "",
        }
    },

    methods: {
        changeStatus() {
            axios.post(`/Api/Orders/ChangeStatus/${this.order}`, {status: this.order_status})
        }
    },

    created() {
        this.order_status = this.status
        axios.post('/Api/Orders/Statuses')
        .then((response) => {
            if (response.data.success === true) {
                this.statuses = response.data.statuses
            }
        })
    }
}
</script>

<style>

</style>