<template>
<modal v-if="!userConfig.auth" tittle="Ваши данные" :isActive="modalOpen">
    <loginForm></loginForm>
</modal>
<div id="sidebar" class="center" :class="{sidebar__active:isActive}">
    <ul class="column">
        <li class="center">
            <div class="logo center" @click="toogleSidebar">
                <img src="/img/logo/logo_dark.svg" alt="Риелтор" draggable="false" />
                <span>Риелтор</span>
            </div>
        </li>

        <li>
            <a href="/">Главная</a>
        </li>
        
        <li>
            <a href="/">Недвижимость</a>
        </li>

        <li>
            <a href="/">Заявка на продажу</a>
        </li>

        <li>
            <a href="/">Услуги</a>
        </li>

        <li>
            <a href="/">Контакты</a>
        </li>
    </ul>
</div>

<header class="center">
    <div class="content">
        <nav>
            <div class="left">
                <ul>
                    <li>
                        <div class="logo center" @click="toogleSidebar">
                            <img src="/img/logo/logo.svg" alt="Риелтор" draggable="false" />
                            <span>Риелтор</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <a href="/" class="username" v-if="userConfig.auth">{{ userConfig.login }}</a>
                        <a href="/" @click.prevent="toogleModal" v-else>Войти</a>
                    </li>
                </ul>
            </div>
        </nav>
        
    </div>
</header>
</template>

<script>
import modal from "./Modal"
import loginForm from "./forms/Login";

export default{
    components: {
        modal,
        loginForm
    },
    data() {
        return {
            isActive: false,
            modalOpen: false,
            screenWidth: window.screen.width,
        };
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

    methods: {
        toogleSidebar(){
            this.isActive = !this.isActive
        }, 

        toogleModal() {
            this.modalOpen = !this.modalOpen
        }
    },

    watch: {
        modalOpen() {
            if (this.modalOpen === true) {
                document.body.style.overflow = "hidden"
            } else {
                document.body.style.overflow = "auto"
            }
        }
    },


}
</script>

<style lang="css">
#sidebar {
    position: fixed;
    width: 25%;
    height: 100%;
    background: var(--text-color);
    color: var(--background-color);
    transition: 500ms ease all;
    transform: translateX(calc(-100%));
    z-index: 1;
}

#sidebar ul li a {
    color: var(--background-color);
    transition: 300ms ease all;
    position: relative;
}

#sidebar ul li a:hover {
    color: var(--second-color);
    transition: 200ms ease all;
}

#sidebar ul li .logo {
    padding: 16px;
    margin-bottom: 12px;
    font-size: 1.4em;
}

#sidebar ul li:not(:first-child) {
    font-size: 1.2em;
    margin: 6px 0;
}

#sidebar ul li a::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 0.1em;
    background: var(--second-color);
    opacity: 0;
    transition: opacity 300ms, transform 300ms;
    transform: translate3d(-100%, 0, 0);
    overflow: hidden;
}

#sidebar ul li a:hover::after {
    opacity: 1;
    transform: translate3d(0, 0, 0);
}

.logo {
    cursor: pointer;
}

.logo span {
    margin-left: 4px;
}

.username {
    font-size: 1.2em;
}

.sidebar__active {
    transition: 500ms ease all;
    transform: translateX(calc(0%)) !important;
}
</style>