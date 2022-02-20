<template>
    <privatesidebar />
    <div class="d-table-cell width-100">
        <header>
            <div class="d-flex y-center">
                <div class="user">
                    <span class="user__login">{{ userConfig.login }}</span>
                </div>
                <img
                    src="/img/helpers/phone.svg"
                    class="icon dropdown-fix"
                    @click="openDropdown"
                />
                <div class="user__notifications pos-relative">
                    <ul
                        class="dropdown"
                        :class="{ dropdown__active: dropdownVisible }"
                    >
                        <li v-for="request in requests" :key="request.id">
                            <div class="request">
                                <div :title="request.problem">
                                    <div class="request__name">
                                        {{ request.name }}
                                    </div>
                                    <div class="request__phone">
                                        <a
                                            :href="'tel:' + request.phone"
                                            @click="changeStatus(request.id)"
                                            >{{ request.phone }}</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="request">
                                <div>
                                    <div class="request__phone">
                                        <a href="/Cms/Requests/Index">Все вопросы</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li v-if="requestCountNull">
                            <div class="request">
                                <div class="request__name">
                                    Сейчас заявок нет!
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <slot></slot>
    </div>
</template>

<script>
import privatesidebar from "./PrivateSidebar.vue";
import axios from "axios";

export default {
    components: {
        privatesidebar,
    },

    data() {
        return {
            requests: [],
            dropdownVisible: false,
            interval: null,
        };
    },

    props: {
        user: {
            type: String,
            required: true,
        },
    },

    computed: {
        userConfig() {
            return JSON.parse(this.user);
        },
        requestCountNull() {
            return this.requests.length == 0 ? true : false;
        },
    },

    created() {
        this.getRequests();
        this.interval = setInterval(this.getRequests, 1000);
    },

    beforeUnmount() {
        clearInterval(this.interval);
    },

    methods: {
        getRequests() {
            axios.get("/Api/Requests/Get").then((response) => {
                if (response.data.success === true) {
                    this.requests = response.data.requests;
                } else {
                    this.requests = "Ошибочка вышла";
                }
            });
        },

        openDropdown() {
            this.dropdownVisible = !this.dropdownVisible;
        },

        changeStatus(request_id) {
            axios.get("/Api/Requests/Update/" + request_id);
        },
    },
};
</script>

<style lang="scss" scoped>
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

    &__active {
        display: block !important;
    }

    &__fix {
        margin-top: 3px;
    }
}

.request {
    width: 200px;
    background: var(--background-color);
    padding: 10px;

    &__phone {
        cursor: pointer;
    }
}
</style>