<template>
    <div class="d-flex">
        <privatesidebar />
        <header class="d-flex xy-center space-between">
            <div class="user">
                <span class="user__login">{{ userConfig.login }}</span>
            </div>
            <img src="/img/helpers/phone.svg" class="icon m-fix" @click="openDropdown">
            <div class="user__notifications pos-relative">
                <ul class="dropdown" :class="{dropdown__active:dropdownVisible}">
                    <li v-for="request in requests" :key="request.id">
                        <div class="request">
                            <div :title="request.problem">
                                <div class="request__name">{{ request.name }}</div>
                                <div class="request__phone"><a :href="'tel:' + request.phone" @click="changeStatus(request.id)">{{ request.phone }}</a></div>
                            </div>
                        </div>
                        
                    </li>
                </ul>
            </div>
        </header>
    </div>
</template>

<script>
import privatesidebar from './PrivateSidebar.vue'
import axios from "axios"

export default {
    components: {
        privatesidebar,
    },

    data() {
        return {
            requests: {},
            dropdownVisible: false,
            interval: null
        }
    },

    props: {
        user: {
            type: String,
            required: true
        }
    },

    computed: {
        userConfig() {
            return JSON.parse(this.user)
        }
    },

    created() {
        this.getRequests()
        this.interval = setInterval(this.getRequests, 1000)
    },

    beforeUnmount() {
        clearInterval(this.interval)
    },

    methods: {
        getRequests() {
            axios.get('/Api/requests/get')
            .then((response) => {
                if (response.data.success === true) {
                    this.requests = response.data.requests
                } else {
                    this.requests = "Ошибочка вышла"
                }
            })
        },

        openDropdown() {
            this.dropdownVisible = !this.dropdownVisible
        },

        changeStatus(request_id) {
            axios.get('/Api/requests/update/'+ request_id)
        }
    }
}
</script>

<style lang="scss">
    .user {
        padding: 8px;
    }

    .user {
        &__login {
            font-size: 2.3em;
        }
    }

    .dropdown {
        top: 10px;
        left: 10px;
        position: absolute;
        display: none;
        border: 1px solid var(--dark);
    }

    .dropdown__active {
        display: block !important;
    }

    .m-fix {
        margin-top: 3px;
    }

    .request {
        width: 200px;
        background: #ddd;
        padding: 10px;
    }
</style>