<template>
    <div class="leftbar d-table-cell">
        <div class="logo d-flex space-around y-center" :class="{leftbar__active: isActive}">
            <a href="/Cms/index/index" class="text-active no-mobile"><h2 class="text-active">Cms</h2></a>
            <img src="/img/helpers/burger-menu.svg" class="logo-icon" @click.prevent="open">
        </div>
        <div class="navs" :class="{leftbar__active: isActive}">
            <ul>
                <li>
                    <a href="/" class="d-flex">
                        <img src="/img/logo/logo_dark.svg" class="icon">
                        <span class="text-active">На сайт</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="/Cms/Index/Index" class="d-flex">
                        <img src="/img/helpers/statistics_icon.svg" class="icon">
                        <span class="text-active">Статистика</span>
                    </a>
                </li> -->
                <li>
                    <a href="/Cms/Houses/Index" class="d-flex">
                        <img src="/img/helpers/houses_icon.svg" class="icon">
                        <span class="text-active">Дома</span>
                    </a>
                </li>
                <li>
                    <a href="/Cms/Users/Index" class="d-flex">
                        <img src="/img/helpers/users_icon.svg" class="icon">
                        <span class="text-active">Пользователи</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="/Cms/Pages/Index" class="d-flex">
                        <img src="/img/helpers/pages_icon.svg" class="icon">
                        <span class="text-active">Страницы</span>
                    </a>
                </li> -->
                <li>
                    <a href="/Cms/Orders/Index" class="d-flex">
                        <img src="/img/helpers/invoice_icon.svg" class="icon">
                        <span class="text-active">Заявки</span>
                    </a>
                </li>
                <li>
                    <a href="/Cms/Requests/Index" class="d-flex">
                        <img src="/img/helpers/request_icon.svg" class="icon">
                        <span class="text-active">Вопросы</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isActive: false,
        }
    },

    methods: {
        open() {
            this.isActive = !this.isActive
        }
    }
}
</script>

<style lang="scss" scoped>
    .navs {
        & ul li a {
            color: var(--white);
            padding: 10px 20px;
            .icon {
                width: 30px;
                height: 30px;
            }

            span {
                margin-left: 4px;
                display: none;
                font-size: 1.2em;
            }
        }
    } 

    .leftbar {
        height: 100%;
        background: var(--dark);
        color: var(--white);
        border-right: 1px solid var(--gray);
        &__active  .text-active {
            display: block;
        }
    }

    h2 {
        color: var(--white);
    }

    .logo a {
        display: none;
    }

    .logo-icon {
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    @media screen and (max-width: 500px) {
        .logo {
            justify-content: center !important;
        }

        .navs {
        & ul li a span {
                font-size: 0.9em;
            }
        }
    } 
</style>